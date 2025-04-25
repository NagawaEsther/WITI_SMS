{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Course Unit</h1>
    {!! Form::model($courseUnit, ['route' => ['course-units.update', $courseUnit->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('semester', 'Semester') !!}
        {!! Form::text('semester', null, ['class' => 'form-control', 'required']) !!}
    </div>
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
        {!! Form::label('semester_id', 'Semester ID') !!}
        {!! Form::number('semester_id', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('credit_unit', 'Credit Unit') !!}
        {!! Form::number('credit_unit', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('created_by', 'Created By') !!}
        {!! Form::number('created_by', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Course Unit', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection --}}

@extends('layouts.app')
<?php
use App\Models\Semester;
$semesters =  Semester::pluck('name', 'id') ;
?>
@section('content')


<div class="container">
    <h1>Edit Course Unit</h1>

    <!-- Form to update course unit -->
    {!! Form::model($courseUnit, ['route' => ['course-units.update', $courseUnit->id], 'method' => 'PUT']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('semester_id', 'Semester') !!}
        {!! Form::select('semester_id', $semesters, $courseUnit->semester_id, ['class' => 'form-control', 'required'])
        !!}
        <!-- This will pre-select the semester for editing -->
    </div>

    {{-- <div class="form-group">
        {!! Form::label('course_unit_code', 'Course Unit Code') !!}
        {!! Form::text('course_unit_code', null, ['class' => 'form-control']) !!}
    </div> --}}
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
        {!! Form::number('credit_unit', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('created_by', 'Created By') !!}
        {!! Form::number('created_by', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('thumbnailUrl', 'Thumbnail') !!}
        {!! Form::text('thumbnailUrl', null, ['class' => 'form-control', 'required']) !!}
    </div>



    <div class="form-group">
        {!! Form::label('duration', 'Duration') !!}
        {!! Form::text('duration', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('startDate', 'Start Date') !!}
        {!! Form::date('startDate', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('endDate', 'End Date') !!}
        {!! Form::date('endDate', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('totalLessons', 'Total Lessons') !!}
        {!! Form::number('totalLessons', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('totalHours', 'Total Hours') !!}
        {!! Form::number('totalHours', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('lecturer_name', 'Lecturer Name') !!}
        {!! Form::text('lecturer_name', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('lecturer_image', 'Lecturer Image') !!}
        {!! Form::text('lecturer_image', null, ['class' => 'form-control', 'required']) !!}
    </div>









    <div class="form-group">
        {!! Form::submit('Update Course Unit', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
</div>
@endsection