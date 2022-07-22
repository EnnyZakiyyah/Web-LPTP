<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReminderEmailNotifications extends Notification implements ShouldQueue
{
    use Queueable;
    // public $user;
    // public $peminjaman;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->user = $user;
        // $this->peminjaman = $peminjaman;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    // ->line('Peminjam: ' . $this->user->name . '('.$this->user->email.')')
                    ->line('H-1 Pengembalian');
                    // ->action('Check disini', url('/sign-in', $this->user->id));
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
