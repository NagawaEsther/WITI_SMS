@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create QR Attendance Session</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('qr-sessions.store') }}" method="POST">
                @csrf

                {{-- <div class="mb-3">
                    <label for="courseunit_id" class="form-label">Course Unit</label>
                    <select name="courseunit_id" id="courseunit_id" class="form-control" required>
                        <option value="">Select Course Unit</option>
                        @foreach($courseunits as $courseunit)
                        <option value="{{ $courseunit->id }}">{{ $courseunit->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <label for="course_units_id" class="form-label">Course Unit</label>

                <select name="course_units_id" id="course_units_id" class="form-control" required>
                    <option value="">Select Course Unit</option>
                    @foreach($courseUnits as $courseunit)
                    <option value="{{ $courseunit->id }}">{{ $courseunit->name }}</option>
                    @endforeach
                </select>


                {{-- <div class="mb-3">
                    <label for="lecture_id" class="form-label">Lecturer</label>
                    <select name="lecture_id" id="lecture_id" class="form-control" required>
                        <option value="">Select Lecture</option>
                        @foreach($lecturers as $lecture)
                        <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                        @endforeach
                    </select>
                </div> --}}


                <div class="mb-3">
                    <label for="lecture_id" class="form-label">Lecture</label>
                    <select name="lecture_id" id="lecture_id" class="form-control" required>
                        <option value="">Select Lecture</option>
                        @foreach($lectures as $lecture)
                        <option value="{{ $lecture->id }}">{{ $lecture->title }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    <label for="duration" class="form-label">Session Duration (minutes)</label>
                    <input type="number" name="duration" id="duration" class="form-control" min="5" max="180" value="60"
                        required>
                </div>

                <button type="submit" class="btn btn-primary">Create Session</button>
                <a href="{{ route('qr-sessions.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection