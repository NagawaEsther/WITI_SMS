<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','minlength' => 5]) !!}
</div>

<!-- Duration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duration', 'Duration:') !!}
    {!! Form::text('duration', null, ['class' => 'form-control','maxlength' => 20]) !!}
</div>

<!-- Program Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('program_code', 'Program Code:') !!}
    {!! Form::text('program_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Credit Required Field -->
<div class="form-group col-sm-6">
    {!! Form::label('credit_required', 'Credit Required:') !!}
    {!! Form::number('credit_required', null, ['class' => 'form-control','min' => 3,'max' => 10]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], 'active', ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('programs.index') }}" class="btn btn-light">Cancel</a>
</div>
