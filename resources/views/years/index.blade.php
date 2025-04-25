{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">All Years</h1>
    <a href="{{ route('years.create') }}" class="btn btn-primary mb-3">Add New Year</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($years as $year)
            <tr>
                <td>{{ $year->id }}</td>
                <td>{{ $year->name }}</td>
                <td class="text-center">
             
                    <a href="{{ route('years.show', $year->id) }}" class="btn btn-light btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>

               
                    <a href="{{ route('years.edit', $year->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>

                  
                    <form action="{{ route('years.destroy', $year->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">All Years</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('years.create') }}" class="btn btn-primary mb-3">Add New Year</a>
    
    <table id="yearsTable" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($years as $year)
            <tr>
                <td>{{ $year->id }}</td>
                <td>{{ $year->name }}</td>
                <td class="text-center">
                    <a href="{{ route('years.show', $year->id) }}" class="btn btn-light btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('years.edit', $year->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('years.destroy', $year->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $years->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#yearsTable').DataTable({
            "pageLength": 10,
            "lengthMenu": [5, 10, 25, 50],
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            // Disable DataTables pagination since Laravel pagination is used
            "bPaginate": false
        });
    });
</script>
@endsection
