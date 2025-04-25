{{-- @extends('layouts.app')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


@section('content')
<div class="container mt-4">
    <h4>Edit Student</h4>
    <div class="card shadow-sm">
        <div class="card-body">


            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $student->user->first_name }}"
                        required>
                </div>

                <div class="form-group">
                    <label>Reg Number</label>
                    <input type="text" name="reg_number" class="form-control" value="{{ $student->reg_number }}"
                        required>
                </div>

                <div class="form-group">
                    <label>Admission Date</label>
                    <input type="date" name="admission_date" class="form-control"
                        value="{{ \Carbon\Carbon::parse($student->admission_date)->format('Y-m-d') }}" required>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $student->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="graduated" {{ $student->status == 'graduated' ? 'selected' : '' }}>Graduated
                        </option>
                        <option value="dropped" {{ $student->status == 'dropped' ? 'selected' : '' }}>Dropped</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Cohort</label>
                    <input type="text" name="cohort" class="form-control" value="{{ $student->cohort->name }}" required>
                </div>

                <!-- Closing the form here -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form> <!-- This was missing -->
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.app')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@section('content')
<div class="container mt-4">
    <h4>Edit Student</h4>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control"
                        value="{{ old('first_name', $student->user->first_name) }}" required>
                </div>

                <div class="form-group">
                    <label for="reg_number">Reg Number</label>
                    <input type="text" id="reg_number" name="reg_number" class="form-control"
                        value="{{ old('reg_number', $student->reg_number) }}" required>
                </div>

                <div class="form-group">
                    <label for="admission_date">Admission Date</label>
                    <input type="date" id="admission_date" name="admission_date" class="form-control"
                        value="{{ old('admission_date', \Carbon\Carbon::parse($student->admission_date)->format('Y-m-d')) }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="active" {{ old('status', $student->status) == 'active' ? 'selected' : ''
                            }}>Active</option>
                        <option value="graduated" {{ old('status', $student->status) == 'graduated' ? 'selected' : ''
                            }}>Graduated</option>
                        <option value="dropped" {{ old('status', $student->status) == 'dropped' ? 'selected' : ''
                            }}>Dropped</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cohort_id">Cohort</label>
                    <select id="cohort_id" name="cohort_id" class="form-control" required>
                        @foreach($cohorts as $cohort)
                        <option value="{{ $cohort->id }}" {{ old('cohort_id', $student->cohort_id) == $cohort->id ?
                            'selected' : '' }}>{{ $cohort->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="created_by">Created By</label>
                    <input type="text" id="created_by" name="created_by" class="form-control"
                        value="{{ old('created_by', $student->created_by) }}" required>
                </div>

                <div class="form-group">
                    <label for="student_application_id">Student Application ID</label>
                    <input type="text" id="student_application_id" name="student_application_id" class="form-control"
                        value="{{ old('student_application_id', $student->student_application_id) }}" required>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection