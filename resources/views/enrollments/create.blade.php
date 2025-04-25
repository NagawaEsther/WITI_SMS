@extends('layouts.app')
@section('title')
Create Enrollment
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading m-0">New Enrollment</h3>
        <div class="filter-container section-header-breadcrumb row justify-content-md-end">
            <a href="{{ route('enrollments.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <div class="content">
        @include('stisla-templates::common.errors')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body ">
                            {!! Form::open(['route' => 'enrollments.store']) !!}
                            <div class="row">
                                @include('enrollments.fields')
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Enrollment</h2>
    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="student_id">Student</label>
            <select name="student_id" id="student_id" class="form-control">
                @foreach ($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="program_id">Program</label>
            <select name="program_id" id="program_id" class="form-control">
                @foreach ($programs as $program)
                <option value="{{ $program->id }}">{{ $program->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" id="status" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Enrollment</button>
    </form>
</div>
@endsection --}}