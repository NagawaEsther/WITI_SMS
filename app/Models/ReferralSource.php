<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralSource extends Model
{
    use HasFactory;

    protected $table = 'referral_sources'; // Define the table name

    protected $fillable = [
        'source_name',
        'status',
    ];

    public $timestamps = true; // Enable Laravel's automatic timestamps
}