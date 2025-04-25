<!-- resources/views/upcoming_activities/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <h5>Create Upcoming Activity</h5>

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

            <form action="{{ route('upcoming_activities.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" name="time" id="time" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status" required>
                        <option value="Due Soon">Due Soon</option>
                        <option value="Completed">Completed</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="icon">Icon (Font Awesome)</label>
                    <input type="text" class="form-control" name="icon" id="icon" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Activity</button>
            </form>
        </div>
    </div>
</div>
@endsection