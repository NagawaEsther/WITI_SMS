{{--
<?php
use App\Models\Student;
use App\Models\Program;
$students = Student::pluck('user_id', 'id');
$programs=Program::pluck('name','id');
?>


<!-- Student Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', 'Student Name:') !!}
    {!! Form::number('student_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Program Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('program_id', 'Program Name:') !!}
    {!! Form::number('program_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('enrollments.index') }}" class="btn btn-light">Cancel</a>
</div> --}}

<?php
use App\Models\User;
use App\Models\Program;

$students = User::pluck('first_name', 'id' ); // Fetch student names
$programs = Program::pluck('name', 'id'); // Fetch program names
?>

<!-- Student Dropdown -->
<div class="form-group col-sm-6">
    {!! Form::label('student_id', 'Student Name:') !!}
    {!! Form::select('student_id', $students, null, ['class' => 'form-control', 'placeholder' => 'Select a Student'])
    !!}
</div>

<!-- Program Dropdown -->
<div class="form-group col-sm-6">
    {!! Form::label('program_id', 'Program Name:') !!}
    {!! Form::select('program_id', $programs, null, ['class' => 'form-control', 'placeholder' => 'Select a Program'])
    !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['active' => 'active', 'inactive' => 'inactive'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('enrollments.index') }}" class="btn btn-light">Cancel</a>
</div>