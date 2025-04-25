<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'due_date', 'file_url', 'course_unit_id'];

    public function courseUnit()
    {
        return $this->belongsTo(CourseUnit::class);
    }
}
