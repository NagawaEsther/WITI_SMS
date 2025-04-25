@extends('layouts.app')

@section('content')

<h1>Upcoming Activity Details</h1>

<div class="container">
    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <h3>{{ $activity->title }}</h3>
            <p><strong>Time:</strong> {{ $activity->time }}</p>
            <p><strong>Status:</strong> {{ $activity->status }}</p>
            <p><strong>Icon:</strong> <i class="{{ $activity->icon }}"></i></p>
            <div class="mt-3">
                <a href="{{ route('upcoming_activities.edit', $activity->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('upcoming_activities.destroy', $activity->id) }}" method="POST"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="{{ route('upcoming_activities.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
        </div>
    </div>
</div>

@endsection