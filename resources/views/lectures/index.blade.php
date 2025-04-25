{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lectures</h2>
    <a href="{{ route('lectures.create') }}" class="btn btn-primary mb-3">Add New Lecture</a>

    @foreach($lectures as $lecture)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $lecture->title }}</h5>
            <p class="card-text"><strong>Course:</strong> {{ $lecture->courseUnit->name ?? 'N/A' }}</p>
            <p>{{ $lecture->description }}</p>

            @if($lecture->file_path)
            <a href="{{ asset('storage/'.$lecture->file_path) }}" class="btn btn-success">Download File</a>
            @endif

            @if($lecture->video_url)
            <a href="{{ $lecture->video_url }}" class="btn btn-info" target="_blank">Watch Video</a>
            @endif
        </div>
        <div class="card-footer text-muted">
            Posted by: {{ $lecture->posted_by }} on {{ $lecture->created_at->format('d M Y') }}
        </div>
    </div>
    @endforeach
</div>
@endsection --}}

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Lectures</h2>

    <a href="{{ route('lectures.create') }}" class="btn btn-primary mb-3">Add New Lecture</a>



    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-white">
                <tr>
                    <th>#</th>
                    <th>Start time</th>
                    <th>End time</th>
                    <th>Title</th>
                    <th>Course Unit</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Video</th>
                    <th>Posted By</th>
                    <th>Posted On</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lectures as $index => $lecture)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{$lecture->start_time}}</td>
                    <td>{{$lecture->end_time}}</td>
                    <td>{{ $lecture->title }}</td>
                    <td>{{ $lecture->courseUnit->name ?? 'N/A' }}</td>
                    <td>{{ Str::limit($lecture->description, 50) }}</td>

                    <td>
                        @if($lecture->file_path)
                        <a href="{{ asset('storage/'.$lecture->file_path) }}" class="btn btn-sm btn-success"
                            target="_blank">Download</a>
                        @else
                        <span class="text-muted">N/A</span>
                        @endif
                    </td>

                    <td>
                        @if($lecture->video_url)
                        <a href="{{ $lecture->video_url }}" class="btn btn-sm btn-info" target="_blank">Watch</a>
                        @else
                        <span class="text-muted">N/A</span>
                        @endif
                    </td>

                    <td>{{ $lecture->posted_by }}</td>

                    <td>{{ $lecture->created_at->format('d M Y') }}</td>

                    <td>
                        <a href="{{ route('lectures.show', $lecture->id) }}" class="btn btn-sm btn-primary">View</a>

                    </td>


                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">No lectures found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection --}}


@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Lectures</h4>

    <a href="{{ route('lectures.create') }}" class="btn btn-primary mb-3">Add New Lecture</a>
    <button id="bulkDeleteBtn" class="btn btn-danger mb-3">Bulk delete</button>

    <div class="table-responsive">
        <table id="lecturesTable" class="table table-striped table-bordered bg-white ">
            <thead class="table-white">
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    {{-- <th>#</th> --}}
                    {{-- <th>Start time</th>
                    <th>End time</th> --}}
                    <th>Title</th>
                    <th>Course Unit</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Video</th>
                    {{-- <th>Posted By</th>
                    <th>Posted On</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lectures as $index => $lecture)
                <tr>
                    <td><input type="checkbox" class="selectItem" value="{{ $lecture->id }}"></td>
                    {{-- <td>{{ $index + 1 }}</td> --}}
                    {{-- <td>{{$lecture->start_time}}</td>
                    <td>{{$lecture->end_time}}</td> --}}
                    <td>{{ $lecture->title }}</td>
                    <td>{{ $lecture->courseUnit->name ?? 'N/A' }}</td>
                    <td>{{ Str::limit($lecture->description, 50) }}</td>

                    <td>
                        @if($lecture->file_path)
                        <a href="{{ asset('storage/'.$lecture->file_path) }}" class="btn btn-sm btn-success"
                            target="_blank">Download</a>
                        @else
                        <span class="text-muted">N/A</span>
                        @endif
                    </td>

                    <td>
                        @if($lecture->video_url)
                        <a href="{{ $lecture->video_url }}" class="btn btn-sm btn-info" target="_blank">Watch</a>
                        @else
                        <span class="text-muted">N/A</span>
                        @endif
                    </td>

                    {{-- <td>{{ $lecture->posted_by }}</td> --}}
                    {{-- <td>{{ $lecture->created_at->format('d M Y') }}</td> --}}

                    <td>
                        <a href="{{ route('lectures.show', $lecture->id) }}" class="btn btn-light btn-sm"><i
                                class="fa fa-eye"></i></a>
                        <a href="{{ route('lectures.show', $lecture->id) }}" class="btn btn-warning btn-sm"><i
                                class="fa fa-edit"></i></a>


                        <form action="{{ route('lectures.destroy', $lecture->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this lecture?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="12" class="text-center">No lectures found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Include jQuery and DataTables -->
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#lecturesTable').DataTable();

        // Select all checkboxes
        $('#selectAll').click(function() {
            $('.selectItem').prop('checked', this.checked);
        });

        // Bulk delete
        $('#bulkDeleteBtn').click(function() {
            var selectedIds = $('.selectItem:checked').map(function() {
                return $(this).val();
            }).get();

            if (selectedIds.length === 0) {
                alert('Please select at least one lecture to delete.');
                return;
            }

            if (confirm('Are you sure you want to delete the selected lectures?')) {
                $.ajax({
                    url: '{{ route("lectures.bulkDelete") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        ids: selectedIds
                    },
                    success: function(response) {
                        location.reload(); // Reload the page after deletion
                    }
                });
            }
        });
    });
</script>
@endsection

@endsection