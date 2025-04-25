<?php

// app/Models/AcademicCalendarEvent.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicCalendarEvent extends Model
{
    protected $fillable = ['title', 'description', 'start_date', 'end_date'];
}

