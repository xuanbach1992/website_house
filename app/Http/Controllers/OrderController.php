<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Notifications\AcceptRentHouse;
use App\Notifications\NoAcceptRent;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        //
    }

    public function acceptRentHouse($notificationId)
    {
        $notifications = Notification::all();
        foreach ($notifications as $notification) {
            if ($notification->uid == $notificationId) {
                $dataNotification = json_decode($notification->data);
                $order = new Order();
                $email_receive = $dataNotification->sender;
                $house_title = $dataNotification->house_title;
                $order->check_in = $dataNotification->checkin;
                $order->check_out = $dataNotification->checkout;
                $order->pay_money = $dataNotification->total_price;
                $order->house_id = $dataNotification->house_id;
                $order->user_id = $notification->notifiable_id;
                $order->save();
                \auth()->user()->notify(new AcceptRentHouse($dataNotification->house_id, $email_receive, $house_title, $dataNotification->checkin, $dataNotification->checkout));
//              cho notification da doc bang cach xoa notification day

                $notification->delete();
                toastr()->info('gui thong bao den cho nguoi thue nha');
                return redirect()->route('admin.house');
//            } else {
//                return abort(404, "not found");
            }
        }

    }

    public function noAcceptRentHouse($notificationId)
    {
        $notifications = Notification::all();
        foreach ($notifications as $notification) {
            if ($notification->uid == $notificationId) {
                $dataNotification = json_decode($notification->data);
                $house_id = $dataNotification->house_id;
                $email_host = $dataNotification->sender;
                $house_title = $dataNotification->house_title;
                $checkin = $dataNotification->checkin;
                $checkout = $dataNotification->checkout;
                $notification->delete();
                Auth::user()->notify(new NoAcceptRent($house_id, $email_host, $house_title, $checkin, $checkout));
                toastr()->info('gui thong bao den cho nguoi thue nha');
                return redirect()->route('admin.house');
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
                return redirect()->route('admin.house');
            } else {
                return abort(404, "not found");
            }
        }
    }

    public function unRentHouse($id)
    {
        $order = Order::findOrFail($id);
        $timeNow = Carbon::now();
        $nowTimestamp = strtotime($timeNow);
        $timeCheckin = Carbon::create($order->check_in);
        $checkInTimestamp = strtotime($timeCheckin);
        if ($checkInTimestamp - $nowTimestamp >= 86400) {
            $order->delete();
            //notification
        } else {
            //notification
        }
        return redirect()->route('admin.house.rented');
    }

}
