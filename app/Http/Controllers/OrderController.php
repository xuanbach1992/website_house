<?php

namespace App\Http\Controllers;

use App\House;
use App\Mail\reject_rent_house_by_customer;
use App\Notification;
use App\Notifications\AcceptRentHouse;
use App\Notifications\NoAcceptRent;
use App\Order;
use App\StatusInterface;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function __construct()
    {
        //
    }

    //chu nha chap nhan thue nha
    public function acceptRentHouse($notificationId)
    {
        $notification = Notification::where('uid', $notificationId)->get();
        $dataNotification = json_decode($notification[0]->data);
        $house_id = $dataNotification->house_id;
        $order = new Order();
        $email_receive = $dataNotification->sender; //email nguoi nhan
        $house_title = $dataNotification->house_title;
        $order->check_in = $dataNotification->checkin;
        $order->check_out = $dataNotification->checkout;
        $order->pay_money = $dataNotification->total_price;
        $order->house_id = $house_id;
//                $email_host=User::find($order->user_id)->email;
        $order->user_id = $notification[0]->notifiable_id;
        $order->status = StatusInterface::DATTHUETHANHCONG;
        $order->save();
        \auth()->user()->notify(new AcceptRentHouse($house_id, $email_receive, $house_title, $dataNotification->checkin, $dataNotification->checkout));
        toastr()->success('đang gửi thông báo cho người thuê');
//              cho notification da doc bang cach xoa notification day
//                Mail::send('house.content', array('content' => 'Chủ nhà đồng ý cho thuê nhà'),
//                    function ($message) {
//                        $message->to('hiepken95@gmail.com', 'Visitor')->subject('Thông báo thuê nhà!');
//                    });
        $notification[0]->delete();
        toastr()->info('gui thong bao den cho nguoi thue nha');
        return redirect()->route('admin.notify.show');
//            }
//        }
    }

//chhu nha khong dong y
    public function noAcceptRentHouse($notificationId)
    {
        $notification = Notification::where('uid', $notificationId)->get();

        $dataNotification = json_decode($notification[0]->data);
        $house_id = $dataNotification->house_id;
        $email_host = $dataNotification->sender;//email nguoi nhan

        $house_title = $dataNotification->house_title;
        $checkin = $dataNotification->checkin;
        $checkout = $dataNotification->checkout;

        $notification[0]->delete();
        Auth::user()->notify(new NoAcceptRent($house_id, $email_host, $house_title, $checkin, $checkout));
        //gửi email
        Mail::send('house.content', array('content' => 'Chủ nhà không đồng ý vì bạn quá xấu tính'),
            function ($message) {
                $message->to('hiepken95@gmail.com', 'Visitor')->subject('Thông báo thuê nhà!');
            });
        toastr()->info('gui thong bao den cho nguoi thue nha');
        return redirect()->route('admin.notify.show');

    }

//doc thong bao va xoa thong bao
    public function isReadNotification($notificationId)
    {
        $notification = Notification::where('uid', $notificationId)->get();
        $notification[0]->delete();
        return back();
    }

//huy thue nha
    public function destroyOrderRentHouse(Request $request)
    {
        $id = $request->idHouseBooking;
        $reasons = [];
        $reasonOne = $request->reasonOne;
        $reasonTwo = $request->reasonTwo;
        $reasonThree = $request->reasonThree;
        $reasonFour = $request->reasonFour;
        array_push($reasons, $reasonOne, $reasonTwo, $reasonThree, $reasonFour);
        $order = Order::findOrFail($id);

        $sender = 'bachax1992@gmail.com';
        $receive = 'hiepken95@gmail.com';
        $email_host = User::findOrFail($order->user_id)->email;
        $timeNow = Carbon::now('Asia/Ho_Chi_Minh');
        $nowTimestamp = Carbon::parse($timeNow)->timestamp;
        $timeCheckin = Carbon::create($order->check_in);
        $checkInTimestamp = Carbon::parse($timeCheckin)->timestamp;
        if ($checkInTimestamp - $nowTimestamp >= 86400) {
            $order->delete();
            toastr()->success('huy thue nha thanh cong');

            //không gửi được email thì chạy php artisan config:cache rồi chạy lại serve
//            by hiep
//            Mail::send('house.content', array('content' => 'Bạn đã hủy thuê nhà thành công . Hẹn bạn dịp khác'),
//                function ($message) {
//                    $message->to('hiepken95@gmail.com', 'Visitor')->subject('Thông tin!');
//                });

            Mail::to($receive)->send(new reject_rent_house_by_customer($sender, $reasons));
            return redirect()->route('admin.house.rented');
            //notification
        } else {
            toastr()->warning('không thể hủy trước thời hạn 1 ngày');
            Mail::send('house.content', array('content' => 'Bạn không thể hủy vì trước thời hạn thuê nhà một ngày! Xin thông cảm'),
                function ($message) {
                    $message->to('hiepken95@gmail.com', 'Visitor')->subject('Thông tin!');
                });
            return back();
        }
    }

//    public function functionAlwaysRun()
//    {
//        $orders = Order::all();
//        $timeNow = Carbon::now('Asia/Ho_Chi_Minh');
//        foreach ($orders as $order) {
//            $nowTimestamp = Carbon::parse($timeNow)->timestamp;
//            $checkInTimestamp = Carbon::parse($order->check_in)->timestamp;
//            $checkoutTimestamp = Carbon::parse($order->check_out)->timestamp;
//            if ($nowTimestamp >= $checkInTimestamp) {
//                if ($nowTimestamp <= $checkoutTimestamp) {
//                    $order->status = StatusInterface::VANDANGTHUE;
//                    $order->save();
//                } else {
//                    $order->status = StatusInterface::DAHOANTHANH;
//                    $order->save();
//                }
//            } else {
//                $order->status = StatusInterface::DATTHUETHANHCONG;
//                $order->save();
//            }
//        }
//    }

//hien thi chi tiet danh sach thue theo ngoi nha
    public function showRentDetailByHouse($house_id)
    {
        $house_name = House::find($house_id)->name;
        $orders = Order::where('house_id', $house_id)->get();
        return view('admin.pages.rent-detail', compact('orders', 'house_name'));
    }

    public function getCheckinChechoutOrderFindByHouse($id)
    {
        $dates = $orders = Order::select(
            DB::raw('check_in as checkin'),DB::raw('check_out as checkout'))
            ->where('house_id', $id)->get();
        return response()->json($dates);
    }
}
