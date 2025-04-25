@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Course Unit</h1>
    {!! Form::open(['route' => 'course-units.store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <select class="form-control" name="semester_id" required>
        @foreach($semesters as $semester)
        <option value="{{ $semester->id }}">{{ $semester->name }}</option>
        @endforeach
    </select>

    <div class="form-group">
        {!! Form::label('course_unit_code', 'Course Unit Code') !!}
        {!! Form::text('course_unit_code', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status') !!}
        {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], null, ['class' => 'form-control'])
        !!}
    </div>

    <div class="form-group">
        {!! Form::label('credit_unit', 'Credit Unit') !!}
        {!! Form::number('credit_unit', 3, ['class' => 'form-control']) !!}
    </div>

    <!-- New Fields for the Course Unit -->
    <div class="form-group">
        {!! Form::label('thumbnailUrl', 'Thumbnail URL') !!}
        {!! Form::text('thumbnailUrl', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('duration', 'Duration') !!}
        {!! Form::text('duration', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('startDate', 'Start Date') !!}
        {!! Form::date('startDate', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('endDate', 'End Date') !!}
        {!! Form::date('endDate', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('totalLessons', 'Total Lessons') !!}
        {!! Form::number('totalLessons', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('totalHours', 'Total Hours') !!}
        {!! Form::number('totalHours', null, ['class' => 'form-control']) !!}
    </div>

    {{-- <div class="form-group">
        {!! Form::label('lastAccessedDate', 'Last Accessed Date') !!}
        {!! Form::date('lastAccessedDate', null, ['class' => 'form-control']) !!}
    </div> --}}

    <div class="form-group">
        {!! Form::label('lastAccessedDate', 'Last Accessed Date') !!}
        {!! Form::date('lastAccessedDate', old('lastAccessedDate', now()->format('Y-m-d')), ['class' => 'form-control'])
        !!}
    </div>



    <!-- Instructor Fields -->
    {{-- <div class="form-group">
        {!! Form::label('lecturer_id', 'Lecturer ID') !!}
        {!! Form::text('lecturer[id]', null, ['class' => 'form-control']) !!}
    </div> --}}

    <div class="form-group">
        {!! Form::label('lecturer_name', 'Lecturer Name') !!}
        {!! Form::text('lecturer_name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('lecturer_image', 'Lecturer Avatar URL') !!}
        {!! Form::text('lecturer_image', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Create Course Unit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@endsection