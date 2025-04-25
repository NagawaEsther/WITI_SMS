<!-- resources/views/notice_board/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Notice</h1>

    <form action="{{ route('notice-board.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}" required>
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                value="{{ old('date') }}" required>
            @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="views" class="form-label">Views</label>
            <input type="number" class="form-control @error('views') is-invalid @enderror" id="views" name="views"
                value="{{ old('views') }}">
            @error('views')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Save Notice</button>
    </form>
</div>
@endsection