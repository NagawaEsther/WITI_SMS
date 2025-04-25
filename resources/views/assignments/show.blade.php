@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $assignment->title }}</h1>

    <p><strong>Student:</strong> {{ $assignment->student->name }}</p>
    <p><strong>Description:</strong> {{ $assignment->description ?? 'No description provided' }}</p>
    <p><strong>Due Date:</strong> {{ $assignment->due_date->format('Y-m-d') }}</p>
</div>
@endsection