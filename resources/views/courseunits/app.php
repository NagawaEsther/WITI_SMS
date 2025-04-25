<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Program;
use App\Models\StudentApplication;
use Illuminate\Http\Request;

class StudentApplicationController extends Controller
{
    public function index()
    {
        $applications = StudentApplication::with(['program', 'user'])->get();
        return view('student_applications.index', compact('applications'));
    }




    public function create()
    {
        $users = User::all();
        $programs = Program::all() ; 
        return view('student_applications.create', compact('users','programs'));
        
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'status' => 'required|in:pending,approved,rejected',
            'program_id' => 'required|exists:programs,id',
            'user_id' => 'nullable|exists:users,id',
            'nationality' => 'required|string',
            'guardian_name' => 'required|string',
            'guardian_contact' => 'required|string',
            'interview_date' => 'nullable|date',
            'interview_result' => 'required|in:pending,passed,failed',
            'submitted_documents' => 'required|string',
            'secondary_school' => 'required|string',
            'combination' => 'required|string',
            'points_scored' => 'required|integer',
            'uace_year_of_completion' => 'nullable|string'
        ]);
    
        StudentApplication::create($validatedData);
        $application = StudentApplication::create($request->all());
        $user = User::find($request->user_id);
        return redirect()->route('student_applications.index')
        ->with('success', "{$user->first_name} has been created successfully");


    }

    public function show(StudentApplication $studentApplication)
    {
        return view('student_applications.show', compact('studentApplication'));
    }

    public function edit(StudentApplication $studentApplication)
    {
        return view('student_applications.edit', compact('studentApplication'));
    }

    public function update(Request $request, StudentApplication $studentApplication)
    {
        $validatedData = $request->validate([
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'status' => 'required|in:pending,approved,rejected',
            'program_id' => 'required|exists:programs,id',
            'user_id' => 'nullable|exists:users,id',
            'nationality' => 'required|string',
            'guardian_name' => 'required|string',
            'guardian_contact' => 'required|string',
            'interview_date' => 'nullable|date',
            'interview_result' => 'required|in:pending,passed,failed',
            'submitted_documents' => 'required|string',
            'secondary_school' => 'required|string',
            'combination' => 'required|string',
            'points_scored' => 'required|integer',
            'uace_year_of_completion' => 'nullable|string'
        ]);
      
        $studentApplication->update($validatedData);

        session()->flash('success', "{$studentApplication->user->first_name} has been updated successfully");
    return redirect()->route('students.index');

        
    }

    public function destroy(StudentApplication $studentApplication)
    {
        $studentApplication->delete();
        return redirect()->route('student_applications.index')->with('success', 'Application deleted successfully');
    }

    

    public function bulkDelete(Request $request)
    {
        $ids = explode(',', $request->input('ids'));

        
        StudentApplication::destroy($ids);

        return redirect()->route('student_applications.index')->with('success', 'Selected applications deleted.');
    }
}


<?php
namespace App\Http\Controllers;

use App\Models\StudentApplication;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\User;

class StudentApplicationController extends Controller
{
    public function index()
{
    $applications = StudentApplication::with('program')->get();
    return view('student_applications.index', compact('applications'));
}

   public function create()
    {
        $programs = Program::all();  
        return view('student_applications.create', compact( 'programs'));
       
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:student_applications,email',
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|string|in:Male,Female,Other',
            'date_of_birth' => 'required|date',
            'address' => 'nullable|string',
            'status' => 'nullable|string',
            'program_id' => 'required|exists:programs,id',
            'nationality' => 'nullable|string',
            'guardian_name' => 'nullable|string',
            'guardian_contact' => 'nullable|string',
            'interview_date' => 'nullable|date',
            'interview_result' => 'nullable|string',
            'submitted_documents' => 'nullable|string',
            'secondary_school' => 'nullable|string',
            'combination' => 'nullable|string',
            'points_scored' => 'nullable|numeric',
            'uace_year_of_completion' => 'nullable|integer|min:1900|max:' . date('Y'),
        ]);

        StudentApplication::create($request->all());

        return redirect()->route('student_applications.index')
            ->with('success', 'Student application submitted successfully.');
    }

   public function show(StudentApplication $studentApplication)
    {
        return view('student_applications.show', compact('studentApplication'));
    }

    
    public function edit(StudentApplication $studentApplication)
    {
        $programs = Program::all(); 
        return view('student_applications.edit', compact('studentApplication', 'programs'));
    }
    
    
    public function update(Request $request, StudentApplication $studentApplication)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:student_applications,email,' . $studentApplication->id,
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|string|in:Male,Female,Other',
            'date_of_birth' => 'required|date',
            'address' => 'nullable|string',
            'status' => 'nullable|string',
            'program_id' => 'required|exists:programs,id',
            'nationality' => 'nullable|string',
            'guardian_name' => 'nullable|string',
            'guardian_contact' => 'nullable|string',
            'interview_date' => 'nullable|date',
            'interview_result' => 'nullable|string',
            'submitted_documents' => 'nullable|string',
            'secondary_school' => 'nullable|string',
            'combination' => 'nullable|string',
            'points_scored' => 'nullable|numeric',
            'uace_year_of_completion' => 'nullable|integer|min:1900|max:' . date('Y'),
        ]);

        $studentApplication->update($request->all());

        return redirect()->route('student_applications.index')
            ->with('success', 'Student application updated successfully.');
    }

    
    public function destroy(StudentApplication $studentApplication)
    {
        $studentApplication->delete();

        return redirect()->route('student_applications.index')
            ->with('success', 'Student application deleted successfully.');
    }
} 



