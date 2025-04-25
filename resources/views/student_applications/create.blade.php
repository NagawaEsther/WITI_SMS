{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Create Student Application</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('student_applications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control"
                        value="{{ old('firstname') }}" required>
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                        value="{{ old('phone_number') }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone_number2" class="form-label">Alternate Phone Number</label>
                    <input type="text" name="phone_number2" id="phone_number2" class="form-control"
                        value="{{ old('phone_number2') }}">
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old('gender')=='Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender')=='Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender')=='Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                        value="{{ old('date_of_birth') }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                </div>


            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="program_id" class="form-label">Program</label>
                    <select name="program_id" id="program_id" class="form-control" required>
                        <option value="">Select Program</option>
                        @foreach ($programs as $program)
                        <option value="{{ $program->id }}" {{ old('program_id')==$program->id ? 'selected' : '' }}>{{
                            $program->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="cohort_id" class="form-label">Cohort</label>
                        <select name="cohort_id" id="cohort_id" class="form-control" required>
                            <option value="">Select Cohort</option>
                            @foreach ($cohorts as $cohort)
                            <option value="{{ $cohort->id }}" {{ old('cohort_id')==$cohort->id ? 'selected' : '' }}>{{
                                $cohort->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="mb-3">
                        <label for="nationality" class="form-label">Nationality</label>
                        <input type="text" name="nationality" id="nationality" class="form-control"
                            value="{{ old('nationality') }}">
                    </div>

                    <div class="mb-3">
                        <label for="guardian_name" class="form-label">Guardian Name</label>
                        <input type="text" name="guardian_name" id="guardian_name" class="form-control"
                            value="{{ old('guardian_name') }}">
                    </div>

                    <div class="mb-3">
                        <label for="guardian_contact" class="form-label">Guardian Contact</label>
                        <input type="text" name="guardian_contact" id="guardian_contact" class="form-control"
                            value="{{ old('guardian_contact') }}">
                    </div>

                    <div class="mb-3">
                        <label for="interview_date" class="form-label">Interview Date</label>
                        <input type="date" name="interview_date" id="interview_date" class="form-control"
                            value="{{ old('interview_date') }}">
                    </div>



                    <div class="mb-3">
                        <label for="interview_result" class="form-label">Interview Result</label>
                        <select name="interview_result" id="interview_result" class="form-control">
                            <option value="">Select Interview Result</option>
                            <option value="Passed" {{ old('interview_result')=='Passed' ? 'selected' : '' }}>Passed
                            </option>
                            <option value="Failed" {{ old('interview_result')=='Failed' ? 'selected' : '' }}>Failed
                            </option>
                            <option value="Pending" {{ old('interview_result')=='Pending' ? 'selected' :''}}>Pending
                            </option>
                        </select>
                    </div>



                    <div class="mb-3">
                        <label for="secondary_school" class="form-label">Secondary School</label>
                        <input type="text" name="secondary_school" id="secondary_school" class="form-control"
                            value="{{ old('secondary_school') }}">
                    </div>

                    <div class="mb-3">
                        <label for="combination" class="form-label">Combination</label>
                        <input type="text" name="combination" id="combination" class="form-control"
                            value="{{ old('combination') }}">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Application Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="pending" {{ old('status')=='pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ old('status')=='approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ old('status')=='rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>



                    <div class="mb-3">
                        <label for="points_scored" class="form-label">Points Scored</label>
                        <input type="number" step="0.01" name="points_scored" id="points_scored" class="form-control"
                            value="{{ old('points_scored') }}">
                    </div>

                    <div class="mb-3">
                        <label for="uce_certificate" class="form-label">UCE Certificate</label>
                        <input type="file" name="uce" id="uce" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="uace_certificate" class="form-label">UACE Certificate</label>
                        <input type="file" name="uace" id="uace" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="national_id" class="form-label">National ID</label>
                        <input type="file" name="national_id" id="national_id" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="recommendation_letter" class="form-label">Recommendation Letter</label>
                        <input type="file" name="recommendation_letter" id="recommendation_letter" class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="uace_year_of_completion" class="form-label">UACE Year of Completion</label>
                        <input type="number" name="uace_year_of_completion" id="uace_year_of_completion"
                            class="form-control" value="{{ old('uace_year_of_completion') }}" min="1900"
                            max="{{ date('Y') }}">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>
</div>
@endsection --}}



@extends('layouts.app')

@section('content')
<h4 class="mb-4">Create New Application</h4>

<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('student_applications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <!-- First Column (Left) -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control"
                        value="{{ old('firstname') }}" required>
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                        value="{{ old('phone_number') }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone_number2" class="form-label">Alternate Phone Number</label>
                    <input type="text" name="phone_number2" id="phone_number2" class="form-control"
                        value="{{ old('phone_number2') }}">
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old('gender')=='Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender')=='Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('gender')=='Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                        value="{{ old('date_of_birth') }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                </div>

                <div class="mb-3">
                    <label for="program_id" class="form-label">Program</label>
                    <select name="program_id" id="program_id" class="form-control" required>
                        <option value="">Select Program</option>
                        @foreach ($programs as $program)
                        <option value="{{ $program->id }}" {{ old('program_id')==$program->id ? 'selected' : '' }}>{{
                            $program->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="cohort_id" class="form-label">Cohort</label>
                    <select name="cohort_id" id="cohort_id" class="form-control" required>
                        <option value="">Select Cohort</option>
                        @foreach ($cohorts as $cohort)
                        <option value="{{ $cohort->id }}" {{ old('cohort_id')==$cohort->id ? 'selected' : '' }}>{{
                            $cohort->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nationality" class="form-label">Nationality</label>
                    <input type="text" name="nationality" id="nationality" class="form-control"
                        value="{{ old('nationality') }}">
                </div>

                <div class="mb-3">
                    <label for="guardian_name" class="form-label">Guardian Name</label>
                    <input type="text" name="guardian_name" id="guardian_name" class="form-control"
                        value="{{ old('guardian_name') }}">
                </div>

                <div class="mb-3">
                    <label for="guardian_contact" class="form-label">Guardian Contact</label>
                    <input type="text" name="guardian_contact" id="guardian_contact" class="form-control"
                        value="{{ old('guardian_contact') }}">
                </div>
            </div>

            <!-- Second Column (Right) -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="interview_date" class="form-label">Interview Date</label>
                    <input type="date" name="interview_date" id="interview_date" class="form-control"
                        value="{{ old('interview_date') }}">
                </div>

                <div class="mb-3">
                    <label for="interview_result" class="form-label">Interview Result</label>
                    <select name="interview_result" id="interview_result" class="form-control">
                        <option value="">Select Interview Result</option>
                        <option value="Passed" {{ old('interview_result')=='Passed' ? 'selected' : '' }}>Passed</option>
                        <option value="Failed" {{ old('interview_result')=='Failed' ? 'selected' : '' }}>Failed</option>
                        <option value="Pending" {{ old('interview_result')=='Pending' ? 'selected' : '' }}>Pending
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="secondary_school" class="form-label">Secondary School</label>
                    <input type="text" name="secondary_school" id="secondary_school" class="form-control"
                        value="{{ old('secondary_school') }}">
                </div>

                <div class="mb-3">
                    <label for="combination" class="form-label">Combination</label>
                    <input type="text" name="combination" id="combination" class="form-control"
                        value="{{ old('combination') }}">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Application Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">Select Status</option>
                        <option value="pending" {{ old('status')=='pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ old('status')=='approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ old('status')=='rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="points_scored" class="form-label">Points Scored</label>
                    <input type="number" step="0.01" name="points_scored" id="points_scored" class="form-control"
                        value="{{ old('points_scored') }}">
                </div>

                <div class="mb-3">
                    <label for="uce_certificate" class="form-label">UCE Certificate</label>
                    <input type="file" name="uce" id="uce" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="uace_certificate" class="form-label">UACE Certificate</label>
                    <input type="file" name="uace" id="uace" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="national_id" class="form-label">National ID</label>
                    <input type="file" name="national_id" id="national_id" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="recommendation_letter" class="form-label">Recommendation Letter</label>
                    <input type="file" name="recommendation_letter" id="recommendation_letter" class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label for="uace_year_of_completion" class="form-label">UACE Year of Completion</label>
                    <input type="number" name="uace_year_of_completion" id="uace_year_of_completion"
                        class="form-control" value="{{ old('uace_year_of_completion') }}" min="1900"
                        max="{{ date('Y') }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Submit Application</button>
    </form>
</div>
@endsection