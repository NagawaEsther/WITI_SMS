{{-- <div class="table-responsive">
    <table class="table" id="settings-table">
        <thead>
            <tr>
                <th>@lang('models/settings.fields.institution_name')</th>
                <th>@lang('models/settings.fields.copyright')</th>
                <th>@lang('models/settings.fields.system_logo')</th>
                <th>@lang('models/settings.fields.motto')</th>
                <th>@lang('models/settings.fields.address')</th>
                <th>@lang('models/settings.fields.contact_one')</th>
                <th>@lang('models/settings.fields.contact_two')</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($settings as $setting)
            <tr>
                <td>{{ $setting->institution_name }}</td>
                <td>{{ $setting->copyright }}</td>
                <td>{{ $setting->system_logo }}</td>
                <td>{{ $setting->motto }}</td>
                <td>{{ $setting->address }}</td>
                <td>{{ $setting->contact_one }}</td>
                <td>{{ $setting->contact_two }}</td>
                <td class=" text-center">
                    {!! Form::open(['route' => ['settings.destroy', $setting->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('settings.show', [$setting->id]) !!}" class='btn btn-light action-btn '><i
                                class="fa fa-eye"></i></a>
                        <a href="{!! route('settings.edit', [$setting->id]) !!}"
                            class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger
                        action-btn delete-btn', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#settings-table').DataTable({
            "paging": true,          
            "searching": true,       
            "ordering": true,        
            "pageLength": 5,         
            "lengthMenu": [5, 10, 25, 50] 
        });
    });
</script> --}}

<div class="table-responsive">
    <table class="table" id="settings-table">
        <thead>
            <tr>
                <th>@lang('models/settings.fields.institution_name')</th>
                <th>@lang('models/settings.fields.copyright')</th>
                <th>@lang('models/settings.fields.system_logo')</th>
                <th>@lang('models/settings.fields.motto')</th>
                <th>@lang('models/settings.fields.address')</th>
                <th>@lang('models/settings.fields.contact_one')</th>
                <th>@lang('models/settings.fields.contact_two')</th>
                <th>Action</th> <!-- Fixed colspan issue -->
            </tr>
        </thead>
        <tbody>
            @foreach($settings as $setting)
            <tr>
                <td>{{ $setting->institution_name }}</td>
                <td>{{ $setting->copyright }}</td>
                <td>{{ $setting->system_logo }}</td>
                <td>{{ $setting->motto }}</td>
                <td>{{ $setting->address }}</td>
                <td>{{ $setting->contact_one }}</td>
                <td>{{ $setting->contact_two }}</td>
                <td class="text-center">
                    {!! Form::open(['route' => ['settings.destroy', $setting->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('settings.show', [$setting->id]) !!}" class='btn btn-light action-btn'>
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{!! route('settings.edit', [$setting->id]) !!}"
                            class='btn btn-warning action-btn edit-btn'>
                            <i class="fa fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger
                        action-btn delete-btn', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#settings-table').DataTable({
            "paging": true,          
            "searching": true,       
            "ordering": true,        
            "pageLength": 5,         
            "lengthMenu": [5, 10, 25, 50] 
        });
    });
</script>