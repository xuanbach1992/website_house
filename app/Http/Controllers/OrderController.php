<?php

namespace App\Http\Controllers;

use App\House;
use App\Notification;
use App\Notifications\AcceptRentHouse;
use App\Notifications\NoAcceptRent;
use App\Order;
use App\StatusHouseInterface;
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

        $order->status = StatusHouseInterface::THANHCONG;

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

    public function noAcceptRentHouse($notificationId)
    {
        $notifications = Notification::all();

        foreach ($notifications as $notification) {
            if ($notification->uid == $notificationId) {

                $dataNotification = json_decode($notification->data);
                $house_id = $dataNotification->house_id;
                $email_host = $dataNotification->sender;//email nguoi nhan

                $house_title = $dataNotification->house_title;
                $checkin = $dataNotification->checkin;
                $checkout = $dataNotification->checkout;

                $notification->delete();
                Auth::user()->notify(new NoAcceptRent($house_id, $email_host, $house_title, $checkin, $checkout));
                //gửi email
                Mail::send('house.content', array('content' => 'Chủ nhà không đồng ý vì bạn quá xấu tính'),
                    function ($message) {
                        $message->to('hiepken95@gmail.com', 'Visitor')->subject('Thông báo thuê nhà!');
                    });
                toastr()->info('gui thong bao den cho nguoi thue nha');
                return redirect()->route('admin.notify.show');
            } else {
                return abort(404, "not found");
            }
        }
    }

    public function isReadNotification($notificationId)
    {
        $notifications = Notification::all();

        foreach ($notifications as $notification) {
            if ($notification->uid == $notificationId) {
                $notification->delete();
                return redirect()->route('admin.notify.show');
            }
        }
    }

    public function unRentHouse($id)
    {
        $order = Order::findOrFail($id);

        $email_host = User::findOrFail($order->user_id)->email;

        $timeNow = Carbon::now('Asia/Ho_Chi_Minh');
        $nowTimestamp = strtotime($timeNow);
        $timeCheckin = Carbon::create($order->check_in);
        $checkInTimestamp = strtotime($timeCheckin);
        if ($checkInTimestamp - $nowTimestamp >= 86400) {
            $order->delete();
            toastr()->success('huy thue nha thanh cong');
            //không gửi được email thì chạy php artisan config:cache rồi chạy lại serve
            Mail::send('house.content', array('content' => 'Bạn đã hủy thuê nhà thành công . Hẹn bạn dịp khác'),
                function ($message) {
                    $message->to('hiepken95@gmail.com', 'Visitor')->subject('Thông tin!');
                });
            //notification
        } else {
            toastr()->warning('không thể hủy trước thời hạn 1 ngày');
            Mail::send('house.content', array('content' => 'Bạn không thể hủy vì trước thời hạn thuê nhà một ngày! Xin thông cảm'),
                function ($message) {
                    $message->to('hiepken95@gmail.com', 'Visitor')->subject('Thông tin!');
                });
        }
        return redirect()->route('admin.house.rented');
    }

    public function showRentDetailByHouse($house_id)
    {
        $house_name = House::find($house_id)->name;
        $orders = Order::where('house_id', $house_id)->get();
        return view('admin.pages.rent-detail', compact('orders', 'house_name'));
    }
}
