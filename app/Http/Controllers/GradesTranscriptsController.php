<?php

namespace App\Http\Controllers;

use App\Models\StudentAssessment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class GradesTranscriptsController extends Controller
{
    public function index(Request $request)
    {
        // Get the authenticated user and their associated student record
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();

        if (!$student) {
            abort(403, 'No student record found for this user.');
        }

        // Fetch student assessments
        $query = StudentAssessment::with(['program', 'courseUnit', 'semester', 'year'])
            ->where('student_id', $student->id);

        if ($request->filled('semester_id')) {
            $query->where('semester_id', $request->semester_id);
        }
        if ($request->filled('year_id')) {
            $query->where('year_id', $request->year_id);
        }

        $assessments = $query->orderBy('created_at', 'desc')->paginate(10);

        // Calculate CGPA
        $cgpaData = $this->calculateCGPA(collect([$student]))[$student->id];

        return view('student_grades_transcripts', compact(
            'assessments',
            'cgpaData',
            'student'
        ));
    }

    public function downloadTranscript(Request $request)
    {
        // Get the authenticated user and their associated student record
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();

        if (!$student) {
            abort(403, 'No student record found for this user.');
        }

        // Fetch student assessments
        $query = StudentAssessment::with(['program', 'courseUnit', 'semester', 'year'])
            ->where('student_id', $student->id);

        if ($request->filled('semester_id')) {
            $query->where('semester_id', $request->semester_id);
        }
        if ($request->filled('year_id')) {
            $query->where('year_id', $request->year_id);
        }

        $assessments = $query->orderBy('created_at', 'desc')->get(); // No pagination for PDF

        // Calculate CGPA
        $cgpaData = $this->calculateCGPA(collect([$student]))[$student->id];

        // Generate PDF
        $pdf = Pdf::loadView('pdf_transcript', compact('assessments', 'cgpaData', 'student'));
        return $pdf->download('transcript_' . $student->id . '.pdf');
    }

    private function calculateCGPA($students)
    {
        $cgpaData = [];

        foreach ($students as $student) {
            $assessments = StudentAssessment::where('student_id', $student->id)
                ->where('assessment_type', 'Final Grade Calculation')
                ->with(['courseUnit', 'year', 'semester'])
                ->get();

            $totalPoints = 0;
            $totalCredits = 0;
            $byYearSemester = [];

            foreach ($assessments as $assessment) {
                $credits = $assessment->courseUnit->credit_units ?? 1;
                $gradePoint = match ($assessment->grade) {
                    'A' => 5.0, 'B+' => 4.5, 'B' => 4.0, 'C+' => 3.5, 'C' => 3.0,
                    'C-' => 2.5, 'D+' => 2.0, 'D' => 1.5, 'D-' => 1.0, default => 0.0
                };

                $totalPoints += $gradePoint * $credits;
                $totalCredits += $credits;

                $yearSemester = "{$assessment->year->name}-{$assessment->semester->name}";
                if (!isset($byYearSemester[$yearSemester])) {
                    $byYearSemester[$yearSemester] = ['points' => 0, 'credits' => 0];
                }
                $byYearSemester[$yearSemester]['points'] += $gradePoint * $credits;
                $byYearSemester[$yearSemester]['credits'] += $credits;
            }

            $overallCGPA = $totalCredits > 0 ? round($totalPoints / $totalCredits, 2) : 0;
            $cgpaByYearSemester = [];
            foreach ($byYearSemester as $key => $data) {
                $cgpaByYearSemester[$key] = $data['credits'] > 0 ? round($data['points'] / $data['credits'], 2) : 0;
            }

            $cgpaData[$student->id] = [
                'overall' => $overallCGPA,
                'by_year_semester' => $cgpaByYearSemester
            ];
        }

        return $cgpaData;
    }
}