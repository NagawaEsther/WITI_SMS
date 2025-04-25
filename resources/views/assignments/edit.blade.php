@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Assignment</h1>

    <form action="{{ route('assignments.update', $assignment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="student_id">Student</label>
            <select name="student_id" id="student_id" class="form-control">
                @foreach($students as $student)
                <option value="{{ $student->id }}" @if($assignment->student_id == $student->id) selected @endif>{{
                    $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $assignment->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $assignment->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control"
                value="{{ $assignment->due_date->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Assignment</button>
    </form>
</div>
@endsection