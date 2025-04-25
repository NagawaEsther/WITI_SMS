{{-- @extends('layouts.app')
@section('title')
@lang('models/courses.singular') @lang('crud.details')
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>@lang('models/courses.singular') @lang('crud.details')</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('courses.index') }}" class="btn btn-primary form-btn float-right">@lang('crud.back')</a>
        </div>
    </div>
    @include('stisla-templates::common.errors')
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @include('courses.show_fields')
            </div>
        </div>
    </div>
</section>
@endsection
--}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Course Unit Details</h4>
    <p><strong>Name:</strong> {{ $courseUnit->name }}</p>
    <p><strong>Description:</strong> {{ $courseUnit->description }}</p>


    <p><strong>Course Unit Code:</strong> {{ $courseUnit->course_unit_code }}</p>
    <p><strong>Status:</strong> {{ $courseUnit->status }}</p>
    <p><strong>Semester:</strong> {{ $courseUnit->semester->name }}</p>

    {{-- <p><strong>Semester ID:</strong> {{ $courseUnit->semester_id }}</p> --}}
    <p><strong>Credit Units:</strong> {{ $courseUnit->credit_unit }}</p>
    <p><strong>Duration:</strong> {{ $courseUnit->duration }}</p>
    <p><strong>Start Date:</strong> {{ $courseUnit->startDate }}</p>
    <p><strong>End Date:</strong> {{ $courseUnit->endDate }}</p>
    <p><strong>Total hours:</strong> {{ $courseUnit->totalHours }}</p>
    <p><strong>Total Lessons:</strong> {{ $courseUnit->totalLessons }}</p>
    <p><strong>lastAccessedDate:</strong> {{ $courseUnit->lastAccessedDate }}</p>
    <p><strong>Thumbnail:</strong> {{ $courseUnit->thumbnailUrl }}</p>
    <p><strong>Lecturer name:</strong> {{ $courseUnit->lecturer_name }}</p>
    <p><strong>Lecturer image:</strong> {{ $courseUnit->lecturer_image }}</p>


    <p><strong>Created By:</strong> {{ $courseUnit->created_by }}</p>
    <a href="{{ route('course-units.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection