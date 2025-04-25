@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Recent Activity</h2>
    <form action="{{ route('recent_activities.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="icon" class="form-label">Icon (FontAwesome class or URL)</label>
            <input type="text" name="icon" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection