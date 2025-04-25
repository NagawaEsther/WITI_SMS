<!-- resources/views/upcoming_activities/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <h5>Edit Upcoming Activity</h5>

            <!-- Display validation errors -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('upcoming_activities.update', $activity->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Use PUT for updates -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ old('title', $activity->title) }}" required>
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" name="time" id="time"
                        value="{{ old('time', $activity->time) }}" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status" required>
                        <option value="Due Soon" {{ $activity->status == 'Due Soon' ? 'selected' : '' }}>Due Soon
                        </option>
                        <option value="Completed" {{ $activity->status == 'Completed' ? 'selected' : '' }}>Completed
                        </option>
                        <option value="Pending" {{ $activity->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="icon">Icon (Font Awesome)</label>
                    <input type="text" class="form-control" name="icon" id="icon"
                        value="{{ old('icon', $activity->icon) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Activity</button>
            </form>
        </div>
    </div>
</div>
@endsection