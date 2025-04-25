@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Submitted Dead Semester & Year Requests</h2>

    @if($requests->isEmpty())
    <div class="alert alert-info">No requests found.</div>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Semester</th>
                <th>Year</th>
                <th>Reason</th>
                <th>Document</th>
                <th>Status</th>
                <th>Submitted At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{ $request->name }}</td>
                <td>{{ ucfirst($request->type) }}</td>
                <td>{{ $request->semester ?? '-' }}</td>
                <td>{{ $request->year ?? '-' }}</td>
                <td>{{ $request->reason }}</td>
                {{-- <td>
                    @if($request->document)
                    <a href="{{ Storage::url($request->document) }}" target="_blank">View</a>
                    @else
                    No Document
                    @endif
                </td> --}}

                <td>
                    @if($request->document)
                    <a href="{{ asset('storage/'.$request->document) }}" class="btn btn-sm btn-success"
                        target="_blank">View</a>
                    @else
                    <span class="text-muted">No document</span>
                    @endif
                </td>
                <td>{{ $request->status }}</td>
                <td>{{ $request->created_at->format('d M Y') }}</td>
                <td>
                    @if($request->status === 'pending')
                    <form method="POST" action="{{ route('requests.approve', $request->id) }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form method="POST" action="{{ route('requests.reject', $request->id) }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                    @else
                    <span class="badge bg-secondary">{{ ucfirst($request->status) }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection