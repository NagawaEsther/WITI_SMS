<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Lecturer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'gender',
        'position',
        'status',
        
        
        'image',
    ];

    // Automatically hash password when setting it
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // Relationship with students (if lecturers supervise students)
    public function students()
    {
        return $this->hasMany(User::class, 'lecturer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
