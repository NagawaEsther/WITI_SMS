@extends('layouts.app')

@section('content')
<h1>Edit Referral</h1>

<form action="{{ route('referrals.update', $referral->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="student_application_id">Student Application ID:</label>
        <input type="text" name="student_application_id" id="student_application_id"
            value="{{ $referral->student_application_id }}" required>
    </div>
    <div>
        <label for="referral_source_id">Referral Source ID:</label>
        <input type="text" name="referral_source_id" id="referral_source_id" value="{{ $referral->referral_source_id }}"
            required>
    </div>
    <button type="submit">Update Referral</button>
</form>
@endsection