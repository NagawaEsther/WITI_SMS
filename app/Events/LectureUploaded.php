<?php

namespace App\Events;

use App\Models\Lecture;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class LectureUploaded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $lecture;

    public function __construct(Lecture $lecture)
    {
        $this->lecture = $lecture;
    }
}
