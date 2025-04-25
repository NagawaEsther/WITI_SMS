<!-- Institution Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('institution_name', __('models/settings.fields.institution_name').':') !!}
    {!! Form::text('institution_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Copyright Field -->
<div class="form-group col-sm-6">
    {!! Form::label('copyright', __('models/settings.fields.copyright').':') !!}
    {!! Form::text('copyright', null, ['class' => 'form-control']) !!}
</div>

<!-- System Logo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('system_logo', __('models/settings.fields.system_logo').':') !!}
    {!! Form::file('system_logo') !!}
</div>
<div class="clearfix"></div>

<!-- Motto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('motto', __('models/settings.fields.motto').':') !!}
    {!! Form::text('motto', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('models/settings.fields.address').':') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact One Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_one', __('models/settings.fields.contact_one').':') !!}
    {!! Form::text('contact_one', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Two Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact_two', __('models/settings.fields.contact_two').':') !!}
    {!! Form::text('contact_two', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('settings.index') }}" class="btn btn-light">@lang('Cancel')</a>
</div>
