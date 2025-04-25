{{-- @extends('layouts.app')
@section('title')
Create Cohorts
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading m-0">New Cohorts</h3>
        <div class="filter-container section-header-breadcrumb row justify-content-md-end">
            <a href="{{ route('cohorts.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <div class="content">
        @include('stisla-templates::common.errors')
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body ">
                            {!! Form::open(['route' => 'cohorts.store']) !!}
                            <div class="row">
                                @include('cohorts.fields')
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection --}}


<!-- resources/views/cohorts/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Cohort</h2>
    <form action="{{ route('cohorts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Cohort Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date"
                class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required>
            @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date"
                class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" required>
            @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="completed" {{ old('status')=='completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="expected_graduation_date">Expected Graduation Date</label>
            <input type="date" name="expected_graduation_date" id="expected_graduation_date"
                class="form-control @error('expected_graduation_date') is-invalid @enderror"
                value="{{ old('expected_graduation_date') }}" required>
            @error('expected_graduation_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="curriculum">Curriculum</label>
            <textarea name="curriculum" id="curriculum" class="form-control @error('curriculum') is-invalid @enderror"
                rows="3" required>{{ old('curriculum') }}</textarea>
            @error('curriculum') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="number_of_students">Number of Students</label>
            <input type="number" name="number_of_students" id="number_of_students"
                class="form-control @error('number_of_students') is-invalid @enderror"
                value="{{ old('number_of_students') }}" required>
            @error('number_of_students') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Cohort</button>
    </form>
</div>
@endsection