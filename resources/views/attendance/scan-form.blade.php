@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Mark Attendance</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5>Course: {{ $qrSession->courseunit->name }}</h5>
                        <p>Lecture: {{ $qrSession->lecture->title }}</p>
                        <p>Session ends at: {{ $qrSession->end_time->format('H:i') }}</p>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="{{ route('attendance.mark', $sessionCode) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="student_id" class="form-label">Student ID/Number</label>
                            <input type="text" name="student_id" id="student_id" class="form-control" required
                                autofocus>
                            <small class="form-text text-muted">Enter your student ID to mark your attendance</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Mark My Attendance</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection