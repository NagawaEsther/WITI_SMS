@extends('layouts.app')

@section('content')

{{-- <h5>Upcoming Activities</h5> --}}
<div class="container">

    <!-- Display success message if present -->
    {{-- @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif --}}

    <!-- Button to add new activity -->
    <a href="{{ route('upcoming_activities.create') }}" class="btn btn-primary mb-3">Add New Activity</a>

    <!-- Table to display upcoming activities -->
    <table class="table table-striped" id="upcomingActivitiesTable">
        <thead>
            <tr>
                <th>Title</th>
                <th>Time</th>
                <th>Status</th>
                <th>Icon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($upcomingActivities as $activity)
            <tr>
                <td>{{ $activity->title }}</td>
                <td>{{ $activity->time }}</td>
                <td>{{ $activity->status }}</td>
                <td><i class="{{ $activity->icon }}"></i></td>
                <td>

                    <a href="{{ route('upcoming_activities.show', $activity->id) }}" class="btn btn-info btn-sm">
                        <i class="fa fa-eye"></i>
                        <!-- Edit and Delete actions -->
                        <a href="{{ route('upcoming_activities.edit', $activity->id) }}"
                            class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('upcoming_activities.destroy', $activity->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<!-- Include jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#upcomingActivitiesTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });
    });
</script>

@endsection