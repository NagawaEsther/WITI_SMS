@extends('layouts.app')
@section('title')
Enrollments
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Enrollments</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('enrollments.create')}}" class="btn btn-primary form-btn">Enrollment <i
                    class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @include('enrollments.table')
            </div>
        </div>
    </div>

</section>
@endsection


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Enrollments List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Student</th>
                <th>Program</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enrollments as $enrollment)
            <tr>
                <td>{{ $enrollment->student->name }}</td>
                <td>{{ $enrollment->program->name }}</td>
                <td>{{ $enrollment->status }}</td>
                <td>
                    <a href="{{ route('enrollments.show', $enrollment->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary">Add New Enrollment</a>
</div>
@endsection --}}