@extends('layouts.app')
@section('title')
Course Units
@endsection
{{-- @if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif --}}

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Course-Units</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('course-units.create')}}" class="btn btn-primary form-btn">Course Units <i
                    class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @include('courses.table')
            </div>
        </div>
    </div>

</section>
@endsection