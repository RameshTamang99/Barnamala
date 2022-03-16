<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class Barnamala extends Notification
{
    protected $reqName;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reqName)
    {
        $this->name = $reqName;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];

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
                    ->subject('Hey user, New post availabe')
                    ->greeting('Hello' , 'Subscriber')
                    ->line('There is a new post , hope you will like it')
                    ->line('Post title : '.$this->name) //Send with post title
                    // ->action('Read Post' , url(route('post' , $this->name))) //Send with post url
                    ->line('Thank you for being with us!');
    }


    public function toDatabase($notifiable)
    {

        return[
            'name'=>$this->name,
        ];
    }



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
