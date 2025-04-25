{{-- Lectures/confirm_attendance --}}

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row align-items-center mb-4">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb" class="mb-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('course_units.index') }}" class="text-decoration-none text-secondary">
                            <i class="fas fa-home me-1"></i>Course Units
                        </a>
                    </li>
                    <li class="breadcrumb-item active fw-medium" aria-current="page">Confirm Attendance</li>
                </ol>
            </nav>
            <h2 class="fw-bold mb-0">Confirm Your Attendance</h2>
        </div>
    </div>

    <div class="card border-0 rounded-3 shadow-sm p-5 mb-4">
        <div class="card-body">
            <h5 class="card-title">Lecture: {{ $lecture->title }}</h5>
            <p class="card-text">Please confirm that you want to register your attendance for this lecture.</p>

            <form method="POST" action="{{ route('lectures.register', $lecture->id) }}">
                @csrf
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-check me-2"></i>Confirm Attendance
                </button>
            </form>
        </div>
    </div>
</div>
@endsection