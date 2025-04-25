<div class="container my-5">
    <h2 class="text-center mb-4">Student Application Form</h2>

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <form wire:submit.prevent="submitApplication">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" wire:model="firstname">
                @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" wire:model="lastname">
                @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" wire:model="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" wire:model="phone_number">
                @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="phone_number2">Secondary Phone Number</label>
                <input type="text" class="form-control" id="phone_number2" wire:model="phone_number2">
                @error('phone_number2') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" wire:model="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" class="form-control" id="date_of_birth" wire:model="date_of_birth">
            @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="program_id">Program</label>
            <select class="form-control" id="program_id" wire:model="program_id">
                <option value="">Select Program</option>
                @foreach ($programs as $program)
                <option value="{{ $program->id }}">{{ $program->name }}</option>
                @endforeach
            </select>
            @error('program_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" wire:model="address"></textarea>
            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="nationality">Nationality</label>
            <input type="text" class="form-control" id="nationality" wire:model="nationality">
            @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="guardian_name">Guardian's Name</label>
            <input type="text" class="form-control" id="guardian_name" wire:model="guardian_name">
            @error('guardian_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="guardian_contact">Guardian's Contact</label>
            <input type="text" class="form-control" id="guardian_contact" wire:model="guardian_contact">
            @error('guardian_contact') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>
</div>