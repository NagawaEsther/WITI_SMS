<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\StudentApplication;
use App\Models\Program;

class ApplyNow extends Component
{
    public $firstname, $lastname, $email, $phone_number, $phone_number2, $gender, $date_of_birth, 
           $address, $status, $program_id, $nationality, $guardian_name, $guardian_contact, $interview_date, 
           $interview_result, $submitted_documents, $secondary_school, $combination, $points_scored, $uace_year_of_completion;

    public $programs;

    // Validation rules
    protected $rules = [
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|email|unique:student_applications,email',
        'phone_number' => 'required|string|max:15',
        'gender' => 'required|string',
        'date_of_birth' => 'required|date',
        'program_id' => 'required|exists:programs,id',
        'address' => 'required|string|max:500',
        'nationality' => 'required|string',
        'guardian_name' => 'required|string|max:255',
        'guardian_contact' => 'required|string|max:15',
        'interview_date' => 'nullable|date',
        'interview_result' => 'nullable|string',
        'submitted_documents' => 'nullable|string',
        'secondary_school' => 'nullable|string|max:255',
        'combination' => 'nullable|string|max:255',
        'points_scored' => 'nullable|integer',
        'uace_year_of_completion' => 'nullable|integer',
    ];

    // Mount the component (to get the available programs)
    public function mount()
    {
        $this->programs = Program::all();
    }

    // Submit the application
    public function submitApplication()
    {
        $this->validate();

        // Save the application
        StudentApplication::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'phone_number2' => $this->phone_number2,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
            'status' => 'pending',
            'program_id' => $this->program_id,
            'nationality' => $this->nationality,
            'guardian_name' => $this->guardian_name,
            'guardian_contact' => $this->guardian_contact,
            'interview_date' => $this->interview_date,
            'interview_result' => $this->interview_result,
            'submitted_documents' => $this->submitted_documents,
            'secondary_school' => $this->secondary_school,
            'combination' => $this->combination,
            'points_scored' => $this->points_scored,
            'uace_year_of_completion' => $this->uace_year_of_completion,
        ]);

        // Show a success message
        session()->flash('message', 'Application submitted successfully!');
    }

    public function render()
    {
        return view('livewire.apply-now');
    }
}
