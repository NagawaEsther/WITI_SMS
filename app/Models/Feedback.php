<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['student_id', 'message'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}

