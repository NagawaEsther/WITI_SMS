{{-- <div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th>Gender</th>
                <th>Role</th>
                <th>Action</th> <!-- Action as a single column now -->
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('assets/images/user.jpg') }}"
                        alt="User Image" width="60" height="60">
                </td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>
                    @if ($user->status == 'active')
                    <span class="badge badge-success">{{ $user->status }}</span>
                    @elseif ($user->status == 'inactive')
                    <span class="badge badge-danger">{{ $user->status }}</span>
                    @elseif ($user->status == 'pending')
                    <span class="badge badge-warning">{{ $user->status }}</span>
                    @else
                    <span class="badge badge-secondary">{{ $user->status }}</span>
                    @endif
                </td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->role->name }}</td>
                <!-- Now the Action column is a single column -->
                <td class="text-center">
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-light action-btn'><i
                                class="fa fa-eye"></i></a>
                        <a href="{!! route('users.edit', [$user->id]) !!}"
                            class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger
                        action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this
                        record?")']) !!}
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
        $('#users-table').DataTable({
            "paging": true,          // Enable paging
            "searching": true,       // Enable search
            "ordering": true,        // Enable sorting
            "pageLength": 5,         // Number of rows per page
            "lengthMenu": [5, 10, 25, 50] // Options for page length
        });
    });
</script> --}}



<div class="table-responsive">
    <form id="bulk-delete-form" action="{{ route('users.bulkDestroy') }}" method="POST">
        @csrf
        @method('DELETE')
        <table class="table" id="users-table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all" /></th> <!-- Checkbox to select all -->
                    <th>Image</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Action</th> <!-- Action as a single column now -->
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td><input type="checkbox" class="user-checkbox" name="user_ids[]" value="{{ $user->id }}" /></td>
                    <!-- Checkbox for each user -->
                    <td>
                        <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('assets/images/user.jpg') }}"
                            alt="User Image" width="60" height="60">
                    </td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>
                        @if ($user->status == 'active')
                        <span class="badge badge-success">{{ $user->status }}</span>
                        @elseif ($user->status == 'inactive')
                        <span class="badge badge-danger">{{ $user->status }}</span>
                        @elseif ($user->status == 'pending')
                        <span class="badge badge-warning">{{ $user->status }}</span>
                        @else
                        <span class="badge badge-secondary">{{ $user->status }}</span>
                        @endif
                    </td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td class="text-center">
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-light action-btn'><i
                                    class="fa fa-eye"></i></a>
                            <a href="{!! route('users.edit', [$user->id]) !!}"
                                class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn
                            btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete
                            this record?")']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Bulk Delete Button -->
        <button type="submit" class="btn btn-danger" id="bulk-delete-btn" disabled>Delete Selected</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#users-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });

        // Select/Deselect All
        $('#select-all').on('click', function() {
            $('.user-checkbox').prop('checked', this.checked);
            toggleBulkDeleteButton();
        });

        // Toggle Bulk Delete Button
        $('.user-checkbox').on('change', function() {
            toggleBulkDeleteButton();
        });

        // Enable or Disable Bulk Delete Button based on selection
        function toggleBulkDeleteButton() {
            if ($('.user-checkbox:checked').length > 0) {
                $('#bulk-delete-btn').prop('disabled', false);
            } else {
                $('#bulk-delete-btn').prop('disabled', true);
            }
        }
    });
</script>