<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'lectures_id',
        'course_units_id',
        'session_code',
        'start_time',
        'end_time',
        'is_active',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_active' => 'boolean',
    ];

    // public function lecture()
    // {
    //     return $this->belongsTo(Lecture::class);
    // }

    // public function courseUnit()
    // {
    //     return $this->belongsTo(CourseUnit::class);
    // }

    public function lecture()
{
    return $this->belongsTo(Lecture::class, 'lectures_id');
}

public function courseUnit()
{
    return $this->belongsTo(CourseUnit::class, 'course_units_id');
}

    public function attendanceRecords()
    {
        return $this->hasMany(AttendanceRecord::class);
    }
}
