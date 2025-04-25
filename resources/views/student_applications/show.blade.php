@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Application Details</h1>

    <div class="card">
        <div class="card-header">
            Application ID: {{ $application->id }}
        </div>
        <div class="card-body">
            <p><strong>First name:</strong> {{ $application->firstname }}</p>
            <p><strong>Last name:</strong> {{ $application->lastname }}</p>
            <p><strong>Email:</strong> {{ $application->email }}</p>
            <p><strong>Phone number:</strong> {{ $application->phone_number }}</p>
            <p><strong>Gender:</strong> {{ $application->gender }}</p>
            <p><strong>Date of Birth:</strong> {{ $application->date_of_birth }}</p>
            <p><strong>Address:</strong> {{ $application->address }}</p>
            <p><strong>Status:</strong> {{ ucfirst($application->status) }}</p>
            <p><strong>Program:</strong> {{ $application->program->name }}</p>
            <p><strong>Points Scored:</strong> {{ $application->points_scored }}</p>
            <p><strong>Secondary School:</strong> {{ $application->secondary_school }}</p>
            <p><strong>Guardian Name:</strong> {{ $application->guardian_name }}</p>
            <p><strong>Guardian Contact:</strong> {{ $application->guardian_contact }}</p>
            <p><strong>Nationality:</strong> {{ $application->nationality }}</p>
            <p><strong>Combination:</strong> {{ $application->combination }}</p>
            <p><strong>Interview Date:</strong> {{ $application->interview_date ?
                \Carbon\Carbon::parse($application->interview_date)->format('Y-m-d') : 'N/A' }}</p>
            <p><strong>Interview Date:</strong> {{ $application->interview_date ?
                \Carbon\Carbon::parse($application->interview_date)->format('Y-m-d') : 'N/A' }}</p>

            {{-- <p><strong>Interview Date:</strong> {{ $application->interview_date ?? 'N/A' }}</p> --}}
            <p><strong>Interview Result:</strong> {{ ucfirst($application->interview_result) }}</p>
            {{-- <p><strong>Uce:</strong> {{ ($application->uce) }}</p> --}}

            <p><strong>Uce:</strong> <img src="{{ asset('storage/' . $application->uce) }}" alt="UCE Certificate"
                    style="width: 200px; height: auto;"></p>

            <p><strong>UACE Year of Completion:</strong> {{ $application->uace_year_of_completion ?? 'N/A' }}</p>
        </div>
    </div>

    <a href="{{ route('student_applications.index') }}" class="btn btn-secondary mt-3">Back to Applications List</a>
</div>
@endsection





{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Student Application Details</h4>

    <div class="card shadow-sm">
        <div class="card-header bg-white text-black">
            <h5>Application ID: {{ $application->id }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>First Name:</strong> {{ $application->firstname }}</p>
                    <p><strong>Last Name:</strong> {{ $application->lastname }}</p>
                    <p><strong>Email:</strong> {{ $application->email }}</p>
                    <p><strong>Phone Number:</strong> {{ $application->phone_number }}</p>
                    <p><strong>Gender:</strong> {{ ucfirst($application->gender) }}</p>
                    <p><strong>Date of Birth:</strong> {{ $application->date_of_birth }}</p>
                    <p><strong>Address:</strong> {{ $application->address }}</p>
                    <p><strong>Nationality:</strong> {{ $application->nationality }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($application->status) }}</p>
                </div>

                <div class="col-md-6">
                    <p><strong>Program:</strong> {{ $application->program->name }}</p>
                    <p><strong>Points Scored:</strong> {{ $application->points_scored }}</p>
                    <p><strong>Secondary School:</strong> {{ $application->secondary_school }}</p>
                    <p><strong>Guardian Name:</strong> {{ $application->guardian_name }}</p>
                    <p><strong>Guardian Contact:</strong> {{ $application->guardian_contact }}</p>
                    <p><strong>Combination:</strong> {{ $application->combination }}</p>
                    <p><strong>Interview Date:</strong>
                        {{ $application->interview_date ?
                        \Carbon\Carbon::parse($application->interview_date)->format('Y-m-d') : 'N/A' }}
                    </p>
                    <p><strong>Interview Result:</strong> {{ ucfirst($application->interview_result) }}</p>
                    <p><strong>UACE Year of Completion:</strong> {{ $application->uace_year_of_completion ?? 'N/A' }}
                    </p>
                </div>
            </div>

            <hr>
            <p><strong>UCE Certificate:</strong></p>
            @if($application->uce)
            <img src="{{ asset('storage/' . $application->uce) }}" alt="UCE Certificate" class="img-fluid"
                style="max-width: 200px;">
            @else
            <p class="text-muted">No UCE Certificate uploaded.</p>
            @endif
        </div>
    </div>

    <a href="{{ route('student_applications.index') }}" class="btn btn-secondary mt-3">Back to Applications List</a>
</div>
@endsection --}}