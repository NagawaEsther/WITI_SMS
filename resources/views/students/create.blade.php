{{--
<!-- resources/views/students/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Student</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        @include('students.fields')
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection --}}

@extends('layouts.app')

@section('title', 'Create New Student')

@section('content')
<div class="container">
    <h1 class="my-4">Create New Student</h1>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Create New Student</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <!-- User ID -->
                    <div class="form-group col-md-6">
                        <label for="user_id">User</label>
                        <select name="user_id" class="form-control" id="user_id" required>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $student->user_id ?? '') == $user->id ?
                                'selected' : '' }}>
                                {{ $user->first_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Registration Number -->
                    <div class="form-group col-md-6">
                        <label for="reg_number">Reg Number</label>
                        <input type="text" name="reg_number" class="form-control" id="reg_number"
                            value="{{ old('reg_number', $student->reg_number ?? '') }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <!-- Admission Date -->
                    <div class="form-group col-md-6">
                        <label for="admission_date">Admission Date</label>
                        <input type="date" name="admission_date" class="form-control" id="admission_date"
                            value="{{ old('admission_date', $student->admission_date ?? '') }}" required>
                    </div>

                    <!-- Status -->
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status" required>
                            <option value="active" {{ old('status', $student->status ?? '') == 'active' ? 'selected' :
                                '' }}>Active</option>
                            <option value="graduated" {{ old('status', $student->status ?? '') == 'graduated' ?
                                'selected' : '' }}>Graduated</option>
                            <option value="dropped" {{ old('status', $student->status ?? '') == 'dropped' ? 'selected' :
                                '' }}>Dropped</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <!-- Cohort -->
                    <div class="form-group col-md-6">
                        <label for="cohort_id">Cohort</label>
                        <select name="cohort_id" class="form-control" id="cohort_id" required>
                            @foreach($cohorts as $cohort)
                            <option value="{{ $cohort->id }}" {{ old('cohort_id', $student->cohort_id ?? '') ==
                                $cohort->id ? 'selected' : '' }}>
                                {{ $cohort->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Created By -->
                    <div class="form-group col-md-6">
                        <label for="created_by">Created By</label>
                        <select name="created_by" class="form-control" id="created_by" required>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('created_by', $student->created_by ?? '') ==
                                $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <!-- Student Application ID -->
                    <div class="form-group col-md-6">
                        <label for="student_application_id">Student Application ID</label>
                        <select name="student_application_id" class="form-control" id="student_application_id" required>
                            @foreach($studentApplications as $application)
                            <option value="{{ $application->id }}" {{ old('student_application_id', $student->
                                student_application_id ?? '') == $application->id ? 'selected' : '' }}>
                                {{ $application->id }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block mt-4">Create Student</button>
            </form>
        </div>
    </div>
</div>
@endsection