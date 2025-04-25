<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $program->name }}</p>
</div>

<!-- Duration Field -->
<div class="form-group">
    {!! Form::label('duration', 'Duration:') !!}
    <p>{{ $program->duration }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $program->status }}</p>
</div>

<!-- Program Code Field -->
<div class="form-group">
    {!! Form::label('program_code', 'Program Code:') !!}
    <p>{{ $program->program_code }}</p>
</div>

<!-- Credit Required Field -->
<div class="form-group">
    {!! Form::label('credit_required', 'Credit Required:') !!}
    <p>{{ $program->credit_required }}</p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $program->created_by }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $program->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $program->updated_at }}</p>
</div>

