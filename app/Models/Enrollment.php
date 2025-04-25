<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Enrollment
 * @package App\Models
 * @version February 4, 2025, 11:47 am UTC
 *
 * @property integer $student_id
 * @property integer $program_id
 * @property string $status
 */
class Enrollment extends Model
{

    use HasFactory;

    public $table = 'enrollments';
    



    public $fillable = [
        'student_id',
        'program_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'student_id' => 'integer',
        'program_id' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'student_id' => 'required|integer|exists:students,id',
        'program_id' => 'required|integer|exists:programs,id',
        // 'status' => 'required'
        'status' => 'required|in:active,inactive'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // Relationship with Program
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    
}
