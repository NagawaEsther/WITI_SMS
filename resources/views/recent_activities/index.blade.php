@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <h2>Recent Activities</h2> --}}
    <a href="{{ route('recent_activities.create') }}" class="btn btn-primary">Add Activity</a>
    <table class="table " id="recentActivitiesTable">
        <thead>
            <tr>
                <th>Title</th>
                <th>Icon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
            <tr>
                <td>{{ $activity->title }}</td>
                <td><i class="{{ $activity->icon }}"></i> {{ $activity->icon }}</td>
                <td>

                    <a href="{{ route('recent_activities.show', $activity->id) }}" class="btn btn-info btn-sm">
                        <i class="fa fa-eye"></i>
                        <!-- Edit and Delete actions -->
                        <a href="{{ route('recent_activities.edit', $activity->id) }}" class="btn btn-warning btn-sm"><i
                                class="fa fa-edit"></i></a>
                        {{-- <form action="{{ route('recent_activities.destroy', $activity->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"> <i class="fa fa-eye"></i></button>
                        </form> --}}
                        <form action="{{ route('recent_activities.destroy', $activity->id) }}" method="POST"
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#recentActivitiesTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });
    });
</script>

@endsection