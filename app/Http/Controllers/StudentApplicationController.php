<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationSubmitted;
use App\Mail\ApplicationApproved;
use App\Models\StudentApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Program;
use App\Models\User;
use App\Models\Student;
use App\Models\Cohorts;
use Illuminate\Support\Str;
use SendGrid;

use Illuminate\Support\Facades\Log;

class StudentApplicationController extends Controller
{
    /**
     * Displaying a listing of the student applications (for admins).
     */
    public function index()
    {

        $applications = StudentApplication::with('program','cohort')->get();
        return view('student_applications.index', compact('applications'));
    }

//     public function index()
// {
//     $applications = StudentApplication::with('program', 'cohort')->latest()->get();
//     return view('student_applications.index', compact('applications'));
// }

    public function create()
    {
        $cohorts = Cohorts::all();
        $programs = Program::all();
        return view('student_applications.create', compact('programs','cohorts'));
    }

    


// Storing the data
public function store(Request $request)
{
    // Validating the incoming request data
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email', // Ensure email is unique in users table
        'phone_number' => 'required|string|max:20|unique:users,phone_number',
        'gender' => 'required|string|in:Male,Female,Other',
        'date_of_birth' => 'required|date',
        'address' => 'nullable|string',
        'program_id' => 'required|exists:programs,id',
        'cohort_id'=> 'required|exists:cohorts,id',
        'nationality' => 'nullable|string',
        'guardian_name' => 'nullable|string',
        'guardian_contact' => 'nullable|string',
        'interview_date' => 'nullable|date',
        'interview_result' => 'nullable|string',
        // 'submitted_documents' => 'nullable|string',
        // 'uce'=> 'nullable|string',               
        // 'uace' => 'nullable|string',              
        // 'national_id' => 'nullable|string',       
        // 'recommendation_letter'=> 'nullable|string',

        'uace' => 'required|file|mimes:pdf,jpg,png|max:7096', // 4MB max size
        'uce' => 'required|file|mimes:pdf,jpg,png|max:7096', // 4MB max size
        'recommendation_letter' => 'required|file|mimes:pdf,jpg,png|max:7096', // 4MB max size
        'national_id' => 'required|file|mimes:pdf,jpg,png|max:7096', // 4MB max size

        'secondary_school' => 'nullable|string',
        'combination' => 'nullable|string',
        'points_scored' => 'nullable|numeric',
        'uace_year_of_completion' => 'nullable|integer|min:1900|max:' . date('Y'),
    ]);

    $documents = [];

    if ($request->hasFile('uce')) {
        $documents['uce'] = $request->file('uce')->store('documents', 'public');
    }

    if ($request->hasFile('uace')) {
        $documents['uace'] = $request->file('uace')->store('documents', 'public');
    }

    if ($request->hasFile('recommendation_letter')) {
        $documents['recommendation_letter'] = $request->file('recommendation_letter')->store('documents', 'public');
    }

    if ($request->hasFile('national_id')) {
        $documents['national_id'] = $request->file('national_id')->store('documents', 'public');
    }


    // Creating the user first
    $user = User::create([
        'first_name' => $request->firstname,
        'last_name' => $request->lastname,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'password' => bcrypt('password123'), 
        'role_id' => 2, 
        'gender' => $request->gender,
        'status' => 'active' 
    ]);

    // Now, creating the student application and associating it with the created user
    $application = StudentApplication::create([
        'user_id' => $user->id, // Linking the created user to the application
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'email' => $request->email,  
        'phone_number' => $request->phone_number,
        'gender' => $request->gender,
        'date_of_birth' => $request->date_of_birth,
        'address' => $request->address,
        'program_id' => $request->program_id,
        'nationality' => $request->nationality,
        'guardian_name' => $request->guardian_name,
        'guardian_contact' => $request->guardian_contact,
        'interview_date' => $request->interview_date,
        'interview_result' => $request->interview_result,
        'cohort_id'=>$request->cohort_id,
        'uce' => $documents['uce'] ?? null,
        'uace' => $documents['uace'] ?? null,
        'recommendation_letter' => $documents['recommendation_letter'] ?? null,
        'national_id' => $documents['national_id'] ?? null,
        // 'uce' => $request->uce,
        // 'uace' => $request->uace,
        // 'recommendation_letter' => $request->recommendation_letter,
        // 'national_id' => $request->national_id,
        // 'submitted_documents' => $request->submitted_documents,
        'secondary_school' => $request->secondary_school,
        'combination' => $request->combination,
        'points_scored' => $request->points_scored,
        'uace_year_of_completion' => $request->uace_year_of_completion,
    ]);


    Mail::to($request->email)->send(new ApplicationSubmitted($request->firstname));

    // Redirecting after successful form submission



    // return redirect()->route('student_applications.index')->with('success', 'Student application submitted successfully.');

    return redirect()->back()->with('success', 'Application submitted successfully!');

}

    /**
     * Displaying a specific student application.
     */
    public function show($id)
    {
        $application = StudentApplication::with('program','cohort')->find($id);

        if (!$application) {
            return redirect()->route('student_pplications.index')->with('error', 'Application not found.');
        }

        return view('student_applications.show', compact('application'));
    }
// Deleting a specific application
        public function destroy($id)
    {
        $application = StudentApplication::find($id);

        if (!$application) {
            return redirect()->route('student_applications.index')->with('error', 'Application not found.');
        }

        $application->delete();

        return redirect()->route('student_applications.index')->with('success', 'Student application deleted successfully.');
    }
// Editing a specific application
    public function edit($id)
    
    {
        $application = StudentApplication::findOrFail($id);
        
        
        $programs = Program::all(); // Fetching all available programs

        return view('student_applications.edit', compact('application', 'programs'));
    }
// Updating a specific application

public function update(Request $request, $id)
{
    $application = StudentApplication::find($id);

    if (!$application) {
        return redirect()->route('student_applications.index')->with('error', 'Application not found.');
    }

    // Validating incoming data
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|unique:student_applications,email,' . $application->id,
        'phone_number' => 'required|string|max:20',
        'gender' => 'required|string|in:Male,Female,Other',
        'date_of_birth' => 'required|date',
        'program_id' => 'required|exists:programs,id',
        'status' => 'required|string|in:approved,pending,rejected',
    ]);

    // Checking if the status is updated to 'approved'
    if ($request->status === 'approved' && $application->status !== 'approved') {
        // Generating a custom registration number
        $year = date('Y'); // Getting current year (e.g., 2025)
        $departmentCode = 'DCSE'; // Adjusting based on the program
        $suffix = 'SS';

        // Getting the last student's registration number and increment
        $lastStudent = Student::whereYear('admission_date', $year)->latest()->first();
        $nextNumber = $lastStudent ? sprintf('%04d', (intval(substr($lastStudent->reg_number, -4)) + 1)) : '0001';
        $regNumber = "REG NO. {$year}/{$departmentCode}/{$nextNumber}/{$suffix}";


// Credentials
        $user = User::find($application->user_id);

        if ($user) {
            // Generating a new temporary password
            $temporaryPassword = Str::random(10);
            $user->password = Hash::make($temporaryPassword);
            $user->save();


        // Creating the student record automatically
        $student = Student::create([
            'user_id' => $application->user_id,
            'reg_number' => $regNumber, // Using the custom registration number
            'admission_date' => now(), // Current date as admission date
            'status' => 'active', // Default status as 'active'
            'cohort_id' =>  $application->cohort_id, 
            'created_by' => auth()->user()->id, // The user performing the action
            'student_application_id' => $application->id, // Linking to the application
        ]);

        // Logging student creation
        Log::info("Student created with Reg Number: {$regNumber} for application ID: {$application->id}");
    }
    

    // Updating the application with the new status
    $application->update($request->all());

    // Sending email notification
    Mail::to($user->email)->send(new ApplicationApproved($user->first_name, $user->email, $temporaryPassword));


    session()->flash('success', "{$application->user->first_name} has been updated successfully");
    return redirect()->route('student_applications.index');

}

}}

