<?php

namespace App\Notifications;

use Twilio\Rest\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class WhatsAppChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toWhatsApp($notifiable);


        $to = $notifiable->routeNotificationFor('WhatsApp');
        $from = config('services.twilio.whatsapp_from');


        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));


        return $twilio->messages->create('whatsapp:' . $to, [
            "from" => 'whatsapp:' . $from,
            "body" => $message->content
        ]);
    }
}
