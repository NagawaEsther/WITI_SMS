{{-- register.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h3>Confirm Attendance for Lecture ID: {{ $lecture_id }}</h3>

    <!-- Attendance Registration Form -->
    <form method="POST" action="{{ route('attendance.submit', $lecture_id) }}">
        @csrf
        <button type="submit" class="btn btn-success">Register Attendance</button>
    </form>
</div>
@endsection