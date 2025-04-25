{{-- <div style="max-height: 400px; overflow-y: auto;">
    <table id="studentsTable" class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Student Name</th>
                <th>Reg Number</th>
                <th>Admission Date</th>
                <th>Status</th>
                <th>Cohort</th>
                <th>Created By</th>
                <th>Student Application ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->user->first_name }}</td>
                <td>{{ $student->reg_number }}</td>
                <td>{{ \Carbon\Carbon::parse($student->admission_date)->format('d M Y') }}</td>
                <td>
                    @if ($student->status == 'dropped')
                    <span class="badge badge-danger">{{ ucfirst($student->status) }}</span>
                    @elseif ($student->status == 'graduated')
                    <span class="badge badge-success">{{ ucfirst($student->status) }}</span>
                    @elseif ($student->status == 'active')
                    <span class="badge badge-warning">{{ ucfirst($student->status) }}</span>
                    @else
                    <span class="badge badge-secondary">{{ ucfirst($student->status) }}</span>
                    @endif
                </td>
                <td>{{ $student->cohort->name }}</td>
                <td>{{ Auth::user()->first_name }}</td>
                <td>{{ $student->student_application_id }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#studentsTable').DataTable({
            "paging": true,          // Enables paging
            "searching": true,       // Enables search
            "ordering": true,        // Enable sorting
            "pageLength": 5,         // Number of rows per page
            "lengthMenu": [5, 10, 25, 50] // Options for page length
        });
    });
</script> --}}

{{-- <div style="max-height: 400px; overflow-y: auto;">
    <form action="{{ route('students.bulk-delete') }}" method="POST" id="bulkDeleteForm">
        @csrf
        <button type="submit" class="btn btn-danger mb-3" id="bulkDeleteBtn" disabled>
            <i class="fas fa-trash-alt"></i> Bulk Delete
        </button>

        <table id="studentsTable" class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <!-- Add a column for the Select All checkbox -->
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>Student Name</th>
                    <th>Reg Number</th>
                    <th>Admission Date</th>
                    <th>Status</th>
                    <th>Cohort</th>
                    <th>Created By</th>
                    <th>Student Application ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <!-- Add checkbox for each row -->
                    <td><input type="checkbox" name="ids[]" value="{{ $student->id }}" class="studentCheckbox"></td>
                    <td>{{ $student->user->first_name }}</td>
                    <td>{{ $student->reg_number }}</td>
                    <td>{{ \Carbon\Carbon::parse($student->admission_date)->format('d M Y') }}</td>
                    <td>
                        @if ($student->status == 'dropped')
                        <span class="badge badge-danger">{{ ucfirst($student->status) }}</span>
                        @elseif ($student->status == 'graduated')
                        <span class="badge badge-success">{{ ucfirst($student->status) }}</span>
                        @elseif ($student->status == 'active')
                        <span class="badge badge-warning">{{ ucfirst($student->status) }}</span>
                        @else
                        <span class="badge badge-secondary">{{ ucfirst($student->status) }}</span>
                        @endif
                    </td>
                    <td>{{ $student->cohort->name }}</td>
                    <td>{{ Auth::user()->first_name }}</td>
                    <td>{{ $student->student_application_id }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>

<script>
    $(document).ready(function() {
        var table = $('#studentsTable').DataTable({
            "paging": true,          // Enables paging
            "searching": true,       // Enables search
            "ordering": true,        // Enable sorting
            "pageLength": 5,         // Number of rows per page
            "lengthMenu": [5, 10, 25, 50] // Options for page length
        });

        // Handle the "Select All" checkbox
        $('#selectAll').on('change', function() {
            var isChecked = $(this).prop('checked');
            // Check or uncheck all checkboxes in the table
            $('input.studentCheckbox').prop('checked', isChecked).trigger('change');
        });

        // Enable or disable the bulk delete button based on checkbox selection
        $('#studentsTable').on('change', '.studentCheckbox', function() {
            var selectedCount = $('input.studentCheckbox:checked').length;
            $('#bulkDeleteBtn').prop('disabled', selectedCount === 0);
        });

        // Handle form submission for bulk delete
        $('#bulkDeleteForm').submit(function(e) {
            e.preventDefault();
            var selectedIds = [];
            $('input.studentCheckbox:checked').each(function() {
                selectedIds.push($(this).val());
            });
            if (selectedIds.length > 0) {
                // Add selected IDs to the form data
                $(this).append('<input type="hidden" name="ids" value="' + selectedIds.join(',') + '">');
                this.submit();
            } else {
                alert('Please select at least one student to delete.');
            }
        });
    });
</script> --}}



{{-- <form action="{{ route('students.bulk-delete') }}" method="POST" id="bulkDeleteForm">
    @csrf


    <button type="submit" class="btn btn-custom mb-3" id="bulkDeleteBtn" disabled>
        <i class="fas fa-trash-alt icon-white"></i> Bulk Delete
    </button>

    <style>
        .btn-custom {
            background-color: maroon;
            /* Maroon background */
            color: white;
            /* White text color */
            border: none;
            /* Remove border */
        }

        .btn-custom:hover {
            background-color: maroon !important;
            /* Prevent any hover effect */
            color: white !important;
            /* Keep text color white */
        }

        /* Make the icon white */
        .icon-white {
            color: white;
            /* Set icon color to white */
        }
    </style>


    <table id="studentsTable" class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <!-- Add a column for the Select All checkbox -->
                <th><input type="checkbox" id="selectAll"></th>
                <th>Student Name</th>
                <th>Reg Number</th>
                <th>Admission Date</th>
                <th>Status</th>
                <th>Cohort</th>
                <th>Created By</th>
                <th>Student Application ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <!-- Add checkbox for each row -->
                <td><input type="checkbox" name="ids[]" value="{{ $student->id }}" class="studentCheckbox"></td>
                <td>{{ $student->user->first_name }}</td>
                <td>{{ $student->reg_number }}</td>
                <td>{{ \Carbon\Carbon::parse($student->admission_date)->format('d M Y') }}</td>
                <td>
                    @if ($student->status == 'dropped')
                    <span class="badge badge-danger">{{ ucfirst($student->status) }}</span>
                    @elseif ($student->status == 'graduated')
                    <span class="badge badge-success">{{ ucfirst($student->status) }}</span>
                    @elseif ($student->status == 'active')
                    <span class="badge badge-warning">{{ ucfirst($student->status) }}</span>
                    @else
                    <span class="badge badge-secondary">{{ ucfirst($student->status) }}</span>
                    @endif
                </td>
                <td>{{ $student->cohort->name }}</td>
                <td>{{ Auth::user()->first_name }}</td>
                <td>{{ $student->student_application_id }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>

<script>
    $(document).ready(function() {
        var table = $('#studentsTable').DataTable({
            "paging": true,          // Enables paging
            "searching": true,       // Enables search
            "ordering": true,        // Enable sorting
            "pageLength": 5,         // Number of rows per page
            "lengthMenu": [5, 10, 25, 50] // Options for page length
        });

        // Handle the "Select All" checkbox
        $('#selectAll').on('change', function() {
            var isChecked = $(this).prop('checked');
            // Check or uncheck all checkboxes in the table
            $('input.studentCheckbox').prop('checked', isChecked).trigger('change');
        });

        // Enable or disable the bulk delete button based on checkbox selection
        $('#studentsTable').on('change', '.studentCheckbox', function() {
            var selectedCount = $('input.studentCheckbox:checked').length;
            $('#bulkDeleteBtn').prop('disabled', selectedCount === 0);
        });

        // Handle form submission for bulk delete
        $('#bulkDeleteForm').submit(function(e) {
            e.preventDefault();
            var selectedIds = [];
            $('input.studentCheckbox:checked').each(function() {
                selectedIds.push($(this).val());
            });
            if (selectedIds.length > 0) {
                // Add selected IDs to the form data
                $(this).append('<input type="hidden" name="ids" value="' + selectedIds.join(',') + '">');
                this.submit();
            } else {
                alert('Please select at least one student to delete.');
            }
        });
    });
</script> --}}

<form action="{{ route('students.bulk-delete') }}" method="POST" id="bulkDeleteForm">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" id="bulkDeleteBtn" disabled>
        <i class="fas fa-trash-alt"></i> Bulk Delete
    </button>

    <table id="studentsTable" class="table table-bordered">
        <thead>
            <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th>Student Name</th>
                <th>Reg Number</th>
                <th>Admission Date</th>
                <th>Status</th>
                <th>Cohort</th>
                <th>Created By</th>
                {{-- <th>Student Application ID</th> --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td><input type="checkbox" name="ids[]" value="{{ $student->id }}" class="studentCheckbox"></td>
                <td>{{ $student->user->first_name }} {{ $student->user->last_name }}</td>
                <td>{{ $student->reg_number }}</td>
                <td>{{ \Carbon\Carbon::parse($student->admission_date)->format('d M Y') }}</td>
                <td>
                    @if ($student->status == 'dropped')
                    <span class="badge badge-danger">{{ ucfirst($student->status) }}</span>
                    @elseif ($student->status == 'graduated')
                    <span class="badge badge-success">{{ ucfirst($student->status) }}</span>
                    @elseif ($student->status == 'active')
                    <span class="badge badge-warning">{{ ucfirst($student->status) }}</span>
                    @else
                    <span class="badge badge-secondary">{{ ucfirst($student->status) }}</span>
                    @endif
                </td>
                <td>{{ $student->cohort->name }}</td>
                <td>{{ Auth::user()->first_name }}</td>
                {{-- <td>{{ $student->student_application_id }}</td> --}}
                <td>
                    <div class="btn-group" role="group">
                        {{-- <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        --}}

                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger btn-sm"><i>Delete</button> --}}
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>

                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#studentsTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });

        // Handle "Select All" checkbox
        $('#selectAll').on('change', function() {
            var isChecked = $(this).prop('checked');
            $('input.studentCheckbox').prop('checked', isChecked).trigger('change');
        });

        // Enable or disable the bulk delete button based on checkbox selection
        $('#studentsTable').on('change', '.studentCheckbox', function() {
            var selectedCount = $('input.studentCheckbox:checked').length;
            $('#bulkDeleteBtn').prop('disabled', selectedCount === 0);
        });

        // Handle form submission for bulk delete
        
        $('#bulkDeleteForm').submit(function(e) {
    e.preventDefault();
    var selectedIds = [];
    $('input.studentCheckbox:checked').each(function() {
        selectedIds.push($(this).val());
    });
    
    if (selectedIds.length > 0) {
        // Remove any previous hidden inputs
        $('#bulkDeleteForm input[name="student_ids[]"]').remove();

        // Add selected IDs to the form as hidden inputs
        $.each(selectedIds, function(index, value) {
            $('#bulkDeleteForm').append('<input type="hidden" name="student_ids[]" value="' + value + '">');
        });

        this.submit();
    } else {
        alert('Please select at least one student to delete.');
    }
});

    });
</script>