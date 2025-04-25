<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\StudentRepository;
use App\Models\Student;
use App\Models\Cohorts;

use App\Models\StudentApplication;
use App\Models\User;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateLearnersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
class StudentController extends Controller
{
    protected $studentsRepository;

    // Injecting StudentRepository via constructor
    public function __construct(StudentRepository $studentsRepository)
    {
        $this->studentsRepository = $studentsRepository;
    }

    
    public function index()
{
    $students = Student::with(['user', 'cohort', 'studentApplication'])
                        ->orderBy('created_at', 'desc') // Order by newest first
                        ->get();
    return view('students.index', compact('students'));
}


// public function index()
// {
//     $user = Auth::user(); // Get the logged-in user

//     if ($user->role === 'admin') {
//         // Admin sees all students in a table
//         $students = Student::with(['user', 'cohort', 'studentApplication'])
//                             ->orderBy('created_at', 'desc')
//                             ->get();
//         return view('students.index', compact('students'));
//     }

//     // For students, show a personalized dashboard
//     return view('students.dashboard', compact('user'));
// }



// public function index()
// {
//     $user = Auth::user(); // Get the logged-in user

//     // Check if the user is an admin
//     if ($user->role === 'admin') {
//         // Admin sees all students in a table
//         $students = Student::with(['user', 'cohort', 'studentApplication'])
//                             ->orderBy('created_at', 'desc')
//                             ->get();
//         return view('students.index', compact('students'));
//     }

//     // For regular students, show only their details
//     $student = Student::where('user_id', $user->id)
//                         ->with(['user', 'cohort', 'studentApplication'])
//                         ->first();

//     if ($student) {
//         return view('students.show', compact('student'));
//     }

//     // If student record not found, redirect with an error
//     return redirect()->route('home')->with('error', 'Student record not found.');
// }


// Foreign keys to be displayed
    public function create()
    {
        $users = User::all();  // Getting all users
        $cohorts = Cohorts::all();  // Getting all cohorts
        $studentApplications = StudentApplication::all();  // Getting all student applications

        return view('students.fields', compact('users', 'cohorts', 'studentApplications'));
    }
  // Storing the data in database
    public function store(StoreStudentRequest $request)
{
    $input = $request->all();

    // Adding the currently logged-in user's ID
    $input['created_by'] = Auth::id();

    // Using only one method to create the student
    $application = $this->studentsRepository->create($input);

    // Getting the user
    $user = User::find($request->user_id);

    // Flash success message
    return redirect()->route('students.index')
        ->with('success', "{$user->first_name} has been created successfully.");
}

// Displaying the student
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // public function edit(Student $student)
    // {    $cohorts = Cohorts::all();// Explicitly allow access

    //     return view('students.edit', compact('student','cohorts'));
    // }

    public function edit(Student $student)
    {
        $cohorts = Cohorts::all();
        $studentApplications = StudentApplication::all();

        return view('students.edit', compact('student', 'cohorts', 'studentApplications'));
    }

//    Updating student

    public function update(UpdateLearnersRequest $request, Student $student)
{
    $validated = $request->validated();  // Ensuring data is validated
    $student->update($validated);        // Updating the student record

    session()->flash('success', "{$student->user->first_name} has been updated successfully");
    return redirect()->route('students.index');
}

// Deleting a student  
    public function destroy(Student $student)
    {
        $student->delete();
        // Session::flash('success', 'Student deleted successfully.');
        session()->flash('success', "{$student->user->first_name} has been deleted successfully");
        return redirect()->route('students.index');
    }
}