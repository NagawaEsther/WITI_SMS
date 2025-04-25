{{-- @extends('layouts.app')
@section('title')
Enrollment Details
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Enrollment Details</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('enrollments.index') }}" class="btn btn-primary form-btn float-right">Back</a>
        </div>
    </div>
    @include('stisla-templates::common.errors')
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @include('enrollments.show_fields')
            </div>
        </div>
    </div>
</section>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Enrollment Details</h2>
    <table class="table">
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
    <a href="{{ route('enrollments.index') }}" class="btn btn-primary">Back to Enrollments</a>
</div>
@endsection