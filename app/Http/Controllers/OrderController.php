<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Order;
use App\User;
use Illuminate\Http\Request;

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
                $order->check_in = $dataNotification->checkin;
                $order->check_out = $dataNotification->checkout;
                $order->pay_money = $dataNotification->total_price;
                $order->house_id = $dataNotification->house_id;
                $order->user_id = $notification->notifiable_id;
                $order->save();
            }
        }
    }
}
