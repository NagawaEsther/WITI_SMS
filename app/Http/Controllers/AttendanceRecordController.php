<?php

namespace App\Http\Controllers;

use App\Models\AttendanceRecord;
use App\Models\QrSession;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CourseUnit;

class AttendanceRecordController extends Controller
{
    public function scanForm($sessionCode)
    {
        $qrSession = QrSession::where('session_code', $sessionCode)
            ->firstOrFail();
            
        // Check if session is still active
        if (!$qrSession->is_active || Carbon::now() > $qrSession->end_time) {
            return view('attendance.closed-session');
        }
        
        return view('attendance.scan-form', compact('qrSession', 'sessionCode'));
    }
    
    public function markAttendance(Request $request, $sessionCode)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
        ]);
        
        $qrSession = QrSession::where('session_code', $sessionCode)
            ->firstOrFail();
            
        // Check if session is still active
        if (!$qrSession->is_active || Carbon::now() > $qrSession->end_time) {
            return redirect()->back()->with('error', 'This QR session has expired');
        }
        
        // Check if student already marked attendance
        $exists = AttendanceRecord::where('student_id', $validated['student_id'])
            ->where('qr_session_id', $qrSession->id)
            ->exists();
            
        if ($exists) {
            return redirect()->back()->with('error', 'You have already marked your attendance for this session');
        }
        
        // Mark attendance
        AttendanceRecord::create([
            'student_id' => $validated['student_id'],
            'qr_session_id' => $qrSession->id,
            'course_units_id' => $qrSession->course_units_id,
            'ip_address' => $request->ip(),
        ]);
        
        $student = Student::find($validated['student_id']);
        
        return redirect()->back()->with('success', 'Attendance marked successfully for ' . $student->name);
    }
    
    public function report()
    {
        $courseUnits = CourseUnit::all();
        return view('attendance.report', compact('courseUnits'));
    }
    
    public function generateReport(Request $request)
    {
        $validated = $request->validate([
            'course_units_id' => 'required|exists:course_units,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        
        $courseUnit = CourseUnit::find($validated['course_units_id']);
        $startDate = Carbon::parse($validated['start_date']);
        $endDate = Carbon::parse($validated['end_date'])->endOfDay();
        
        // Get all sessions for this course unit in date range
        $qrSessions = QrSession::where('course_units_id', $courseUnit->id)
            ->whereBetween('start_time', [$startDate, $endDate])
            ->with('attendanceRecords.student')
            ->get();
            
        // Get all students enrolled in this course
        $students = Student::whereHas('courseUnit', function($query) use ($courseUnit) {
            $query->where('course_units', $courseUnit->id);
        })->get();
        
        // Calculate attendance for each student
        $attendanceData = [];
        foreach ($students as $student) {
            $attended = 0;
            
            foreach ($qrSessions as $session) {
                $hasAttended = $session->attendanceRecords->contains('student_id', $student->id);
                if ($hasAttended) {
                    $attended++;
                }
            }
            
            $totalSessions = $qrSessions->count();
            $percentage = $totalSessions > 0 ? ($attended / $totalSessions) * 100 : 0;
            
            $attendanceData[] = [
                'student' => $student,
                'attended' => $attended,
                'total' => $totalSessions,
                'percentage' => round($percentage, 2),
            ];
            
        }
        
        return view('attendance.report-result', compact(
            'courseUnit', 
            'startDate', 
            'endDate', 
            'attendanceData', 
            'qrSessions'
        ));
    }


}
