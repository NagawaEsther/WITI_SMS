{{--
<?php
use App\Models\Program;
$programs = Program::pluck('name','id');
$cohorts = Cohorts::pluck('name','id');

?>


@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Student Application</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('student_applications.update', $application->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control"
                        value="{{ old('firstname', $application->firstname) }}" required>
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control"
                        value="{{ old('lastname', $application->lastname) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email', $application->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                        value="{{ old('phone_number', $application->phone_number) }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone_number2" class="form-label">Alternate Phone Number</label>
                    <input type="text" name="phone_number2" id="phone_number2" class="form-control"
                        value="{{ old('phone_number2', $application->phone_number2) }}">
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old('gender', $application->gender) == 'Male' ? 'selected' : ''
                            }}>Male</option>
                        <option value="Female" {{ old('gender', $application->gender) == 'Female' ? 'selected' :
                            '' }}>Female</option>
                        <option value="Other" {{ old('gender', $application->gender) == 'Other' ? 'selected' : ''
                            }}>Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                        value="{{ old('date_of_birth', $application->date_of_birth) }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control"
                        value="{{ old('address', $application->address) }}">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Application Status</label>
                    <input type="text" name="status" id="status" class="form-control"
                        value="{{ old('status', $application->status) }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="program_id" class="form-label">Program</label>
                    <select name="program_id" id="program_id" class="form-control" required>
                        <option value="">Select Program</option>
                        @foreach ($programs as $program)
                        <option value="{{ $program->id }}" {{ old('program_id', $application->program_id) ==
                            $program->id ? 'selected' : '' }}>{{ $program->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nationality" class="form-label">Nationality</label>
                    <input type="text" name="nationality" id="nationality" class="form-control"
                        value="{{ old('nationality', $application->nationality) }}">
                </div>

                <div class="mb-3">
                    <label for="guardian_name" class="form-label">Guardian Name</label>
                    <input type="text" name="guardian_name" id="guardian_name" class="form-control"
                        value="{{ old('guardian_name', $application->guardian_name) }}">
                </div>

                <div class="mb-3">
                    <label for="guardian_contact" class="form-label">Guardian Contact</label>
                    <input type="text" name="guardian_contact" id="guardian_contact" class="form-control"
                        value="{{ old('guardian_contact', $application->guardian_contact) }}">
                </div>

                <div class="mb-3">
                    <label for="interview_date" class="form-label">Interview Date</label>
                    <input type="date" name="interview_date" id="interview_date" class="form-control"
                        value="{{ old('interview_date', $application->interview_date) }}">
                </div>

                <div class="mb-3">
                    <label for="interview_result" class="form-label">Interview Result</label>
                    <input type="text" name="interview_result" id="interview_result" class="form-control"
                        value="{{ old('interview_result', $application->interview_result) }}">
                </div>

                <div class="mb-3">
                    <label for="submitted_documents" class="form-label">Submitted Documents</label>
                    <input type="text" name="submitted_documents" id="submitted_documents" class="form-control"
                        value="{{ old('submitted_documents', $application->submitted_documents) }}">
                </div>

                <div class="mb-3">
                    <label for="secondary_school" class="form-label">Secondary School</label>
                    <input type="text" name="secondary_school" id="secondary_school" class="form-control"
                        value="{{ old('secondary_school', $application->secondary_school) }}">
                </div>

                <div class="mb-3">
                    <label for="combination" class="form-label">Combination</label>
                    <input type="text" name="combination" id="combination" class="form-control"
                        value="{{ old('combination', $application->combination) }}">
                </div>

                <div class="mb-3">
                    <label for="points_scored" class="form-label">Points Scored</label>
                    <input type="number" step="0.01" name="points_scored" id="points_scored" class="form-control"
                        value="{{ old('points_scored', $application->points_scored) }}">
                </div>

                <div class="mb-3">
                    <label for="uace_year_of_completion" class="form-label">UACE Year of Completion</label>
                    <input type="number" name="uace_year_of_completion" id="uace_year_of_completion"
                        class="form-control"
                        value="{{ old('uace_year_of_completion', $application->uace_year_of_completion) }}" min="1900"
                        max="{{ date('Y') }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Application</button>
    </form>
</div>
@endsection --}}


@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Student Application</h2>

    <form action="{{ route('student_applications.update', $application->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" class="form-control"
                value="{{ old('firstname', $application->firstname) }}" required>
        </div>

        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" class="form-control"
                value="{{ old('lastname', $application->lastname) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control"
                value="{{ old('email', $application->email) }}" required>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control"
                value="{{ old('phone_number', $application->phone_number) }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="Male" {{ old('gender', $application->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender', $application->gender) == 'Female' ? 'selected' : '' }}>Female
                </option>
                <option value="Other" {{ old('gender', $application->gender) == 'Other' ? 'selected' : '' }}>Other
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                value="{{ old('date_of_birth', $application->date_of_birth) }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control"
                value="{{ old('address', $application->address) }}">
        </div>

        <div class="form-group">
            <label for="program_id">Program</label>
            <select name="program_id" id="program_id" class="form-control" required>
                @foreach ($programs as $program)
                <option value="{{ $program->id }}" {{ old('program_id', $application->program_id) == $program->id ?
                    'selected' : '' }}>
                    {{ $program->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" id="nationality" class="form-control"
                value="{{ old('nationality', $application->nationality) }}">
        </div>
        {{-- <div class="mb-3">
            <label for="status" class="form-label">Application Status</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ old('status') }}">
        </div> --}}
        <div class="form-group">
            <label for="status">Application Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">Select Application Status</option>
                <option value="pending" {{ old('status', $application->status) == 'pending' ? 'selected' : '' }}>Pending
                </option>
                <option value="approved" {{ old('status', $application->status) == 'approved' ? 'selected' : ''
                    }}>Approved</option>
                <option value="rejected" {{ old('status', $application->status) == 'rejected' ? 'selected' : ''
                    }}>Rejected</option>
            </select>
        </div>



        <div class="form-group">
            <label for="guardian_name">Guardian Name</label>
            <input type="text" name="guardian_name" id="guardian_name" class="form-control"
                value="{{ old('guardian_name', $application->guardian_name) }}">
        </div>

        <div class="form-group">
            <label for="guardian_contact">Guardian Contact</label>
            <input type="text" name="guardian_contact" id="guardian_contact" class="form-control"
                value="{{ old('guardian_contact', $application->guardian_contact) }}">
        </div>

        {{-- <div class="form-group">
            <label for="interview_date">Interview Date</label>
            <input type="date" name="interview_date" id="interview_date" class="form-control"
                value="{{ old('interview_date', $application->interview_date) }}">
        </div> --}}
        <div class="form-group">
            <label for="interview_date">Interview Date</label>
            <input type="date" name="interview_date" id="interview_date" class="form-control"
                value="{{ old('interview_date', optional($application->interview_date)->format('Y-m-d')) }}">
        </div>


        {{-- <div class="form-group">
            <label for="interview_result">Interview Result</label>
            <input type="text" name="interview_result" id="interview_result" class="form-control"
                value="{{ old('interview_result', $application->interview_result) }}">
        </div> --}}

        <div class="form-group">
            <label for="interview_result">Interview Result</label>
            <select name="interview_result" id="interview_result" class="form-control">
                <option value="">Select Interview Result</option>
                <option value="passed" {{ old('interview_result', $application->interview_result) == 'passed' ?
                    'selected' : ''
                    }}>Passed</option>
                <option value="failed" {{ old('interview_result', $application->interview_result) == 'failed' ?
                    'selected' : ''
                    }}>Failed</option>
                <option value="pending" {{ old('interview_result', $application->interview_result) == 'pending' ?
                    'selected' :
                    '' }}>Pending</option>
            </select>
        </div>

        <div class="form-group">
            <label for="submitted_documents">Submitted Documents</label>
            <input type="text" name="submitted_documents" id="submitted_documents" class="form-control"
                value="{{ old('submitted_documents', $application->submitted_documents) }}">
        </div>

        <div class="form-group">
            <label for="secondary_school">Secondary School</label>
            <input type="text" name="secondary_school" id="secondary_school" class="form-control"
                value="{{ old('secondary_school', $application->secondary_school) }}">
        </div>



        <div class="form-group">
            <label for="combination">Combination</label>
            <input type="text" name="combination" id="combination" class="form-control"
                value="{{ old('combination', $application->combination) }}">
        </div>

        <div class="form-group">
            <label for="uce">Uce</label>
            <input type="file" name="uce" id="uce" class="form-control" value="{{ old('uce', $application->uce) }}">
        </div>

        <div class="form-group">
            <label for="points_scored">Points Scored</label>
            <input type="text" name="points_scored" id="points_scored" class="form-control"
                value="{{ old('points_scored', $application->points_scored) }}">
        </div>

        <div class="form-group">
            <label for="uace_year_of_completion">UACE Year of Completion</label>
            <input type="number" name="uace_year_of_completion" id="uace_year_of_completion" class="form-control"
                value="{{ old('uace_year_of_completion', $application->uace_year_of_completion) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Application</button>
    </form>
</div>
@endsection