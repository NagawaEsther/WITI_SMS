<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Student;
use Illuminate\Http\Request;

class AssignmentsController extends Controller
{
    public function index()
    {
        $assignments = Assignment::all();
        return view('assignments.index', compact('assignments'));
    }

    public function create()
    {
        $students = Student::all(); // Get all students
        return view('assignments.create', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
        ]);

        Assignment::create($validated);

        return redirect()->route('assignments.index')->with('success', 'Assignment created successfully');
    }

    public function show(Assignment $assignment)
    {
        return view('assignments.show', compact('assignment'));
    }

    public function edit(Assignment $assignment)
    {
        $students = Student::all();
        return view('assignments.edit', compact('assignment', 'students'));
    }

    public function update(Request $request, Assignment $assignment)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
        ]);

        $assignment->update($validated);

        return redirect()->route('assignments.index')->with('success', 'Assignment updated successfully');
    }

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();

        return redirect()->route('assignments.index')->with('success', 'Assignment deleted successfully');
    }
}
