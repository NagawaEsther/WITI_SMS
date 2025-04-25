<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function register(Request $request, $lectureId)
    {
        // Get the client's IP address
        $ipAddress = $request->ip();
        
        // Check if IP is valid for WITI
        if (!Attendance::isValidIp($ipAddress)) {
            return redirect()->back()->with('error', 'Attendance can only be registered from WITI premises');
        }

        // Get the authenticated student
        $student = Auth::user(); // Assuming students use the default User model
        
        // Check if attendance already exists
        $existingAttendance = Attendance::where('student_id', $student->id)
            ->where('lecture_id', $lectureId)
            ->first();

        if ($existingAttendance) {
            return redirect()->back()->with('error', 'Attendance already registered for this lecture');
        }

        // Register attendance
        Attendance::create([
            'student_id' => $student->id,
            'lecture_id' => $lectureId,
            'is_present' => true,
            'ip_address' => $ipAddress,
            'registered_at' => now(),
            'status' => 'present'
        ]);

        return redirect()->back()->with('success', 'Attendance registered successfully');
    }

    
}