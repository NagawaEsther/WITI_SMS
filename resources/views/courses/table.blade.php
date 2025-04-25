<div class="table-responsive">
    <button id="deleteSelected" class="btn btn-danger btn-sm mb-2" disabled>
        <i class="fa fa-trash"></i> Bulk Delete
    </button>
    <table id="courseUnitsTable" class="table table-bordered table-striped bg-white">
        <thead>
            <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th>Name</th>
                <th>Description</th>
                <th>Course Unit Code</th>
                <th>Status</th>
                <th>Thumbnail</th>
                {{-- <th>Semester</th> --}}
                <th>Credit Unit</th>
                {{-- <th>Created By</th> --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courseUnits as $courseUnit)
            <tr>
                <td><input type="checkbox" class="selectItem" value="{{ $courseUnit->id }}"></td>
                <td>{{ $courseUnit->name }}</td>

                <td>{{ $courseUnit->description }}</td>
                <td>{{ $courseUnit->course_unit_code }}</td>

                <td>
                    @if ($courseUnit->status == 'active')
                    <span class="badge bg-success text-white">{{ ucfirst($courseUnit->status) }}</span>
                    @elseif ($courseUnit->status == 'inactive')
                    <span class="badge bg-danger text-white">{{ ucfirst($courseUnit->status) }}</span>
                    @else
                    <span class="badge bg-secondary text-white">{{ ucfirst($courseUnit->status) }}</span>
                    @endif
                </td>
                {{-- <td style=" color: green;">
                    {{ $courseUnit->status }}</td> --}}



                {{-- <td>{{ $courseUnit->status }}</td> --}}
                <td>
                    @if($courseUnit->thumbnailUrl)
                    <img src="{{ $courseUnit->thumbnailUrl }}" alt="Thumbnail" width="50" height="50">
                    @else
                    No Thumbnail
                    @endif
                </td>
                {{-- <td>{{ $courseUnit->semester ? $courseUnit->semester->name : 'No Semester' }}</td> --}}

                <td>{{ $courseUnit->credit_unit }}</td>
                {{-- <td>{{ Auth::user()->first_name }}</td> --}}
                <td class="text-center">
                    <a href="{{ route('course-units.show', $courseUnit->id) }}" class="btn btn-light btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('course-units.edit', $courseUnit->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    {!! Form::open(['route' => ['course-units.destroy', $courseUnit->id], 'method' => 'delete', 'style'
                    => 'display:inline']) !!}
                    {!! Form::button('<i class="fa fa-trash"></i> ', ['type' => 'submit', 'class' => 'btn btn-danger
                    btn-sm', 'onclick' => 'return confirm("Are you sure you want to delete this course unit?")']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#courseUnitsTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });

        // Handle 'Select All' checkbox
        $('#selectAll').on('click', function() {
            $('.selectItem').prop('checked', this.checked);
            toggleDeleteSelectedButton();
        });

        // Handle individual row checkboxes
        $('.selectItem').on('change', function() {
            if ($('.selectItem:checked').length === $('.selectItem').length) {
                $('#selectAll').prop('checked', true);
            } else {
                $('#selectAll').prop('checked', false);
            }
            toggleDeleteSelectedButton();
        });

        // Enable or disable the 'Delete Selected' button
        function toggleDeleteSelectedButton() {
            if ($('.selectItem:checked').length > 0) {
                $('#deleteSelected').prop('disabled', false);
            } else {
                $('#deleteSelected').prop('disabled', true);
            }
        }

        // Handle bulk delete
        $('#deleteSelected').on('click', function() {
            var selectedIds = $('.selectItem:checked').map(function() {
                return $(this).val();
            }).get();

            if (selectedIds.length > 0) {
                if (confirm('Are you sure you want to delete the selected course units?')) {
                    $.ajax({
                        url: '{{ route("course-units.bulkDelete") }}',
                        type: 'DELETE',
                        data: {
                            ids: selectedIds,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                // Remove deleted rows from the table
                                $('.selectItem:checked').closest('tr').remove();
                                alert(response.success);
                            } else {
                                alert('An error occurred while deleting the selected course units.');
                            }
                        },
                        error: function(response) {
                            alert('An error occurred while deleting the selected course units.');
                        }
                    });
                }
            } else {
                alert('Please select at least one course unit to delete.');
            }
        });
    });
</script>