<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentApplicationReferralSource extends Model
{
    use HasFactory;

    protected $table = 'student_application_referral_sources'; // Specify the table name

    protected $fillable = [
        'student_application_id',
        'referral_source_id',
    ];

    // Optionally, you can define relationships with other models
    public function studentApplication()
    {
        return $this->belongsTo(StudentApplication::class);
    }

    public function referralSource()
    {
        return $this->belongsTo(ReferralSource::class);
    }
}