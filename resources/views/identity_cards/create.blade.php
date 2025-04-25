@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Create Identity Card</h2>
    <form action="{{ route('identity_cards.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required>
                <label>Student ID:</label>
                <input type="text" name="reg_number" class="form-control" required>
                <label>Class:</label>
                <input type="text" name="class" class="form-control" required>
                <label>Course:</label>
                <input type="text" name="course" class="form-control">
                <label>DOB:</label>
                <input type="date" name="dob" class="form-control" required>
                <label>Issue Date:</label>
                <input type="date" name="issue_date" class="form-control" required>
                <label>Expiry Date:</label>
                <input type="date" name="expiry_date" class="form-control" required>
                <label>Blood Group:</label>
                <input type="text" name="blood_group" class="form-control">
                <label>Photo:</label>
                <input type="file" name="photo" class="form-control" required>
            </div>
        </div>
        <br>
        <button class="btn btn-primary">Create Card</button>
    </form>
</div>
@endsection