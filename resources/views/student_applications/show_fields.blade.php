{{-- <div>
    <strong>{{ $label }}:</strong>
    <span>{{ $value }}</span>
</div> --}}

<!-- resources/views/student_applications/show_fields.blade.php -->

<div class="form-group">
    <strong>Student:</strong>
    {{ $studentApplication->user->name }}
</div>

<div class="form-group">
    <strong>Date of Birth:</strong>
    {{ $studentApplication->date_of_birth }}
</div>

<div class="form-group">
    <strong>Address:</strong>
    {{ $studentApplication->address }}
</div>

<div class="form-group">
    <strong>Status:</strong>
    {{ ucfirst($studentApplication->status) }}
</div>

<div class="form-group">
    <strong>Program:</strong>
    {{ $studentApplication->program->name }}
</div>

<div class="form-group">
    <strong>Points Scored:</strong>
    {{ $studentApplication->points_scored }}
</div>

<div class="form-group">
    <strong>Secondary School:</strong>
    {{ $studentApplication->secondary_school }}
</div>

<div class="form-group">
    <strong>Guardian Name:</strong>
    {{ $studentApplication->guardian_name }}
</div>

<div class="form-group">
    <strong>Guardian Contact:</strong>
    {{ $studentApplication->guardian_contact }}
</div>

<div class="form-group">
    <strong>Nationality:</strong>
    {{ $studentApplication->nationality }}
</div>

<div class="form-group">
    <strong>Combination:</strong>
    {{ $studentApplication->combination }}
</div>

{{-- <div class="form-group">
    <strong>Interview Date:</strong>
    {{ $studentApplication->interview_date ?? 'N/A' }}
</div> --}}
<div class="form-group">
    <strong>Interview Date:</strong>
    {{ $studentApplication->interview_date ? \Carbon\Carbon::parse($studentApplication->interview_date)->format('Y-m-d')
    : 'N/A' }}
</div>

<div class="form-group">
    <strong>Interview Result:</strong>
    {{ ucfirst($studentApplication->interview_result) }}
</div>

<div class="form-group">
    <strong>Submitted Documents:</strong>
    {{ json_decode($studentApplication->submitted_documents) }}
</div>

<div class="form-group">
    <strong>UACE Year of Completion:</strong>
    {{ $studentApplication->uace_year_of_completion ?? 'N/A' }}
</div>