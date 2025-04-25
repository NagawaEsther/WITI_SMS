<!-- resources/views/student_referrals/_show_fields.blade.php -->

<div>
    <strong>Student Application ID:</strong> {{ $referral->student_application_id }}
</div>

<div>
    <strong>Referral Source ID:</strong> {{ $referral->referral_source_id }}
</div>

<div>
    <strong>Created At:</strong> {{ $referral->created_at }}
</div>

<div>
    <strong>Updated At:</strong> {{ $referral->updated_at }}
</div>