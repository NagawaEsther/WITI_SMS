<?php

namespace App\Http\Controllers;

use App\Models\StudentAssessment;
use App\Models\Student;
use App\Models\Program;
use App\Models\CourseUnit;
use App\Models\Semester;
use App\Models\Year;
use Illuminate\Http\Request;

class StudentAssessmentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::all();
        $programs = Program::all();
        $courseUnits = CourseUnit::all();
        $semesters = Semester::all();
        $years = Year::all();

        $query = StudentAssessment::with(['student.user', 'program', 'courseUnit', 'semester', 'year']);

        if ($request->student_id) {
            $query->where('student_id', $request->student_id);
        }
        if ($request->semester_id) {
            $query->where('semester_id', $request->semester_id);
        }
        if ($request->year_id) {
            $query->where('year_id', $request->year_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('student.user', function ($q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%");
                })
                ->orWhereHas('courseUnit', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })
                ->orWhere('assessment_type', 'like', "%{$search}%")
                ->orWhere('lecturer_comments', 'like', "%{$search}%")
                ->orWhere('total_marks', 'like', "%{$search}%")
                ->orWhere('grade', 'like', "%{$search}%");
            });
        }

        $query->orderBy('created_at', 'desc');
        $assessments = $query->paginate($request->get('perPage', 10));
        $cgpaData = $this->calculateCGPA($students);

        return view('studentassessments.index', compact(
            'assessments', 'students', 'programs', 'courseUnits', 'semesters', 'years', 'cgpaData'
        ));
    }

    public function create()
    {
        $students = Student::all();
        $programs = Program::all();
        $semesters = Semester::all();
        $years = Year::all();

        return view('studentassessments.create', compact(
            'students', 'programs', 'semesters', 'years'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'program_id' => 'required|exists:programs,id',
            'course_unit_id' => 'required|exists:course_units,id',
            'semester_id' => 'required|exists:semesters,id',
            'year_id' => 'required|exists:years,id',
            'assessment_type' => 'required|in:Continuous Assessment,Final Grade Calculation',
            'test1' => 'nullable|numeric|min:0|max:40',
            'test2' => 'nullable|numeric|min:0|max:40',
            'assignment' => 'nullable|numeric|min:0|max:40',
            'exam' => 'nullable|numeric|min:0|max:60',
            'lecturer_comments' => 'nullable|string',
        ]);

        $marksData = [
            'test1' => $request->test1 ?? '-',
            'test2' => $request->test2 ?? '-',
            'assignment' => $request->assignment ?? '-',
            'exam' => $request->exam ?? '-'
        ];

        $calc = $this->calculateTotalMarksAndGrade($marksData);

        StudentAssessment::create([
            'student_id' => $request->student_id,
            'program_id' => $request->program_id,
            'course_unit_id' => $request->course_unit_id,
            'semester_id' => $request->semester_id,
            'year_id' => $request->year_id,
            'assessment_type' => $request->assessment_type,
            'marks' => $marksData,
            'total_marks' => $calc['total'],
            'grade' => $calc['grade'],
            'lecturer_comments' => $request->lecturer_comments,
        ]);

        return redirect()->route('studentassessments.index')
            ->with('success', 'Assessment added successfully.');
    }

    public function show(StudentAssessment $studentassessment)
    {
        $studentassessment->load(['student.user', 'program', 'courseUnit', 'semester', 'year']);
        $cgpaData = $this->calculateCGPA(collect([$studentassessment->student]))[$studentassessment->student->id];
        return view('studentassessments.show', compact('studentassessment', 'cgpaData'));
    }

    // public function getCourseUnitsByProgram($programId)
    // {
    //     $courseUnits = CourseUnit::where('program_id', $programId)->get(['id', 'name']);
    //     return response()->json($courseUnits);
    // }

    public function edit(StudentAssessment $studentassessment)
    {
        $students = Student::all();
        $programs = Program::all();
        $courseUnits = CourseUnit::all();
        $semesters = Semester::all();
        $years = Year::all();

        $studentassessment->load(['student.user', 'program', 'courseUnit', 'semester', 'year']);
        return view('studentassessments.edit', compact(
            'studentassessment', 'students', 'programs', 'courseUnits', 'semesters', 'years'
        ));
    }

    public function update(Request $request, StudentAssessment $studentassessment)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'program_id' => 'required|exists:programs,id',
            'course_unit_id' => 'required|exists:course_units,id',
            'semester_id' => 'required|exists:semesters,id',
            'year_id' => 'required|exists:years,id',
            'assessment_type' => 'required|in:Continuous Assessment,Final Grade Calculation',
            'test1' => 'nullable|numeric|min:0|max:40',
            'test2' => 'nullable|numeric|min:0|max:40',
            'assignment' => 'nullable|numeric|min:0|max:40',
            'exam' => 'nullable|numeric|min:0|max:60',
            'lecturer_comments' => 'nullable|string',
        ]);

        $marksData = [
            'test1' => $request->test1 ?? '-',
            'test2' => $request->test2 ?? '-',
            'assignment' => $request->assignment ?? '-',
            'exam' => $request->exam ?? '-'
        ];

        $calc = $this->calculateTotalMarksAndGrade($marksData);

        $studentassessment->update([
            'student_id' => $request->student_id,
            'program_id' => $request->program_id,
            'course_unit_id' => $request->course_unit_id,
            'semester_id' => $request->semester_id,
            'year_id' => $request->year_id,
            'assessment_type' => $request->assessment_type,
            'marks' => $marksData,
            'total_marks' => $calc['total'],
            'grade' => $calc['grade'],
            'lecturer_comments' => $request->lecturer_comments,
        ]);

        return redirect()->route('studentassessments.index')
            ->with('success', 'Assessment updated successfully.');
    }

    public function destroy(StudentAssessment $studentassessment)
    {
        $studentassessment->delete();
        return redirect()->route('studentassessments.index')
            ->with('success', 'Assessment deleted successfully.');
    }

    private function calculateTotalMarksAndGrade($marks)
    {
        $test1 = $marks['test1'] === '-' ? 0 : (float)$marks['test1'];
        $test2 = $marks['test2'] === '-' ? 0 : (float)$marks['test2'];
        $assignment = $marks['assignment'] === '-' ? 0 : (float)$marks['assignment'];
        $exam = $marks['exam'] === '-' ? 0 : (float)$marks['exam'];

        $total_score = $test1 + $test2 + $assignment; // Max 120
        $final_coursework_score = ($total_score / 120) * 40; // Scale to 40
        $total = $final_coursework_score + $exam; // Max 100 (40 + 60)

        if ($total >= 80) $grade = 'A';
        elseif ($total >= 75) $grade = 'B+';
        elseif ($total >= 70) $grade = 'B';
        elseif ($total >= 65) $grade = 'C+';
        elseif ($total >= 60) $grade = 'C';
        elseif ($total >= 55) $grade = 'C-';
        elseif ($total >= 50) $grade = 'D+';
        elseif ($total >= 45) $grade = 'D';
        elseif ($total >= 40) $grade = 'D-';
        else $grade = 'F';

        return ['total' => round($total, 2), 'grade' => $grade];
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