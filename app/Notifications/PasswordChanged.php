<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordChangedNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Password Has Been Changed')
            ->greeting('Hello ' . $notifiable->first_name . ',')
            ->line('Your password has been changed successfully.')
            ->line('If you did not make this change, please contact support immediately.')
            ->salutation('Best Regards, Pals\' Food Court Team');
    }



    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Your password has been changed successfully.',
        ];
    }
}
