<div class="container">
    <h2 class="mb-4">Lecturer Details</h2>

    <div class="mb-3">
        <strong>Name:</strong> {{ $lecturer->name }}
    </div>

    <div class="mb-3">
        <strong>Email:</strong> {{ $lecturer->email }}
    </div>

    <div class="mb-3">
        <strong>Phone Number:</strong> {{ $lecturer->phone_number }}
    </div>

    <div class="mb-3">
        <strong>Gender:</strong> {{ $lecturer->gender }}
    </div>

    <div class="mb-3">
        <strong>Position:</strong> {{ $lecturer->position }}
    </div>

    <div class="mb-3">
        <strong>Status:</strong> {{ $lecturer->status }}
    </div>





    <a href="{{ route('lecturers.index') }}" class="btn btn-secondary">Back to List</a>
</div>