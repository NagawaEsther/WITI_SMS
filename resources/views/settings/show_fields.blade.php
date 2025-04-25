<!-- Institution Name Field -->
<div class="form-group">
    {!! Form::label('institution_name', __('models/settings.fields.institution_name').':') !!}
    <p>{{ $setting->institution_name }}</p>
</div>

<!-- Copyright Field -->
<div class="form-group">
    {!! Form::label('copyright', __('models/settings.fields.copyright').':') !!}
    <p>{{ $setting->copyright }}</p>
</div>

<!-- System Logo Field -->
<div class="form-group">
    {!! Form::label('system_logo', __('models/settings.fields.system_logo').':') !!}
    <p>{{ $setting->system_logo }}</p>
</div>

<!-- Motto Field -->
<div class="form-group">
    {!! Form::label('motto', __('models/settings.fields.motto').':') !!}
    <p>{{ $setting->motto }}</p>
</div>

<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('models/settings.fields.address').':') !!}
    <p>{{ $setting->address }}</p>
</div>

<!-- Contact One Field -->
<div class="form-group">
    {!! Form::label('contact_one', __('models/settings.fields.contact_one').':') !!}
    <p>{{ $setting->contact_one }}</p>
</div>

<!-- Contact Two Field -->
<div class="form-group">
    {!! Form::label('contact_two', __('models/settings.fields.contact_two').':') !!}
    <p>{{ $setting->contact_two }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/settings.fields.created_at').':') !!}
    <p>{{ $setting->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/settings.fields.updated_at').':') !!}
    <p>{{ $setting->updated_at }}</p>
</div>

