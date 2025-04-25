@extends('layouts.app')
@section('title')
Student Applications
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Student Applications</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('student_applications.create')}}" class="btn btn-primary form-btn"> Add Student
                Application <i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @include('student_applications.table')
            </div>
        </div>
    </div>

</section>
@endsection