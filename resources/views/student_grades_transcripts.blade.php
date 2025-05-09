@extends('layouts.app')

@section('content')
<section class="student-grades-transcripts">
    <div class="container-fluid">
        <!-- Grades & Transcripts -->
        <div class="card shadow-sm mb-4" style="border-left: 4px solid #800000;">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0" style="color: #800000;">Grades & Transcripts</h5>
                <a href="{{ route('student.download-transcript') }}" class="btn btn-sm btn-outline-secondary">Download Transcript</a>
            </div>
            <div class="card-body">
                <!-- Filters -->
                <form method="GET" action="{{ route('student.grades-transcripts') }}" class="mb-4">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <select name="semester_id" class="form-select" style="border-color: #b8a373;">
                                <option value="">All Semesters</option>
                                @foreach (\App\Models\Semester::all() as $semester)
                                    <option value="{{ $semester->id }}" {{ request('semester_id') == $semester->id ? 'selected' : '' }}>
                                        {{ $semester->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="year_id" class="form-select" style="border-color: #b8a373;">
                                <option value="">All Years</option>
                                @foreach (\App\Models\Year::all() as $year)
                                    <option value="{{ $year->id }}" {{ request('year_id') == $year->id ? 'selected' : '' }}>
                                        {{ $year->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="assessment_types[]" class="form-select" multiple style="border-color: #b8a373;">
                                <option value="test1" {{ in_array('test1', request('assessment_types', [])) ? 'selected' : '' }}>Test 1</option>
                                <option value="test2" {{ in_array('test2', request('assessment_types', [])) ? 'selected' : '' }}>Test 2</option>
                                <option value="assignment" {{ in_array('assignment', request('assessment_types', [])) ? 'selected' : '' }}>Assignment</option>
                                <option value="exam" {{ in_array('exam', request('assessment_types', [])) ? 'selected' : '' }}>Exam</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn w-100" style="background-color: #800000; color: white; border: none;">Filter</button>
                        </div>
                    </div>
                </form>

                <!-- Accordion for Grades and Transcript -->
                <div class="accordion" id="gradesTranscriptsAccordion">
                    <!-- Grades Table -->
                    <div class="accordion-item" style="border: none;">
                        <h2 class="accordion-header" id="gradesHeading">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#gradesCollapse" aria-expanded="true" aria-controls="gradesCollapse" style="background-color: #f8f9fa; color: #800000;">
                                <i class="fas fa-table me-2"></i> Grades
                            </button>
                        </h2>
                        <div id="gradesCollapse" class="accordion-collapse collapse show" aria-labelledby="gradesHeading" data-bs-parent="#gradesTranscriptsAccordion">
                            <div class="accordion-body p-0 pt-3">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" style="border-color: #b8a373;">
                                        <thead style="background-color: rgb(250, 248, 248); color: black; position: sticky; top: 0; z-index: 1;">
                                            <tr>
                                                <th>Course Unit</th>
                                                @if (in_array('test1', request('assessment_types', [])))
                                                    <th>Test 1</th>
                                                @endif
                                                @if (in_array('test2', request('assessment_types', [])))
                                                    <th>Test 2</th>
                                                @endif
                                                @if (in_array('assignment', request('assessment_types', [])))
                                                    <th>Assignment</th>
                                                @endif
                                                @if (in_array('exam', request('assessment_types', [])))
                                                    <th>Exam</th>
                                                @endif
                                                <th>Final Marks</th>
                                                <th>Grade</th>
                                                <th>Semester</th>
                                                <th>Year</th>
                                                <th>Comments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($assessments as $assessment)
                                                <tr class="grade-row">
                                                    <td>{{ $assessment->courseUnit->name }}</td>
                                                    @if (in_array('test1', request('assessment_types', [])))
                                                        <td>{{ $assessment->marks['test1'] ?? '-' }}</td>
                                                    @endif
                                                    @if (in_array('test2', request('assessment_types', [])))
                                                        <td>{{ $assessment->marks['test2'] ?? '-' }}</td>
                                                    @endif
                                                    @if (in_array('assignment', request('assessment_types', [])))
                                                        <td>{{ $assessment->marks['assignment'] ?? '-' }}</td>
                                                    @endif
                                                    @if (in_array('exam', request('assessment_types', [])))
                                                        <td>{{ $assessment->marks['exam'] ?? '-' }}</td>
                                                    @endif
                                                    <td>{{ $assessment->total_marks }}</td>
                                                    <td><span class="badge" style="background-color: green; color: white;">{{ $assessment->grade }}</span></td>
                                                    <td>{{ $assessment->semester->name }}</td>
                                                    <td>{{ $assessment->year->name }}</td>
                                                    <td>{{ $assessment->lecturer_comments ?? '-' }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="{{ 5 + count(request('assessment_types', [])) }}" class="text-center text-muted">No grades available.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                {{ $assessments->links() }}
                            </div>
                        </div>
                    </div>

                    <!-- Transcript Summary -->
                    <div class="accordion-item" style="border: none;">
                        <h2 class="accordion-header" id="transcriptHeading">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#transcriptCollapse" aria-expanded="false" aria-controls="transcriptCollapse" style="background-color: #f8f9fa; color: #800000;">
                                <i class="fas fa-file-alt me-2"></i> Statement Of Results
                            </button>
                        </h2>
                        <div id="transcriptCollapse" class="accordion-collapse collapse" aria-labelledby="transcriptHeading" data-bs-parent="#gradesTranscriptsAccordion">
                            <div class="accordion-body">
                                <h5 style="color: #800000;">Overall CGPA: <span class="badge" style="background-color: green; color: white;">{{ $cgpaData['overall'] }}</span></h5>
                                <h6 class="mt-3" style="color: #800000;">CGPA by Year and Semester</h6>
                                <ul class="list-group">
                                    @forelse ($cgpaData['by_year_semester'] as $key => $cgpa)
                                        <li class="list-group-item d-flex justify-content-between align-items-center" style="border-color: #b8a373;">
                                            {{ $key }}
                                            <span class="badge" style="background-color:green; color: white;">{{ $cgpa }}</span>
                                        </li>
                                    @empty
                                        <li class="list-group-item text-muted">No CGPA data available.</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Styling for Grades -->
<style>
    .table-responsive {
        max-height: 400px;
        overflow-y: auto;
    }
    .table th, .table td {
        vertical-align: middle;
        border-color: #b8a373;
    }
    .accordion-button {
        font-weight: 500;
        transition: background-color 0.2s;
    }
    .accordion-button:hover {
        background-color: #e9ecef;
    }
    .badge {
        font-size: 0.9em;
        transition: transform 0.2s;
    }
    .badge:hover {
        transform: scale(1.1);
    }
    .grade-row:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s;
    }
    .table thead th {
        background-color: rgb(250, 248, 248) !important;
        color: black !important;
    }
</style>
@endsection