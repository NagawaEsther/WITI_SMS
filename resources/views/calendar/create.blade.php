<!-- resources/views/calendar/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="card p-4">
    <h5>Add Academic Calendar Event</h5>

    <form method="POST" action="{{ route('calendar.store') }}">
        @csrf
        <div class="mb-3">
            <label>Title/Activity</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>End Date (optional)</label>
            <input type="date" name="end_date" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description (optional)</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('calendar.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection