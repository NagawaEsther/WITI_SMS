@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Lecture Details</h4>

    <a href="{{ route('lectures.index') }}" class="btn btn-secondary mb-3">Back to Lectures List</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $lecture->title }}</h5>

            <p><strong>Start Time:</strong> {{ $lecture->start_time }}</p>
            <p><strong>End Time:</strong> {{ $lecture->end_time }}</p>
            <p><strong>Course Unit:</strong> {{ $lecture->courseUnit->name ?? 'N/A' }}</p>
            <p><strong>Description:</strong> {{ $lecture->description ?? 'N/A' }}</p>
            <p><strong>Posted By:</strong> {{ $lecture->posted_by }}</p>
            <p><strong>Posted On:</strong> {{ $lecture->created_at->format('d M Y') }}</p>

            @if($lecture->file_path)
            <p><strong>Lecture File:</strong> <a href="{{ asset('storage/'.$lecture->file_path) }}"
                    class="btn btn-sm btn-success" target="_blank">Download</a></p>
            @else
            <p><strong>Lecture File:</strong> <span class="text-muted">N/A</span></p>
            @endif

            @if($lecture->video_url)
            <p><strong>Video URL:</strong> <a href="{{ $lecture->video_url }}" class="btn btn-sm btn-info"
                    target="_blank">Watch</a></p>
            @else
            <p><strong>Video URL:</strong> <span class="text-muted">N/A</span></p>
            @endif

            {{-- <div class="mt-3">
                <a href="{{ route('lectures.edit', $lecture->id) }}" class="btn btn-warning btn-sm"><i
                        class="fa fa-edit"></i> Edit</a>

                <form action="{{ route('lectures.destroy', $lecture->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Are you sure you want to delete this lecture?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div> --}}
        </div>
    </div>
</div>
@endsection