{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Referral Sources</h2>

    <a href="{{ route('referral_sources.create') }}" class="btn btn-success mb-3">Create Referral Source</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Source Name</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($referralSources as $source)
            <tr>
                <td>{{ $source->id }}</td>
                <td>{{ $source->source_name }}</td>
                <td>{{ ucfirst($source->status) }}</td>
                <td>{{ $source->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('referral_sources.show', $source->id) }}" class="btn btn-info"><i
                            class="fa fa-trash"></i></a>
                    <a href="{{ route('referral_sources.edit', $source->id) }}" class="btn btn-warning"><i
                            class="fa fa-trash"></i></a>
                    <form action="{{ route('referral_sources.destroy', $source->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i
                                class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}

{{-- @extends('layouts.app')

@section('title', 'Referral Sources')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Referral Sources</h1>

        <div class="section-header-breadcrumb">
            <a href="{{ route('referral_sources.create') }}" class="btn btn-primary mb-3">Add New Referral Source</a>
        </div>
    </div>

    <div class="section-body">

        <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <table class="table table-bordered table-striped" id="referral-sources-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Source Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($referralSources as $source)
                <tr>
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->source_name }}</td>
                    <td>{{ ucfirst($source->status) }}</td>
                    <td>
                        <a href="{{ route('referral_sources.show', $source->id) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('referral_sources.edit', $source->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('referral_sources.destroy', $source->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this referral source?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@section('scripts')
<script>
    $(document).ready(function() {
        $('#referral-sources-table').DataTable({
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

@section('title', 'Referral Sources')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Referral Sources</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('referral_sources.create') }}" class="btn btn-primary mb-3">Add New Referral Source</a>
        </div>
    </div>

    <div class="section-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="referral-sources-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Source Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($referralSources as $source)
                    <tr>
                        <td>{{ $source->id }}</td>
                        <td>{{ $source->source_name }}</td>
                        <td>{{ ucfirst($source->status) }}</td>
                        <td>
                            <a href="{{ route('referral_sources.show', $source->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('referral_sources.edit', $source->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('referral_sources.destroy', $source->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this referral source?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@push('scripts')
<!-- Include jQuery & DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#referral-sources-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });
    });
</script>
@endpush

@endsection