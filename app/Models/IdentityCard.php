<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentityCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'reg_number', 'class', 'course', 'dob',
        'issue_date', 'expiry_date', 'blood_group', 'photo', 'qr_code'
    ];
}
