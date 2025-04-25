{{--
<!-- Course Name Field -->
<div class="form-group">
    {!! Form::label('course_name', __('models/courses.fields.course_name').':') !!}
    <p>{{ $course->course_name }}</p>
</div>

<!-- Programme Type Field -->
<div class="form-group">
    {!! Form::label('programme_type', __('models/courses.fields.programme_type').':') !!}
    <p>{{ $course->programme_type }}</p>
</div>

<!-- Duration Field -->
<div class="form-group">
    {!! Form::label('duration', __('models/courses.fields.duration').':') !!}
    <p>{{ $course->duration }}</p>
</div>

<!-- Core Courses Field -->
<div class="form-group">
    {!! Form::label('core_courses', __('models/courses.fields.core_courses').':') !!}
    <p>{{ $course->core_courses }}</p>
</div>

<!-- Course Units Field -->
<div class="form-group">
    {!! Form::label('course_units', __('models/courses.fields.course_units').':') !!}
    <p>{{ $course->course_units }}</p>
</div>

<!-- Admission Requirements Field -->
<div class="form-group">
    {!! Form::label('admission_requirements', __('models/courses.fields.admission_requirements').':') !!}
    <p>{{ $course->admission_requirements }}</p>
</div>

<!-- Fees Field -->
<div class="form-group">
    {!! Form::label('fees', __('models/courses.fields.fees').':') !!}
    <p>{{ $course->fees }}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', __('models/courses.fields.category').':') !!}
    <p>{{ $course->category }}</p>
</div>

<!-- Credit Units Field -->
<div class="form-group">
    {!! Form::label('credit_units', __('models/courses.fields.credit_units').':') !!}
    <p>{{ $course->credit_units }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/courses.fields.created_at').':') !!}
    <p>{{ $course->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/courses.fields.updated_at').':') !!}
    <p>{{ $course->updated_at }}</p>
</div>
--}}

<div class="form-group">
    <label for="name">Name:</label>
    <p>{{ $courseUnit->name }}</p>
</div>

<div class="form-group">
    <label for="description">Description:</label>
    <p>{{ $courseUnit->description }}</p>
</div>

<div class="form-group">
    <label for="semester">Semester:</label>
    <p>{{ $courseUnit->semester }}</p>
</div>

<div class="form-group">
    <label for="course_unit_code">Course Unit Code:</label>
    <p>{{ $courseUnit->course_unit_code }}</p>
</div>

<div class="form-group">
    <label for="status">Status:</label>
    <p>{{ $courseUnit->status }}</p>
</div>

<div class="form-group">
    <label for="semester_id">Semester ID:</label>
    <p>{{ $courseUnit->semester_id }}</p>
</div>

<div class="form-group">
    <label for="credit_unit">Credit Unit:</label>
    <p>{{ $courseUnit->credit_unit }}</p>
</div>

<div class="form-group">
    <label for="created_by">Created By:</label>
    <p>{{ $courseUnit->created_by }}</p>
</div>

<div class="form-group">
    <a href="{{ route('course-units.index') }}" class="btn btn-secondary">Back to Course Units</a>
</div>