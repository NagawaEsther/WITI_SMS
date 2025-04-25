@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Year</h1>
    <form action="{{ route('years.update', $year->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Year Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $year->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Year</button>
        <a href="{{ route('years.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
