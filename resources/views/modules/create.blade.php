{{-- resources/views/modules/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-4">Add New Module</h4>

    <form action="{{ route('modules.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Course Unit</label>
            <select name="course_unit_id" class="form-select" required>
                <option value="">-- Select Course Unit --</option>
                @foreach($courseUnits as $unit)
                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Module Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Subtitle</label>
            <input type="text" name="subtitle" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Lesson Count</label>
            <input type="number" name="lesson_count" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Duration (e.g. 1h 30m)</label>
            <input type="text" name="duration" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="completed">Completed</option>
                <option value="current">Current</option>
                <option value="locked">Locked</option>
            </select>
        </div>

        {{-- <div class="mb-3">
            <label class="form-label">Icon (Font Awesome class)</label>
            <input type="text" name="icon" class="form-control" placeholder="e.g. fas fa-code">
        </div> --}}

        <div class="mb-3">
            <label for="icon" class="form-label">Choose Icon</label>
            <select name="icon" id="icon" class="form-select">
                <option value="">-- Select Icon --</option>
                <option value="fa-book">📘 Book</option>
                <option value="fa-code">💻 Code</option>
                <option value="fa-database">🗃 Database</option>
                <option value="fa-play">▶ Play</option>
                <option value="fa-video">🎥 Video</option>
            </select>
        </div>


        <button type="submit" class="btn btn-success">Create Module</button>
    </form>
</div>
@endsection