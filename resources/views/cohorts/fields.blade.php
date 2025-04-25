{{--
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','minlength' => 5,'maxlength' => 150]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Students Field -->
<div class="form-group col-sm-6">
    {!! Form::label('students', 'Students:') !!}
    {!! Form::text('students', null, ['class' => 'form-control','minlength' => 5,'maxlength' => 150]) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('scripts')
<script type="text/javascript">
    $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endpush

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
</div>

@push('scripts')
<script type="text/javascript">
    $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cohorts.index') }}" class="btn btn-light">Cancel</a>
</div> --}}

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','minlength' => 5,'maxlength' => 150]) !!}
</div>

{{--
<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
</div>

<!-- Students Field -->
<div class="form-group col-sm-6">
    {!! Form::label('students', 'Students:') !!}
    {!! Form::text('students', null, ['class' => 'form-control','minlength' => 5,'maxlength' => 150]) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('scripts')
<script type="text/javascript">
    $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endpush

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
</div>

@push('scripts')
<script type="text/javascript">
    $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endpush

<!-- Expected Graduation Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expected_graduation_date', 'Expected Graduation Date:') !!}
    {!! Form::text('expected_graduation_date', null, ['class' => 'form-control', 'id' => 'expected_graduation_date'])
    !!}
</div>

@push('scripts')
<script type="text/javascript">
    $('#expected_graduation_date').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false,
        sideBySide: true
    });
</script>
@endpush

<!-- Curriculum Field -->
<div class="form-group col-sm-6">
    {!! Form::label('curriculum', 'Curriculum:') !!}
    {!! Form::select('curriculum', ['old' => 'Old', 'new' => 'New'], null, ['class' => 'form-control']) !!}
</div>

<!-- Number of Students Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number_of_students', 'Number of Students:') !!}
    {!! Form::number('number_of_students', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cohorts.index') }}" class="btn btn-light">Cancel</a>
</div> --}}

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
</div>

<!-- Expected Graduation Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expected_graduation_date', 'Expected Graduation Date:') !!}
    {!! Form::text('expected_graduation_date', null, ['class' => 'form-control', 'id' => 'expected_graduation_date'])
    !!}
</div>

<!-- Curriculum Field -->
<div class="form-group col-sm-6">
    {!! Form::label('curriculum', 'Curriculum:') !!}
    {!! Form::select('curriculum', ['old' => 'Old', 'new' => 'New'], null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control', 'id' => 'start_date']) !!}
</div>

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::text('end_date', null, ['class' => 'form-control', 'id' => 'end_date']) !!}
</div>

<!-- Number of Students Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number_of_students', 'Number of Students:') !!}
    {!! Form::number('number_of_students', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cohorts.index') }}" class="btn btn-light">Cancel</a>
</div>