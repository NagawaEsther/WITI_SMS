@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Lecturer Details</h2>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $lecturer->name }}</h4>

            <div class="mb-3">
                <strong>Email:</strong> {{ $lecturer->email }}
            </div>

            <div class="mb-3">
                <strong>Phone Number:</strong> {{ $lecturer->phone_number }}
            </div>

            <div class="mb-3">
                <strong>Gender:</strong> {{ $lecturer->gender ?? 'N/A' }}
            </div>



            <div class="mb-3">
                <strong>Position:</strong> {{ $lecturer->position ?? 'N/A' }}
            </div>

            <div class="mb-3">
                <strong>Status:</strong> {{ $lecturer->status ?? 'N/A' }}
            </div>


            {{-- <div class="mb-3">
                <strong>Profile Image:</strong><br>
                <img src="{{ asset('storage/' . $lecturer->image) }}" alt="Lecturer Image" class="img-thumbnail"
                    width="150">
            </div> --}}

            <a href="{{ route('lecturers.index') }}" class="btn btn-secondary">Back to List</a>

        </div>
    </div>
</div>
@endsection