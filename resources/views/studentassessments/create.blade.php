@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Create Student Assessment</h2>

    <div class="card">
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createAssessmentModal">
                Add New Assessment
            </button>

            <div class="modal fade" id="createAssessmentModal" tabindex="-1" aria-labelledby="createAssessmentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createAssessmentModalLabel">Add Student Assessment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('studentassessments.store') }}" method="POST">
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
    </div>

    <div class="mt-3">
        <a href="{{ route('studentassessments.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#createAssessmentModal').on('shown.bs.modal', function () {
            $('#student_id, #program_id, #course_unit_id, #semester_id, #year_id, #assessment_type').select2({
                dropdownParent: $('#createAssessmentModal'),
                width: '100%'
            });
        });

        $('#createAssessmentModal').on('hidden.bs.modal', function () {
            $('#student_id, #program_id, #course_unit_id, #semester_id, #year_id, #assessment_type').select2('destroy');
        });

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

        $('#test1, #test2, #assignment, #exam').on('input', calculateGrade);
    });
</script>
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection