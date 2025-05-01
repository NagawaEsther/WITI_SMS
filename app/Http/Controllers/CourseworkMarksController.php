<?php

namespace App\Http\Controllers;

use App\Models\StudentAssessment;
use App\Models\Student;
use App\Models\Semester;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseworkMarksController extends Controller
{
    public function index(Request $request)
    {
        // Get the authenticated user and their associated student record
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();

        if (!$student) {
            abort(403, 'No student record found for this user.');
        }

        // Validate filters
        $request->validate([
            'semester_id' => 'nullable|exists:semesters,id',
            'year_id' => 'nullable|exists:years,id',
        ]);

        // Fetch assessments with non-empty coursework marks (test1, test2, or assignment)
        $query = StudentAssessment::with(['program', 'courseUnit', 'semester', 'year'])
            ->where('student_id', $student->id)
            ->where(function ($q) {
                $q->whereNotNull('marks->test1')
                  ->orWhereNotNull('marks->test2')
                  ->orWhereNotNull('marks->assignment');
            });

        if ($request->filled('semester_id')) {
            $query->where('semester_id', $request->semester_id);
        }
        if ($request->filled('year_id')) {
            $query->where('year_id', $request->year_id);
        }

        $assessments = $query->orderBy('created_at', 'desc')->paginate(10);

        // Fetch semesters and years for filters
        $semesters = Semester::all();
        $years = Year::all();

        return view('student_coursework_marks', compact(
            'assessments',
            'student',
            'semesters',
            'years'
        ));
    }
}