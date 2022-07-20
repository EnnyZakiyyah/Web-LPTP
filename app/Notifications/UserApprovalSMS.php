<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\VonageMessage;

class UserApprovalSMS extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['vonage'];
    }

     /**

     * Get the Vonage / SMS representation of the notification.

     *

     * @param    mixed  $notifiable

     * @return  \Illuminate\Notifications\Messages\VonageMessage

     */

    public function toVonage($notifiable)
    {
        return (new VonageMessage())
            ->content('::LPTP-Surakarta::       Akun anda sudah diverifikasi, silahkan cek email!');
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
