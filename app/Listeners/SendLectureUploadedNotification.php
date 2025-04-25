<?php

namespace App\Listeners;

use App\Events\LectureUploaded;
use App\Models\User;
use App\Notifications\NewLectureUploaded;

class SendLectureUploadedNotification
{
    public function handle(LectureUploaded $event)
    {
        // Send notification to all students (you can modify this logic as needed)
        $students = User::where('role', 'student')->get();  // Assuming students have a 'role' attribute
        foreach ($students as $student) {
            $student->notify(new NewLectureUploaded($event->lecture));
        }
    }
}
