<?php
use App\Models\;
$users = User::pluck('first_name', 'last_name','id');
$cohorts=Cohorts::pluck('name','id');
?>


<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 100]) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 200]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>





<!-- Phone Number Two Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number_two', 'Phone Number Two:') !!}
    {!! Form::text('phone_number_two', null, ['class' => 'form-control','min' => 10,'max' => 10]) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::select('gender', ['female' => 'Female', 'male' => 'Male'], null, ['class' => 'form-control', 'placeholder'
    => 'Select Gender']) !!}
</div>

<div class="form-group">
    <label for="date_of_birth">Date of Birth:</label>
    <p>{{ $studentApplication->date_of_birth }}</p>
</div>

<div class="form-group">
    <label for="address">Address:</label>
    <p>{{ $studentApplication->address }}</p>
</div>

{{-- <div class="form-group">
    <label for="status">Nationality</label>
    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
        <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>Inactive</option>
        <option value="completed" {{ old('status')=='completed' ? 'selected' : '' }}>Completed</option>
    </select>
    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div> --}}

<div class="form-group">
    <label for="status">Status:</label>
    <p>{{ ucfirst($studentApplication->status) }}</p>
</div>

<div class="form-group">
    <label for="program_id">Program:</label>
    <p>{{ $studentApplication->program->name }}</p>
</div>

<div class="form-group">
    <label for="cohort_id">Cohort:</label>
    <p>{{ $studentApplication->cohort->name }}</p>
</div>

<div class="form-group">
    <label for="nationality">Nationality:</label>
    <p>{{ $studentApplication->nationality }}</p>
</div>

<div class="form-group">
    <label for="guardian_name">Guardian Name:</label>
    <p>{{ $studentApplication->guardian_name }}</p>
</div>

<div class="form-group">
    <label for="guardian_contact">Guardian Contact:</label>
    <p>{{ $studentApplication->guardian_contact }}</p>
</div>

<div class="form-group">
    <label for="interview_date">Interview Date:</label>
    <p>{{ $studentApplication->interview_date }}</p>
</div>

<div class="form-group">
    <label for="interview_result">Interview Result:</label>
    <p>{{ ucfirst($studentApplication->interview_result) }}</p>
</div>

<div class="form-group">
    <label for="submitted_documents">Submitted Documents:</label>
    <p>{{ $studentApplication->submitted_documents }}</p>

</div>

<div class="form-group">
    <label for="secondary_school">Secondary School:</label>
    <p>{{ $studentApplication->secondary_school }}</p>
</div>

<div class="form-group">
    <label for="combination">Combination:</label>
    <p>{{ $studentApplication->combination }}</p>
</div>

<div class="form-group">
    <label for="points_scored">Points Scored:</label>
    <p>{{ $studentApplication->points_scored }}</p>
</div>

<div class="form-group">
    <label for="uace_year_of_completion">UACE Year of Completion:</label>
    <p>{{ $studentApplication->uace_year_of_completion ?? 'N/A' }}</p>
</div>

<div class="form-group">
    <label for="created_at">Created At:</label>
    <p>{{ $studentApplication->created_at->toFormattedDateString() }}</p>
</div>

<div class="form-group">
    <label for="updated_at">Updated At:</label>
    <p>{{ $studentApplication->updated_at->toFormattedDateString() }}</p>
</div>