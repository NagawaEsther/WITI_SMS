@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Lecture</h4>

    <form action="{{ route('lectures.update', $lecture->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $lecture->title) }}"
                required>
        </div>

        <div class="form-group">
            <label for="course_units_id">Course Unit</label>
            <select class="form-control" id="course_units_id" name="course_units_id" required>
                @foreach ($courseUnits as $courseUnit)
                <option value="{{ $courseUnit->id }}" {{ $courseUnit->id == $lecture->course_units_id ? 'selected' : ''
                    }}>
                    {{ $courseUnit->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description"
                name="description">{{ old('description', $lecture->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time"
                value="{{ old('start_time', $lecture->start_time) }}">
        </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time"
                value="{{ old('end_time', $lecture->end_time) }}">
        </div>

        <div class="form-group">
            <label for="video_url">Video URL</label>
            <input type="url" class="form-control" id="video_url" name="video_url"
                value="{{ old('video_url', $lecture->video_url) }}">
        </div>

        <div class="form-group">
            <label for="lecture_file">Lecture File</label>
            <input type="file" class="form-control" id="lecture_file" name="lecture_file">
            @if($lecture->file_path)
            <p>Current File: <a href="{{ asset('storage/' . $lecture->file_path) }}" target="_blank">Download</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Lecture</button>
    </form>
</div>
@endsection