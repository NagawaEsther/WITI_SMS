{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Student Enrollments</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Email</th>

                <th>Enrolled CourseUnits</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>

                <td>{{ $student->email }}</td>

                <td>
                    @if($student->courseUnits->isEmpty())
                    <span class="text-danger">Not Enrolled</span>
                    @else
                    <ul>
                        @foreach($student->courseUnits as $course)
                        <li>{{ $course->name }} ({{ $course->course_unit_code }})</li>
                        @endforeach
                    </ul>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Student Enrollments</h4>


    <button id="bulk-delete-btn" class="btn btn-danger mb-3" disabled>Bulk delete</button>

    <table class="table table-bordered  bg-white" id="enrollmentsTable">
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>Student Name</th>
                <th>Email</th>
                <th>Enrolled CourseUnits</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>
                    <input type="checkbox" class="select-item" value="{{ $student->id }}">
                </td>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    @if($student->courseUnits->isEmpty())
                    <span class="text-danger">Not Enrolled</span>
                    @else
                    <ul>
                        @foreach($student->courseUnits as $course)
                        <li>{{ $course->name }} ({{ $course->course_unit_code }})</li>
                        @endforeach
                    </ul>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        
        var table = $('#enrollmentsTable').DataTable();

        
        $('#select-all').on('click', function () {
            $('.select-item').prop('checked', this.checked);
            toggleBulkDeleteButton();
        });

       
        $('.select-item').on('change', function () {
            toggleBulkDeleteButton();
        });

        function toggleBulkDeleteButton() {
            let checkedCount = $('.select-item:checked').length;
            $('#bulk-delete-btn').prop('disabled', checkedCount === 0);
        }

      
        $('#bulk-delete-btn').on('click', function () {
            let selectedIds = $('.select-item:checked').map(function () {
                return this.value;
            }).get();

            if (selectedIds.length === 0) return;

            if (confirm("Are you sure you want to delete the selected enrollments?")) {
                $.ajax({
                    url: "{{ route('admin.enrollments.bulk_delete') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        ids: selectedIds
                    },
                    success: function (response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function (xhr) {
                        alert("An error occurred while deleting enrollments.");
                    }
                });
            }
        });
    });
</script>
@endsection

@endsection --}}



@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Student Enrollments</h4>

    {{-- Bulk Delete Button --}}
    <button id="bulk-delete-btn" class="btn btn-danger mb-3" disabled>Bulk delete</button>

    <table class="table table-bordered bg-white" id="enrollmentsTable">
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>Student Name</th>
                <th>Email</th>
                <th>Enrolled Course Units</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            @if($student->courseUnits->isEmpty())
            <tr>
                <td><input type="checkbox" class="select-item" value="{{ $student->id }}"></td>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td><span class="text-danger">Not Enrolled</span></td>
            </tr>
            @else
            @foreach($student->courseUnits as $index => $course)
            <tr>
                @if($index === 0)
                <td rowspan="{{ $student->courseUnits->count() }}">
                    <input type="checkbox" class="select-item" value="{{ $student->id }}">
                </td>
                <td rowspan="{{ $student->courseUnits->count() }}">{{ $student->first_name }} {{ $student->last_name }}
                </td>
                <td rowspan="{{ $student->courseUnits->count() }}">{{ $student->email }}</td>
                @endif
                <td>{{ $course->name }} ({{ $course->course_unit_code }})</td>
            </tr>
            @endforeach
            @endif
            @endforeach
        </tbody>
    </table>
</div>

{{-- Include jQuery and DataTables --}}
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize DataTable
        var table = $('#enrollmentsTable').DataTable();

        // Select all checkbox logic
        $('#select-all').on('click', function () {
            $('.select-item').prop('checked', this.checked);
            toggleBulkDeleteButton();
        });

        // Toggle bulk delete button on checkbox selection
        $('.select-item').on('change', function () {
            toggleBulkDeleteButton();
        });

        function toggleBulkDeleteButton() {
            let checkedCount = $('.select-item:checked').length;
            $('#bulk-delete-btn').prop('disabled', checkedCount === 0);
        }

        // Bulk delete functionality
        $('#bulk-delete-btn').on('click', function () {
            let selectedIds = $('.select-item:checked').map(function () {
                return this.value;
            }).get();

            if (selectedIds.length === 0) return;

            if (confirm("Are you sure you want to delete the selected enrollments?")) {
                $.ajax({
                    url: "{{ route('admin.enrollments.bulk_delete') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        ids: selectedIds
                    },
                    success: function (response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function (xhr) {
                        alert("An error occurred while deleting enrollments.");
                    }
                });
            }
        });
    });
</script>
@endsection

@endsection