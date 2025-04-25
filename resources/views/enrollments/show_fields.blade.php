{{--
<!-- Student Name Field -->
<div class="form-group">
    {!! Form::label('student_id', 'Student Name:') !!}
    <p>{{ $enrollment->users->name ?? 'N/A' }}</p>
</div>

<!-- Program Name Field -->
<div class="form-group">
    {!! Form::label('program_id', 'Program Name:') !!}
    <p>{{ $enrollment->program->name ?? 'N/A' }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $enrollment->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $enrollment->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $enrollment->updated_at }}</p>
</div> --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Enrollment Details</h2>
    <table class="table table-bordered">
        <tr>
            <th>Student</th>
            <td>{{ $enrollment->student->name }}</td>
        </tr>
        <tr>
            <th>Program</th>
            <td>{{ $enrollment->program->name }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $enrollment->status }}</td>
        </tr>
    </table>

    <div class="form-group">
        <a href="{{ route('enrollments.index') }}" class="btn btn-primary">Back to Enrollments</a>
    </div>
</div>
@endsection