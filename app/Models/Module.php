<?php

// app/Models/Module.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_unit_id',
        'title',
        'subtitle',
        'lesson_count',
        'duration',
        'status',
        'icon'
    ];

    public function courseUnit()
    {
        return $this->belongsTo(CourseUnit::class);
    }
}
