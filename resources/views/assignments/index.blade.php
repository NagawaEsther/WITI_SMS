{{--



@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Assignments for {{ $courseUnit->name }}</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('assignments.create', $courseUnit->id) }}" class="btn btn-primary mb-3">Add Assignment</a>

    @if($courseUnit->assignments->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Due Date</th>
                <th>File URL</th>
                <th>Course unit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courseUnit->assignments as $assignment)
            <tr>
                <td>{{ $assignment->title }}</td>
                <td>{{ \Carbon\Carbon::parse($assignment->due_date)->format('F d, Y') }}</td>

                <td>
                    <a href="{{ asset('storage/' . $assignment->file_url) }}" target="_blank">View File</a>
                </td>

                <td>{{ $assignment->courseUnit->name ?? 'Unknown' }}</td>

                <td>
                    <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No assignments yet.</p>
    @endif
</div>
@endsection --}}


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Assignments for {{ $courseUnit->name }}</h1>

    <a href="{{ route('assignments.create', $courseUnit->id) }}" class="btn btn-primary">Create Assignment</a>

    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Due Date</th>
                <th>File</th>
                <th>Course unit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courseUnit->assignments as $assignment)
            <tr>
                <td>{{ $assignment->title }}</td>
                <td>{{ \Carbon\Carbon::parse($assignment->due_date)->format('F d, Y') }}</td>
                <td>
                    <a href="{{ Storage::url($assignment->file_url) }}" target="_blank">Download</a>
                </td>
                <td>{{ $assignment->courseUnit->name }}</td>
                <td>
                    <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">All Assignments</h1>

    <a href="{{ route('assignments.create') }}" class="btn btn-primary mb-3">Create Assignment</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if($courseUnits->isEmpty())
    <p>No assignments found.</p>
    @else
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Course Unit</th>
                <th>Title</th>
                <th>Due Date</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courseUnits as $courseUnit)
            @php
            $firstAssignment = true;
            @endphp
            @foreach($courseUnit->assignments as $assignment)
            <tr>
                <!-- Show Course Unit only for the first assignment -->
                @if($firstAssignment)
                <td rowspan="{{ $courseUnit->assignments->count() }}">{{ $courseUnit->name }}</td>
                @php
                $firstAssignment = false;
                @endphp
                @endif
                <td>{{ $assignment->title }}</td>
                <td>{{ \Carbon\Carbon::parse($assignment->due_date)->format('F d, Y') }}</td>
                <td>
                    <a href="{{ Storage::url($assignment->file_url) }}" target="_blank">Download</a>
                </td>
                <td>
                    <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection