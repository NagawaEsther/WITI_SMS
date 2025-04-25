{{--


@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Assignment for {{ $courseUnit->name }}</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('assignments.store', $courseUnit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Assignment Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}" required>
        </div>

        <div class="mb-3">
            <label for="file_url" class="form-label">Upload Assignment File</label>
            <input type="file" name="file_url" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Create Assignment</button>
        <a href="{{ route('assignments.index', $courseUnit->id) }}" class="btn btn-secondary">Back</a>
    </form>

</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Assignment</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('assignments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="course_unit_id" class="form-label">Select Course Unit</label>
            <select name="course_unit_id" id="course_unit_id" class="form-select" required>
                <option value="">-- Choose Course Unit --</option>
                @foreach ($courseUnits as $unit)
                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Assignment Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}" required>
        </div>

        <div class="mb-3">
            <label for="file_url" class="form-label">Upload File</label>
            <input type="file" name="file_url" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Assignment</button>
    </form>
</div>
@endsection