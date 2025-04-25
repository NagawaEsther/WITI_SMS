{{-- Puts the dropdowns and fetches the programs --}}
<?php
use App\Models\Program;
$programs =  Program::pluck('name', 'id') ;
?>


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','minlength' => 3,'maxlength' => 100]) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date', 'placeholder'=>'DD/MM/YY']) !!}
</div>

@push('scripts')
<script type="text/javascript">
    $('#start_date').datetimepicker({
            format: 'DD/MM/YY',  // Changed to show month, day, and year only
            useCurrent: false,
            sideBySide: true
        });
</script>
@endpush


<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date', 'placeholder'=>'DD/MM/YY']) !!}
</div>

@push('scripts')
<script type="text/javascript">
    $('#end_date').datetimepicker({
            format: 'DD/MM/YY',  // Changed to show month, day, and year only
            useCurrent: false,
            sideBySide: true
        });
</script>
@endpush

<!-- Program Id Field -->

{{-- <div class="form-group col-sm-6">
    {!! Form::label('program', 'Program:') !!}
    {!! Form::select('program', $programs, null, ['class' => 'form-control']) !!}

</div> --}}

<div class="form-group col-sm-6">
    {!! Form::label('Program') !!}
    {!! Form::select('program', $programs, null, ['class' => 'form-control', 'placeholder' => 'Select program']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('semesters.index') }}" class="btn btn-light">Cancel</a>
</div>