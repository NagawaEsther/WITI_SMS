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
@section('title')
Programs
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Programs</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('referral_sources.create')}}" class="btn btn-primary form-btn">Add Program <i
                    class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @include('referral_sources.table')
            </div>
        </div>
    </div>

</section>
@endsection