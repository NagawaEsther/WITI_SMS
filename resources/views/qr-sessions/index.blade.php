@extends('layouts.app')

@section('content')
<div class="container">
    <h2>QR Attendance Sessions</h2>

    <div class="mb-3">
        <a href="{{ route('qr-sessions.create') }}" class="btn btn-primary">Create New Session</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Course Unit</th>
                        <th>Lecture</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($qrSessions as $session)
                    <tr>
                        <td>{{ $session->courseUnit->name }}</td>
                        <td>{{ $session->lecture->title }}</td>
                        <td>{{ $session->start_time->format('M d, Y H:i') }}</td>
                        <td>{{ $session->end_time->format('M d, Y H:i') }}</td>
                        <td>
                            @if($session->is_active && $session->end_time->isFuture())
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-secondary">Closed</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('qr-sessions.show', $session) }}" class="btn btn-sm btn-info">View</a>

                            <form action="{{ route('qr-sessions.destroy', $session) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $qrSessions->links() }}
        </div>
    </div>
</div>
@endsection