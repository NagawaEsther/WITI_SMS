@extends('layouts.app')

@section('title', 'Create Referral')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Referral</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('referrals.index') }}" class="btn btn-secondary">Back to Referrals</a>
        </div>
    </div>

    <div class="section-body">
        <form action="{{ route('referrals.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="student_application_id">Student Application ID:</label>
                <input type="text" name="student_application_id" id="student_application_id" class="form-control"
                    required>
                @error('student_application_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="referral_source_id">Referral Source ID:</label>
                <input type="text" name="referral_source_id" id="referral_source_id" class="form-control" required>
                @error('referral_source_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Referral</button>
        </form>
    </div>
</section>
@endsection