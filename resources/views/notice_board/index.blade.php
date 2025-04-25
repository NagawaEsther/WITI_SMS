<!-- resources/views/notice_board/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <h1>Notice Board</h1> --}}

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('notice-board.create') }}" class="btn btn-primary mb-3">Add New Notice</a>

    <table class="table table-striped" id='noticeTable'>
        <thead>
            <tr>
                {{-- <th>#</th> --}}
                <th>Title</th>
                <th>Date</th>
                <th>Views</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notices as $notice)
            <tr>
                {{-- <td>{{ $notice->id }}</td> --}}
                <td>{{ $notice->title }}</td>
                <td>{{ $notice->date }}</td>
                <td>{{ $notice->views ?? 0 }}</td>
                <td>
                    <a href="{{ route('notice-board.show', $notice->id) }}" class="btn btn-info btn-sm"><i
                            class="fa fa-eye"></i></a>
                    {{-- <a href="{{ route('lecturers.edit', $lecturer->id) }}" class="btn btn-warning btn-sm"><i
                            class="fa fa-edit"></i></a> --}}
                    <form action="{{ route('notice-board.destroy', $notice->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this lecturer?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                    <!-- Add delete or edit actions here -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#noticeTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });
    });
</script>

@endsection