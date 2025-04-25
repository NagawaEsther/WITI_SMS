<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CourseUnit extends Model
{
    use HasFactory;

    // Specify the table name if it's not the default (optional)
    protected $table = 'course_units'; // Only if your table name is different from the plural form of the model

    // Allow mass assignment for the following fields
    protected $fillable = [
        'name',
        'description',
        'semester',
        'course_unit_code',
        'status',
        'semester_id',
        'credit_unit',
        'created_by',
        'thumbnailUrl',
        'duration',
        'startDate',
        'endDate',
        'totalLessons',
        'totalHours',
        'lastAccessedDate',
        'lecturer_id',
        'lecturer_name',
        'lecturer_image',
    ];

    // If you want to allow timestamps, make sure they are enabled (default is true)
    public $timestamps = true; // Optional, Laravel enables timestamps by default

    /**
     * Define the relationship between CourseUnit and Semester.
     * Assuming you have a Semester model and 'semester_id' is a foreign key
     */
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    /**
     * Define the relationship between CourseUnit and User (created_by).
     * Assuming you have a User model and 'created_by' is a foreign key referencing the User table
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Define the many-to-many relationship between CourseUnit and User (students enrolled in the course)
    public function users()
    {
        return $this->belongsToMany(User::class, 'course_unit_user', 'course_unit_id', 'user_id');
    }

    // You can define a custom getter for instructor attributes
    public function getInstructorAttribute()
    {
        return [
            'id' => $this->lecturer_id,
            'name' => $this->lecturer_name,
            'avatarUrl' => $this->lecturer_image
        ];
    }


    // public function lectures()
    // {
    //     return $this->hasMany(Lecture::class);
    // }

    // In CourseUnit Model (App\Models\CourseUnit.php)
public function lectures()
{
    return $this->hasMany(Lecture::class, 'course_units_id'); // Make sure this is correct
}

public function assignments()
{
    return $this->hasMany(Assignment::class);
}

// CourseUnit.php
public function modules()
{
    return $this->hasMany(Module::class);
}



    
}

