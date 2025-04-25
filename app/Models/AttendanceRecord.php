<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'qr_session_id',
        'course_units_id',
        'status',
        'ip_address',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function qrSession()
    {
        return $this->belongsTo(QrSession::class);
    }

    public function courseUnit()
    {
        return $this->belongsTo(CourseUnit::class,'course_units_id');
    }
}
