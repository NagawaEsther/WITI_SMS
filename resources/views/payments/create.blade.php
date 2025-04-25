{{-- view/payments/create.php

@extends('layouts.app')

@section('content')
@php
use App\Models\Student;
use App\Models\User;

$user = auth()->user();
$student = $user->student;
@endphp

<div class="container">

    <h3>Make Payment for {{ $user->first_name }} {{ $user->last_name }}</h3>



    <form method="POST" action="{{ route('student.payments.store') }}">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}">

        <div class="mb-3">
            <label>Amount to Pay</label>
            <input type="number" name="amount" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label>Select Payment Method</label>
            <select name="method" class="form-control" required>
                <option value="manual">Manual (Bank/Office)</option>
                <option value="mtn">MTN Mobile Money</option>
                <option value="airtel">Airtel Money</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit Payment</button>
    </form>
</div>
@endsection --}}
{{-- view/payments/create.php --}}
@extends('layouts.app')

@section('content')
@php
use App\Models\Student;
use App\Models\User;

$user = auth()->user();
$student = $user->student;
@endphp

<div class="container">
    <h3>Make Payment for {{ $user->first_name }}</h3>

    <form method="POST" action="{{ route('student.payments.store') }}" id="paymentForm">
        @csrf
        <input type="hidden" name="student_id" value="{{ $student->id }}">

        <div class="mb-3">
            <label>Amount to Pay</label>
            <input type="number" name="amount" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label>Select Payment Method</label>
            <select name="method" class="form-control" id="paymentMethod" required>
                <option value="manual">Manual (Bank/Office)</option>
                <option value="mtn">MTN Mobile Money</option>
                <option value="airtel">Airtel Money</option>
            </select>
        </div>

        <!-- Mobile Money fields (initially hidden) -->
        <div id="mobileMoneyFields" style="display: none;">
            <div class="mb-3">
                <label>Phone Number</label>
                <input type="tel" name="phone_number" class="form-control" placeholder="e.g., 077XXXXXXX">
            </div>

            <div class="mb-3" id="confirmationStep" style="display: none;">
                <div class="alert alert-info">
                    <p>A confirmation prompt will be sent to your mobile phone.</p>
                    <p>Please enter the PIN you receive below:</p>
                </div>
                <label>Enter PIN</label>
                <input type="password" name="pin" class="form-control" maxlength="6">
            </div>
        </div>

        <button type="button" id="proceedBtn" class="btn btn-primary">Proceed</button>
        <button type="submit" id="submitBtn" class="btn btn-success" style="display: none;">Confirm Payment</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const paymentMethod = document.getElementById('paymentMethod');
    const mobileMoneyFields = document.getElementById('mobileMoneyFields');
    const confirmationStep = document.getElementById('confirmationStep');
    const proceedBtn = document.getElementById('proceedBtn');
    const submitBtn = document.getElementById('submitBtn');
    const paymentForm = document.getElementById('paymentForm');
    
    // Show/hide mobile money fields based on payment method selection
    paymentMethod.addEventListener('change', function() {
        if (this.value === 'mtn' || this.value === 'airtel') {
            mobileMoneyFields.style.display = 'block';
            confirmationStep.style.display = 'none';
            submitBtn.style.display = 'none';
            proceedBtn.style.display = 'block';
        } else {
            mobileMoneyFields.style.display = 'none';
            submitBtn.style.display = 'block';
            proceedBtn.style.display = 'none';
        }
    });
    
    // Handle the proceed button for mobile money payments
    proceedBtn.addEventListener('click', function() {
        const phoneInput = document.querySelector('input[name="phone_number"]');
        
        if (!phoneInput.value) {
            alert('Please enter your phone number');
            return;
        }
        
        // Here you would typically make an AJAX call to send the verification code
        // For demonstration, we're just showing the PIN input field
        
        // Simulate sending verification code
        alert('Verification code sent to ' + phoneInput.value);
        
        // Show confirmation step
        confirmationStep.style.display = 'block';
        proceedBtn.style.display = 'none';
        submitBtn.style.display = 'block';
    });
});
</script>
@endsection