<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NoAcceptRent extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $email;
    private $house_title;
    private $house_id;
    private $checkin;
    private $checkout;


    public function __construct($house_id, $email_host, $house_title, $checkin, $checkout)
    {
        $this->house_id = $house_id;
        $this->email = $email_host;
        $this->house_title = $house_title;
        $this->checkin = $checkin;
        $this->checkout = $checkout;

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

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'house_id' => $this->house_id,
            'sender' => $notifiable->email,
            'receive' => $this->email,
            'house_title' => $this->house_title,
            'checkin' => $this->checkin,
            'checkout' => $this->checkout,
        ];
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }


}
