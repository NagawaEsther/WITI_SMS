<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Lecture;

class NewLectureUploaded extends Notification
{
    public $lecture;

    public function __construct(Lecture $lecture)
    {
        $this->lecture = $lecture;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];  // You can add more channels like 'sms' if required
    }

    public function toDatabase($notifiable)
    {
        return [
            'lecture_title' => $this->lecture->title,
            'lecture_description' => $this->lecture->description,
            'lecture_url' => route('lectures.show', $this->lecture->id),
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('A new lecture has been uploaded: ' . $this->lecture->title)
                    ->action('View Lecture', route('lectures.show', $this->lecture->id))
                    ->line('Thank you for using our application!');
    }
}
