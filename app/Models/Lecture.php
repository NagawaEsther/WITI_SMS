<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Events\LectureUploaded; 
class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'course_units_id', 'start_time',  // Add start_time to the fillable array
    'end_time','file_path', 'video_url','status', 'posted_by'
    ];

    public function courseUnit()
{
    return $this->belongsTo(CourseUnit::class, 'course_units_id');
}



// app/Models/Lecture.php

// app/Models/Lecture.php

// public function attendance()
// {
//     return $this->hasMany(Attendance::class, 'lecture_id');
// }


public function getQrCodeUrl()
    {
        $url = route('attendance.register', ['lecture' => $this->id]);
        return QrCode::size(200)->generate($url);
    }

    // protected static function booted()
    // {
    //     parent::boot();

    //     static::created(function ($lecture) {
    //         event(new LectureUploaded($lecture));  // Trigger the event
    //     });
    // }
    


}