{{--
<!-- resources/views/upcoming_activities/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Upcoming Activities</h1>

    <!-- Display success message if present -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('upcoming_activities.create') }}" class="btn btn-primary mb-3">Add New Activity</a>

    <table class="table" id='upcomingTable'>
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
                <td>{{ $activity->icon }}</td>
                <td>
                    <a href="{{ route('upcoming_activities.edit', $activity->id) }}"
                        class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('upcoming_activities.destroy', $activity->id) }}" method="POST"
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
</div>
<script>
    $(document).ready(function() {
        $('#upcomingTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });
    });
</script>
@endsection --}}

@extends('layouts.app')
@section('title')
@lang('models/settings.plural')
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>@lang('Students')</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('upcoming_activities.create')}}" class="btn btn-primary form-btn">@lang('Add Student') <i
                    class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @include('upcoming_activities.table')
            </div>
        </div>
    </div>

</section>
@endsection