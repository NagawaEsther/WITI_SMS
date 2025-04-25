```blade
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Student Assessments</h2>

    <!-- Filter Form -->
    <form action="{{ route('studentassessments.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="filter_student_id" class="form-label">Student</label>
                <select name="student_id" id="filter_student_id" class="form-control select2">
                    <option value="">All Students</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ request('student_id') == $student->id ? 'selected' : '' }}>
                            {{ $student->user->first_name }} {{ $student->user->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="filter_year_id" class="form-label">Year</label>
                <select name="year_id" id="filter_year_id" class="form-control select2">
                    <option value="">All Years</option>
                    @foreach($years as $year)
                        <option value="{{ $year->id }}" {{ request('year_id') == $year->id ? 'selected' : '' }}>
                            {{ $year->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="filter_semester_id" class="form-label">Semester</label>
                <select name="semester_id" id="filter_semester_id" class="form-control select2">
                    <option value="">All Semesters</option>
                    @foreach($semesters as $semester)
                        <option value="{{ $semester->id }}" {{ request('semester_id') == $semester->id ? 'selected' : '' }}>
                            {{ $semester->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2">Filter</button>
                <a href="{{ route('studentassessments.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </div>
    </form>

    <!-- Create Assessment Button and Search Controls -->
    <div class="mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center">
                <form id="perPageForm" action="{{ route('studentassessments.index') }}" method="GET" class="d-flex align-items-center">
                    @foreach(request()->query() as $key => $value)
                        @if($key !== 'page')
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <span class="me-2">Show</span>
                    <select name="perPage" id="perPage" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                        <option value="10" {{ request('perPage', 10) == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                        <option value="30" {{ request('perPage') == 30 ? 'selected' : '' }}>30</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="ms-2">entries</span>
                </form>
            </div>
            <div class="d-flex align-items-center">
                <form action="{{ route('studentassessments.index') }}" method="GET" class="d-flex align-items-center me-2">
                    @foreach(request()->query() as $key => $value)
                        @if($key !== 'search' && $key !== 'page')
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <input type="text" name="search" id="search" class="form-control me-2" value="{{ request('search') }}" placeholder="Search assessments..." style="width: 200px;">
                    <button type="submit" class="btn btn-maroon">Search</button>
                </form>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAssessmentModal">
                    Create New Assessment
                </button>
            </div>
        </div>
    </div>

    <!-- Assessment Table -->
    <div class="mb-4">
        @if($assessments->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Semester</th>
                        <th>Year</th>
                        <th>Course Unit</th>
                        <th>Total Marks</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assessments as $assessment)
                        <tr>
                            <td>{{ $assessment->student->user->first_name }} {{ $assessment->student->user->last_name }}</td>
                            <td>{{ $assessment->semester->name }}</td>
                            <td>{{ $assessment->year->name }}</td>
                            <td>{{ $assessment->courseUnit->name }}</td>
                            <td>{{ $assessment->total_marks }}</td>
                            <td>{{ $assessment->grade }}</td>
                            <td class="text-center">
                                <a href="{{ route('studentassessments.show', $assessment->id) }}" class="btn btn-light btn-sm" title="View Assessment">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('studentassessments.edit', $assessment->id) }}" class="btn btn-warning btn-sm" title="Edit Assessment">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('studentassessments.destroy', $assessment->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this assessment?')" title="Delete Assessment">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">No assessment records found.</div>
        @endif

        <div class="d-flex justify-content-center mt-4">
            {{ $assessments->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- CGPA Overview -->
    <div class="mb-4">
        <h3>CGPA Overview</h3>
        @if($students->isEmpty())
            <div class="alert alert-info">No students found.</div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Overall CGPA</th>
                        <th>Year-Semester CGPA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        @if(!isset($cgpaData[$student->id]))
                            <tr>
                                <td>{{ $student->user->first_name }} {{ $student->user->last_name }}</td>
                                <td colspan="2">No assessments available</td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $student->user->first_name }} {{ $student->user->last_name }}</td>
                                <td>{{ $cgpaData[$student->id]['overall'] }}</td>
                                <td>
                                    @if(empty($cgpaData[$student->id]['by_year_semester']))
                                        No semester data available
                                    @else
                                        @foreach($cgpaData[$student->id]['by_year_semester'] as $yearSemester => $cgpa)
                                            <div>{{ $yearSemester }}: {{ $cgpa }}</div>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Modal for Creating Assessment -->
    <div class="modal fade" id="createAssessmentModal" tabindex="-1" aria-labelledby="createAssessmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAssessmentModalLabel">Add Student Assessment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('studentassessments.store') }}" method="POST" id="createAssessmentForm">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="student_id" class="form-label">Student</label>
                                <select name="student_id" id="student_id" class="form-control select2 @error('student_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Select a student</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->user->first_name }} {{ $student->user->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="program_id" class="form-label">Program</label>
                                <select name="program_id" id="program_id" class="form-control select2 @error('program_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Select a program</option>
                                    @foreach($programs as $program)
                                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                                    @endforeach
                                </select>
                                @error('program_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="course_unit_id" class="form-label">Course Unit</label>
                                <select name="course_unit_id" id="course_unit_id" class="form-control select2 @error('course_unit_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Select a course unit</option>
                                    @foreach($courseUnits as $courseUnit)
                                        <option value="{{ $courseUnit->id }}" {{ old('course_unit_id') == $courseUnit->id ? 'selected' : '' }}>
                                            {{ $courseUnit->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_unit_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="semester_id" class="form-label">Semester</label>
                                <select name="semester_id" id="semester_id" class="form-control select2 @error('semester_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Select a semester</option>
                                    @foreach($semesters as $semester)
                                        <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                    @endforeach
                                </select>
                                @error('semester_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="year_id" class="form-label">Year</label>
                                <select name="year_id" id="year_id" class="form-control select2 @error('year_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Select a year</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                                    @endforeach
                                </select>
                                @error('year_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="grade" class="form-label">Grade</label>
                                <input type="text" id="grade" class="form-control" readonly placeholder="Enter marks to see grade">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="assessment_type" class="form-label">Assessment Type</label>
                            <select name="assessment_type" id="assessment_type" class="form-control @error('assessment_type') is-invalid @enderror" required>
                                <option value="" disabled selected>Select an assessment type</option>
                                <option value="Continuous Assessment">Continuous Assessment</option>
                                <option value="Final Grade Calculation">Final Grade Calculation</option>
                            </select>
                            @error('assessment_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Marks</label>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Test 1 (out of 40)</th>
                                        <th>Test 2 (out of 40)</th>
                                        <th>Assignment (out of 40)</th>
                                        <th>Exam (out of 60)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="number" name="test1" id="test1" class="form-control @error('test1') is-invalid @enderror" min="0" max="40" placeholder="0-40">
                                            @error('test1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" name="test2" id="test2" class="form-control @error('test2') is-invalid @enderror" min="0" max="40" placeholder="0-40">
                                            @error('test2')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" name="assignment" id="assignment" class="form-control @error('assignment') is-invalid @enderror" min="0" max="40" placeholder="0-40">
                                            @error('assignment')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" name="exam" id="exam" class="form-control @error('exam') is-invalid @enderror" min="0" max="60" placeholder="0-60">
                                            @error('exam')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <small class="text-muted">Enter marks: Tests & Assignment (out of 40 each, scaled from 120 to 40), Exam (out of 60). Total Marks (out of 100) and Grade calculated automatically.</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="lecturer_comments" class="form-label">Lecturer Comments</label>
                            <textarea name="lecturer_comments" id="lecturer_comments" class="form-control @error('lecturer_comments') is-invalid @enderror"></textarea>
                            @error('lecturer_comments')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save Assessment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

<style>
    /* Highlighted option (active/selected state) */
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #800000 !important; /* Maroon color */
        color: white !important; /* White text for contrast */
    }

    /* Hover state for options */
    .select2-container--default .select2-results__option:hover {
        background-color: #800000 !important; /* Maroon color on hover */
        color: white !important; /* White text for contrast */
    }

    /* Ensure focus border is maroon */
    .select2-container--default .select2-selection--single:focus,
    .select2-container--default .select2-selection--multiple:focus {
        border-color: #800000 !important; /* Maroon border on focus */
        outline: none; /* Remove default outline if needed */
    }

    /* Selected choices in multiple select */
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #800000 !important; /* Maroon for selected choices */
        color: white !important; /* White text for contrast */
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize Select2 for filter dropdowns
        $('#filter_student_id, #filter_semester_id, #filter_year_id').select2({
            width: '100%'
        });

        // Force maroon highlight via JS
        $('.select2').on('select2:open', function () {
            setTimeout(() => {
                $('.select2-results__option--highlighted').css({
                    'background-color': '#800000',
                    'color': 'white'
                });
            }, 0);
        });

        // Initialize Select2 for modal dropdowns when modal is shown
        $('#createAssessmentModal').on('shown.bs.modal', function () {
            $('#student_id, #program_id, #course_unit_id, #semester_id, #year_id, #assessment_type').select2({
                dropdownParent: $('#createAssessmentModal'),
                width: '100%'
            });
        });

        // Destroy Select2 when modal is hidden to prevent conflicts
        $('#createAssessmentModal').on('hidden.bs.modal', function () {
            $('#student_id, #program_id, #course_unit_id, #semester_id, #year_id, #assessment_type').select2('destroy');
        });

        // Calculate grade dynamically
        function calculateGrade() {
            let test1 = parseFloat($('#test1').val()) || 0;
            let test2 = parseFloat($('#test2').val()) || 0;
            let assignment = parseFloat($('#assignment').val()) || 0;
            let exam = parseFloat($('#exam').val()) || 0;

            let total_score = test1 + test2 + assignment; // Max 120
            let final_coursework_score = (total_score / 120) * 40; // Scale to 40
            let total = final_coursework_score + exam; // Max 100

            let grade = '';
            if (total >= 80) grade = 'A';
            else if (total >= 75) grade = 'B+';
            else if (total >= 70) grade = 'B';
            else if (total >= 65) grade = 'C+';
            else if (total >= 60) grade = 'C';
            else if (total >= 55) grade = 'C-';
            else if (total >= 50) grade = 'D+';
            else if (total >= 45) grade = 'D';
            else if (total >= 40) grade = 'D-';
            else grade = 'F';

            $('#grade').val(grade);
        }

        // Trigger grade calculation on input change
        $('#test1, #test2, #assignment, #exam').on('input', calculateGrade);
    });
</script>
@endsection
