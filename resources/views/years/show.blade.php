@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Year Details</h1>
    <div class="mb-3">
        <label class="form-label"><strong>Name</strong></label>
        <p>{{ $year->name }}</p>
    </div>
    <a href="{{ route('years.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('years.edit', $year->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
