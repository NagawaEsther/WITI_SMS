<?php
use App\Models\Semester;
$referrals =  Semester::pluck('name', 'id') ;
?>


<!-- resources/views/student_referrals/_fields.blade.php -->

<div>
    <label for="student_application_id">Student Application ID:</label>
    <input type="text" name="student_application_id" id="student_application_id"
        value="{{ old('student_application_id', isset($referral) ? $referral->student_application_id : '') }}" required>
</div>

<div>
    <label for="referral_source_id">Referral Source ID:</label>
    <input type="text" name="referral_source_id" id="referral_source_id"
        value="{{ old('referral_source_id', isset($referral) ? $referral->referral_source_id : '') }}" required>
</div>