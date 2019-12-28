<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReplyComment extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $house_id;
    protected $star_id;
    protected $receive;
    protected $time_reply;
    public function __construct($house_id,$star_id,$receive,$time_reply)
    {
        $this->house_id=$house_id;
        $this->star_id=$star_id;
        $this->receive=$receive;
        $this->time_reply=$time_reply;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
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
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'house_id' => $this->house_id,
            'star_id' => $this->star_id,
            'receive' => $this->receive,
            'time' => $this->time_reply,
        ];
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
