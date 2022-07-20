<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class AdminNewUserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    /**
     * Create a new notification instance.
     * @param User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'slack'];
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
                    ->line('New user has registered: ' . $this->user->name . '('.$this->user->email.')')
                    ->action('Login to admin panel to approve', url('/dashboard/users', $this->user->id));
                    // ->line('Thank you for using our application!');
    }

        /**
     * Get the Slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
                    ->content($this->user['name']. 'New User Register, Please Check!');
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
            'user_id' => $this->user['id'],
            'name' => $this->user['name'],
            'email' => $this->user['email'],
            'image_foto' => $this->user['image_foto'],
            'phone_number' => $this->user['phone_number']
        ];
    }
}
