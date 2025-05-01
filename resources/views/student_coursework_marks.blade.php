@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Coursework Marks</h2>

    <!-- Filters -->
    <form method="GET" action="{{ route('student.coursework') }}">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="semester_id">Semester</label>
                <select name="semester_id" id="semester_id" class="form-control">
                    <option value="">All Semesters</option>
                    @foreach($semesters as $semester)
                        <option value="{{ $semester->id }}" {{ request('semester_id') == $semester->id ? 'selected' : '' }}>
                            {{ $semester->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="year_id">Year</label>
                <select name="year_id" id="year_id" class="form-control">
                    <option value="">All Years</option>
                    @foreach($years as $year)
                        <option value="{{ $year->id }}" {{ request('year_id') == $year->id ? 'selected' : '' }}>
                            {{ $year->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 align-self-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Coursework Marks Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Course Unit</th>
                <th>Program</th>
                <th>Semester</th>
                <th>Year</th>
                <th>Test 1</th>
                <th>Test 2</th>
                <th>Assignment</th>
                <th>Lecturer Comments</th>
            </tr>
        </thead>
        <tbody>
            @forelse($assessments as $assessment)
                <tr>
                    <td>{{ $assessment->courseUnit->name }}</td>
                    <td>{{ $assessment->program->name }}</td>
                    <td>{{ $assessment->semester->name }}</td>
                    <td>{{ $assessment->year->name }}</td>
                    <td>{{ $assessment->marks['test1'] ?? '-' }}</td>
                    <td>{{ $assessment->marks['test2'] ?? '-' }}</td>
                    <td>{{ $assessment->marks['assignment'] ?? '-' }}</td>
                    <td>{{ $assessment->lecturer_comments ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No coursework marks found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $assessments->links() }}
</div>
@endsection