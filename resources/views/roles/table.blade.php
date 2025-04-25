@extends('layouts.app')

@section('title')
@lang('models/settings.plural')
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Roles List</h3>
    <a href="{{ route('roles.create') }}" class="btn btn-primary">Add New Role</a>
</div>

<div class="container">
    <form action="{{ route('roles.bulk-delete') }}" method="POST" id="bulkDeleteForm">
        @csrf
        <button type="submit" class="btn btn-danger mb-3" id="bulkDeleteBtn" disabled>
            <i class="fas fa-trash-alt"></i> Bulk Delete
        </button>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="roles-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td><input type="checkbox" name="ids[]" value="{{ $role->id }}" class="roleCheckbox"></td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td>
                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info btn-sm"
                                data-toggle="tooltip" data-placement="top" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm"
                                data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')" data-toggle="tooltip" data-placement="top"
                                    title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
            if (!$.fn.dataTable.isDataTable('#roles-table')) {
                $('#roles-table').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "pageLength": 5,
                    "lengthMenu": [5, 10, 25, 50],
                    "responsive": true
                });
            }

            // Enable or disable the Bulk Delete button based on selection
            $('#roles-table').on('change', '.roleCheckbox', function() {
                var selectedCount = $('input.roleCheckbox:checked').length;
                $('#bulkDeleteBtn').prop('disabled', selectedCount === 0);
            });

            // Handle "Select All" checkbox
            $('#selectAll').on('change', function() {
                var isChecked = $(this).prop('checked');
                $('input.roleCheckbox').prop('checked', isChecked).trigger('change');
            });

            // Initialize tooltips
            $('[data-toggle="tooltip"]').tooltip();
        });
</script>
@endsection