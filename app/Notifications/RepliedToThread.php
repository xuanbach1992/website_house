<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RepliedToThread extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $email;
    private $house;
//    private $user;

    public function __construct($email, $house)
    {
        $this->email = $email;
        $this->house = $house;

//        $this->user = $user;/
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }


    public function toDatabase($notifiable)
    {
        return [
//            'Message' => 'Bạn nhận được một yêu cầu thuê nhà từ :sender của ngôi nhà :house_title',
            'sender' => $notifiable->email,
            'receive' => $this->email,
            'house_title' => $this->house,
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
