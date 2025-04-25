@section('css')
@include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@push('scripts')
@include('layouts.datatables_js')
{!! $dataTable->scripts() !!}
@endpush

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Enrollment List</h1>

    <!-- Table for displaying enrollment data -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Enrollment ID</th>
                <th>Student Registration</th>
                <th>Program Name</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
            <tr>
                <td>{{ $enrollment->id }}</td>
                <td>{{ $enrollment->student->reg_number }}</td>
                <td>{{ $enrollment->program->name }}</td>
                <td>{{ $enrollment->status }}</td>
                <td>{{ $enrollment->created_at }}</td>
                <td>{{ $enrollment->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}