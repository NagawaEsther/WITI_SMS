@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Lecture</h2>

    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}

    <form method="POST" action="{{ route('lectures.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Lecture Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="mb-3">
            <label for="course_units_id" class="form-label">Course Unit</label>
            <select class="form-control" name="course_units_id" required>
                <option value="">Select Course Unit</option>
                @foreach($courseUnits as $unit)
                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (optional)</label>
            <textarea class="form-control" name="description"></textarea>
        </div>

        <div class="mb-3">
            <label for="lecture_file" class="form-label">Lecture File (optional)</label>
            <input type="file" class="form-control" name="lecture_file">
        </div>

        <div class="mb-3">
            <label for="video_url" class="form-label">Video URL (optional)</label>
            <input type="url" class="form-control" name="video_url">
        </div>

        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" class="form-control" value="{{ old('start_time') }}">
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" class="form-control" value="{{ old('end_time') }}">
        </div>


        <button type="submit" class="btn btn-primary">Upload Lecture</button>
    </form>
</div>
@endsection