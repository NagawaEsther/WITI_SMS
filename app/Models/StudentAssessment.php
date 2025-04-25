<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'program_id',
        'course_unit_id',
        'semester_id',
        'year_id',
        'assessment_type',
        'marks',
        'total_marks',
        'grade',
        'lecturer_comments',
    ];

    protected $casts = [
        'marks' => 'array', // Cast JSON to array
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function courseUnit()
    {
        return $this->belongsTo(CourseUnit::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public static function calculateTotalMarksAndGrade($marksData)
    {
        $continuous = 0;
        $count = 0;
        
        // Calculate Continuous Assessment (40%)
        $test1 = $marksData['test1'] ?? 0;
        $test2 = $marksData['test2'] ?? 0;
        $assignment = $marksData['assignment'] ?? 0;
        
        if ($test1 !== '-' && is_numeric($test1)) {
            $continuous += $test1;
            $count++;
        }
        if ($test2 !== '-' && is_numeric($test2)) {
            $continuous += $test2;
            $count++;
        }
        if ($assignment !== '-' && is_numeric($assignment)) {
            $continuous += $assignment;
            $count++;
        }

        $continuousAvg = $count > 0 ? ($continuous / $count) * 0.4 : 0;
        $exam = $marksData['exam'] ?? 0;
        $examScore = is_numeric($exam) ? $exam * 0.6 : 0;

        $total = $continuousAvg + $examScore;

        // Calculate grade
        $grade = '';
        if ($total >= 80) $grade = 'A';
        elseif ($total >= 75) $grade = 'A-';
        elseif ($total >= 70) $grade = 'B+';
        elseif ($total >= 65) $grade = 'B';
        elseif ($total >= 60) $grade = 'B-';
        elseif ($total >= 55) $grade = 'C+';
        elseif ($total >= 50) $grade = 'C';
        elseif ($total >= 45) $grade = 'C-';
        elseif ($total >= 40) $grade = 'D';
        else $grade = 'F';

        return ['total' => round($total, 2), 'grade' => $grade];
    }
}