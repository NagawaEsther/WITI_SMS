@extends('layouts.app')
@section('title')
Cohorts
@endsection
{{-- @if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif --}}

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Lecturers</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('lecturers.create')}}" class="btn btn-primary form-btn">Add Lecturer<i
                    class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @include('lecturers.table')
            </div>
        </div>
    </div>

</section>
@endsection