<!-- resources/views/students/show_fields.blade.php -->
<div class="form-group">
    <strong>Reg Number:</strong> {{ $student->reg_number }}
</div>

<div class="form-group">
    <strong>User:</strong> {{ $student->user->name }}
</div>

<div class="form-group">
    <strong>Admission Date:</strong> {{ $student->admission_date->toFormattedDateString() }}
</div>

<div class="form-group">
    <strong>Status:</strong> {{ ucfirst($student->status) }}
</div>

<div class="form-group">
    <strong>Cohort:</strong> {{ $student->cohort->name }}
</div>

<div class="form-group">
    <strong>Created By:</strong> {{ $student->creator->name }}
</div>

<div class="form-group">
    <strong>Student Application ID:</strong> {{ $student->student_application_id }}
</div>