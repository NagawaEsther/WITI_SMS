<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\CourseUnit;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    // // Show assignments under a specific course unit
    // public function index($courseUnitId)
    // {
    //     $courseUnit = CourseUnit::with('assignments')->findOrFail($courseUnitId);
    //     return view('assignments.index', compact('courseUnit'));
    // }

    // // Show form to create a new assignment
    // public function create($courseUnitId)
    // {
    //     $courseUnit = CourseUnit::findOrFail($courseUnitId);
    //     return view('assignments.create', compact('courseUnit'));
    // }

    // // Store new assignment
    // public function store(Request $request, $courseUnitId)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'due_date' => 'required|date',
    //         'file_url' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,txt|max:10240',
    //         // 'file_url' => 'required|url',
    //     ]);

    //     $filePath = $request->file('file_url')->store('assignments', 'public'); // 'assignments' folder under 'public'


    //     Assignment::create([
    //         'title' => $request->title,
    //         'due_date' => $request->due_date,
    //         'file_url' => $filePath,
    //         'course_unit_id' => $courseUnitId,
    //     ]);

    //     return redirect()->route('assignments.index', $courseUnitId)->with('success', 'Assignment created successfully.');
    // }

    // // Delete an assignment
    // public function destroy($id)
    // {
    //     $assignment = Assignment::findOrFail($id);
    //     $courseUnitId = $assignment->course_unit_id;
    //     $assignment->delete();

    //     return redirect()->route('assignments.index', $courseUnitId)->with('success', 'Assignment deleted.');
    // }

    // hey
    
    // Show assignments under a specific course unit
    // public function index($courseUnitId)
    // {
    //     $courseUnit = CourseUnit::with('assignments')->findOrFail($courseUnitId);
    //     return view('assignments.index', compact('courseUnit'));
    // }

    // // Show form to create a new assignment
    // public function create()
    // {
    //     $courseUnits = CourseUnit::all(); // Get all course units for selection
    //     return view('assignments.create', compact('courseUnits'));
    // }

    // // Store new assignment
    // public function store(Request $request, $courseUnitId)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'due_date' => 'required|date',
    //         'file_url' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,txt|max:10240',
    //     ]);

    //     // Handle file upload and store it in the public disk
    //     $filePath = $request->file('file_url')->store('assignments', 'public'); // 'assignments' folder under 'public'

    //     // Store the assignment in the database
    //     Assignment::create([
    //         'title' => $request->title,
    //         'due_date' => $request->due_date,
    //         'file_url' => $filePath,
    //         // 'course_unit_id' => $request->course_unit_id, 
    //         'course_unit_id' => $courseUnitId,
    //     ]);

    //     return redirect()->route('assignments.index', $courseUnitId)->with('success', 'Assignment created successfully.');
    // }

    // // Delete an assignment
    // public function destroy($id)
    // {
    //     $assignment = Assignment::findOrFail($id);
    //     $courseUnitId = $assignment->course_unit_id;
    //     $assignment->delete();

    //     return redirect()->route('assignments.index', $courseUnitId)->with('success', 'Assignment deleted.');
    // }



    // Show assignments for a specific course unit
    // public function index($courseUnitId)
    // {
    //     $courseUnit = CourseUnit::with('assignments')->findOrFail($courseUnitId);
    //     return view('assignments.index', compact('courseUnit'));
    // }
    public function index()
{
    $courseUnits = CourseUnit::with('assignments')->get();
    return view('assignments.index', compact('courseUnits'));
}


    // Show form to create an assignment (with dropdown of all course units)
    public function create()
    {
        $courseUnits = CourseUnit::all(); // Get all course units
        return view('assignments.create', compact('courseUnits'));
    }

    // Store new assignment (with selected course unit)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'due_date' => 'required|date',
            'file_url' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,txt|max:10240',
            'course_unit_id' => 'required|exists:course_units,id',
        ]);

        $filePath = $request->file('file_url')->store('assignments', 'public');

        Assignment::create([
            'title' => $request->title,
            'due_date' => $request->due_date,
            'file_url' => $filePath,
            'course_unit_id' => $request->course_unit_id,
        ]);

        return redirect()->route('assignments.index', $request->course_unit_id)
                         ->with('success', 'Assignment created successfully.');
    }

    public function destroy($id)
{
    $assignment = Assignment::findOrFail($id);
    $courseUnitId = $assignment->course_unit_id;
    $assignment->delete();

    return redirect()->route('assignments.index', ['courseUnitId' => $courseUnitId])
                     ->with('success', 'Assignment deleted.');
}

}

