<?php

namespace App\Notifications;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;
    
    public function __construct()
    {
        $this->client = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendWhatsAppMessage($to, $message)
    {
        return $this->client->messages->create(
            "whatsapp:$to",
            [
                'from' => env('TWILIO_WHATSAPP_NUMBER'),
                'body' => $message
            ]
        );
    }
}
