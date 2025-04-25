<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'user_id',
        'reg_number',
        'admission_date',
        'status',
        'cohort_id',
        'created_by',
        'student_application_id'
    ];

    protected $casts = [
        'admission_date' => 'date',
        'status' => 'string'
    ];

    public static $rules = [
        'user_id' => 'required|integer|exists:users,id',
        'reg_number' => 'required|string|unique:students,reg_number',
        'admission_date' => 'required|date',
        'status' => 'required|in:active,graduated,dropped',
        'cohort_id' => 'required|integer|exists:cohorts,id',
        'created_by' => 'required|integer|exists:users,id',
        'student_application_id' => 'required|integer|exists:student_applications,id'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cohort()
    {
        return $this->belongsTo(Cohorts::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function studentApplication()
    {
        return $this->belongsTo(StudentApplication::class);
    }

    public function application()
{
    return $this->belongsTo(StudentApplication::class, 'student_application_id');
}



public function courseUnit()
{
    return $this->belongsToMany(CourseUnit::class,  'course_units_id');
}


}
