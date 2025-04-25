<?php

namespace App\Models;

// use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Cohorts extends Model
{
    use HasFactory;

    public $table = 'cohorts';

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'status',
        'number_of_students',
        'expected_graduation_date',
        'curriculum',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'name' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'status' => 'string',
        'number_of_students' => 'integer',
        'expected_graduation_date' => 'date',
        'curriculum' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public static $rules = [
        // 'name' => 'required|string|unique:cohorts,name|min:5|max:150',
        'name' => 'required|string|min:5|max:150|unique:cohorts,name,' ,
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after:start_date',
        'status' => 'required|in:active,inactive',
        'number_of_students' => 'integer|min:0',
        'expected_graduation_date' => 'required|date|after:start_date',
        'curriculum' => 'required|in:old,new',
        'created_at' => 'nullable|date',
        'updated_at' => 'nullable|date'
    ];


    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
