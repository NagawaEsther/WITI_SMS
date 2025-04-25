{{--

@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Student Feedback & Suggestions</h3>

    @if($feedbacks->count() > 0)
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>

                <th>Student Name</th>
                <th>Email</th>
                <th>Feedback</th>
                <th>Date Submitted</th>
                <th>Reply</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $index => $feedback)
            <tr>

                <td>{{ optional($feedback->student)->first_name }} {{ optional($feedback->student)->last_name ?? 'N/A'
                    }}</td>


                <td>{{ $feedback->student->email ?? 'N/A' }}</td>
                <td>{{ $feedback->message }}</td>
                <td>{{ $feedback->created_at->format('d M Y, h:i A') }}</td>
                <td>
                    <form action="{{ route('admin.feedbacks.reply', $feedback->id) }}" method="POST">
                        @csrf
                        <textarea name="reply" class="form-control" placeholder="Type your reply here..."
                            required></textarea>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Reply</button>
                    </form>
                </td>

                <td>
                    <form action="{{ route('admin.feedbacks.destroy', $feedback->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info">No feedback submitted yet.</div>
    @endif
</div>
@endsection --}}


@extends('layouts.app')
@section('title')
Student Feedback & Suggestions
@section('content')
<div class="container">
    <h5 class="mb-4">Student Feedback & Suggestions</h5>

    @if($feedbacks->count() > 0)
    {{-- DataTable Styles --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    {{-- Bulk Delete Button --}}
    <button id="bulkDeleteBtn" class="btn btn-danger mb-3" disabled>Bulk delete</button>

    <table id="feedbackTable" class="table table-bordered table-striped bg-white">
        <thead class="thead-dark">
            <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th>Student Name</th>
                <th>Email</th>
                <th>Feedback</th>
                <th>Date Submitted</th>
                <th>Reply</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
            <tr>
                <td><input type="checkbox" class="selectItem" value="{{ $feedback->id }}"></td>
                <td>{{ optional($feedback->student)->first_name }} {{ optional($feedback->student)->last_name ?? 'N/A'
                    }}</td>
                <td>{{ $feedback->student->email ?? 'N/A' }}</td>
                <td>{{ $feedback->message }}</td>
                <td>{{ $feedback->created_at->format('d M Y, h:i A') }}</td>
                <td>
                    <form action="{{ route('admin.feedbacks.reply', $feedback->id) }}" method="POST">
                        @csrf
                        <textarea name="reply" class="form-control" placeholder="Type your reply here..."
                            required></textarea>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Reply</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('admin.feedbacks.destroy', $feedback->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- DataTable Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            let table = $('#feedbackTable').DataTable({
            "pageLength": 5, // Default number of entries per page
            "lengthMenu": [5, 10, 25, 50, 100] // Dropdown for entries selection
        });
            // let table = $('#feedbackTable').DataTable();

            // Select All Checkbox
            $('#selectAll').on('click', function() {
                $('.selectItem').prop('checked', this.checked);
                toggleBulkDeleteButton();
            });

            // Enable/Disable Bulk Delete Button
            $('.selectItem').on('change', function() {
                toggleBulkDeleteButton();
            });

            function toggleBulkDeleteButton() {
                let anyChecked = $('.selectItem:checked').length > 0;
                $('#bulkDeleteBtn').prop('disabled', !anyChecked);
            }

            // Bulk Delete Action
            $('#bulkDeleteBtn').on('click', function() {
                let selectedIds = $('.selectItem:checked').map(function() {
                    return $(this).val();
                }).get();

                if (selectedIds.length === 0) return;

                if (confirm('Are you sure you want to delete selected feedbacks?')) {
                    $.ajax({
                        url: "{{ route('admin.feedbacks.bulkDelete') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            ids: selectedIds
                        },
                        success: function(response) {
                            alert(response.message);
                            location.reload();
                        },
                        error: function(xhr) {
                            alert('Error deleting feedbacks');
                        }
                    });
                }
            });
        });
    </script>

    @else
    <div class="alert alert-info">No feedback submitted yet.</div>
    @endif
</div>
@endsection
@endsection