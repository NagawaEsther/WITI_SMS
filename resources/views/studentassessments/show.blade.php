@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Assessment Details</h2>

    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">Student</th>
                    <td>{{ $studentassessment->student->user->first_name }} {{ $studentassessment->student->user->last_name }}</td>
                </tr>
                <tr>
                    <th>Program</th>
                    <td>{{ $studentassessment->program->name }}</td>
                </tr>
                <tr>
                    <th>Course Unit</th>
                    <td>{{ $studentassessment->courseUnit->name }} ({{ $studentassessment->courseUnit->credit_units }} credits)</td>
                </tr>
                <tr>
                    <th>Semester</th>
                    <td>{{ $studentassessment->semester->name }}</td>
                </tr>
                <tr>
                    <th>Year</th>
                    <td>{{ $studentassessment->year->name }}</td>
                </tr>
                <tr>
                    <th>Assessment Type</th>
                    <td>{{ $studentassessment->assessment_type }}</td>
                </tr>
                <tr>
                    <th>Marks</th>
                    <td>
                        Test 1: {{ $studentassessment->marks['test1'] ?? '-' }} |
                        Test 2: {{ $studentassessment->marks['test2'] ?? '-' }} |
                        Assignment: {{ $studentassessment->marks['assignment'] ?? '-' }} |
                        Exam: {{ $studentassessment->marks['exam'] ?? '-' }}
                    </td>
                </tr>
                <tr>
                    <th>Total Marks</th>
                    <td>{{ $studentassessment->total_marks ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Grade</th>
                    <td>{{ $studentassessment->grade }}</td>
                </tr>
                <tr>
                    <th>Lecturer Comments</th>
                    <td>{{ $studentassessment->lecturer_comments ?? 'N/A' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Student CGPA Overview</h5>
            @if(!isset($cgpaData))
                <p>No CGPA data available for this student.</p>
            @else
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px;">Overall CGPA</th>
                        <td>{{ $cgpaData['overall'] }}</td>
                    </tr>
                    <tr>
                        <th>Year-Semester CGPA</th>
                        <td>
                            @if(empty($cgpaData['by_year_semester']))
                                No semester data available
                            @else
                                @foreach($cgpaData['by_year_semester'] as $yearSemester => $cgpa)
                                    <div>{{ $yearSemester }}: {{ $cgpa }}</div>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                </table>
            @endif
        </div>
    </div>

    <div class="d-flex">
        <a href="{{ route('studentassessments.index') }}" class="btn btn-secondary me-2">Back to List</a>
        <a href="{{ route('studentassessments.edit', $studentassessment->id) }}" class="btn btn-warning me-2">Edit</a>
        <form action="{{ route('studentassessments.destroy', $studentassessment->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this assessment?')">Delete</button>
        </form>
    </div>
</div>
@endsection