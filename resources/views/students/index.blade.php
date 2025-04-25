{{--
<!-- resources/views/students/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Student</a>
    <a href="{{ route('students.table') }}" class="btn btn-secondary mb-3">View All Students</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Reg Number</th>
                <th>User</th>
                <th>Status</th>
                <th>Cohort</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $student->reg_number }}</td>
                <td>{{ $student->user->name }}</td>
                <td>{{ $student->status }}</td>
                <td>{{ $student->cohort->name }}</td>
                <td>
                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
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
            <a href="{{ route('students.create')}}" class="btn btn-primary form-btn">@lang('Add Student') <i
                    class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @include('students.table')
            </div>
        </div>
    </div>

</section>
@endsection