<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QRSession;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentQRController extends Controller
{
    public function index()
    {
        $student = auth()->user()->student;
        
        // Get the student's enrolled course units
        $enrolledCourseUnitIds = auth()->user()->courseUnits->pluck('id')->toArray();
        
        // Get active QR sessions for the student's enrolled courses
        $activeSessions = QRSession::whereIn('course_units_id', $enrolledCourseUnitIds)
            ->where('is_active', true)
            ->where('end_time', '>', Carbon::now())
            ->with(['courseunit', 'lecture'])
            ->get();
            
        return view('/qr_sessions', compact('activeSessions'));
    }
}