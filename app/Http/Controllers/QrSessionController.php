<?php

namespace App\Http\Controllers;

use App\Models\QrSession;
use App\Models\Lecture;
use App\Models\Courseunit;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use Carbon\Carbon;

class QrSessionController extends Controller
{
    public function index()
    {
        $qrSessions = QrSession::with(['lecture', 'courseunit'])
            ->latest()
            ->paginate(10);
            
        return view('qr-sessions.index', compact('qrSessions'));
    }

    public function create()
    {
        $lectures = Lecture::all();
        $courseUnits = Courseunit::all();
        // $lecturers=Lecturer::all();
        
        return view('qr-sessions.create', compact('lectures', 'courseUnits'));
    }

    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'lectures_id' => 'required|exists:lectures,id',
    //         'course_units_id' => 'required|exists:courseunits,id',
    //         'duration' => 'required|integer|min:5|max:180', // Duration in minutes
    //     ]);

    //     $sessionCode = Str::random(10);
    //     $startTime = Carbon::now();
    //     $endTime = $startTime->copy()->addMinutes($validated['duration']);

    //     $qrSession = QrSession::create([
    //         'lectures_id' => $validated['lectures_id'],
    //         'course_units_id' => $validated['course_units_id'],
    //         'session_code' => $sessionCode,
    //         'start_time' => $startTime,
    //         'end_time' => $endTime,
    //         'is_active' => true,
    //     ]);

    //     return redirect()->route('qr-sessions.show', $qrSession)
    //         ->with('success', 'QR session created successfully');
    // }


    public function store(Request $request)
{
    $validated = $request->validate([
        'lecture_id' => 'required|exists:lectures,id',
        'course_units_id' => 'required|exists:course_units,id', // Change table name if needed
        'duration' => 'required|integer|min:5|max:180',
    ]);

    $sessionCode = Str::random(10);
    $startTime = Carbon::now();
    $endTime = $startTime->copy()->addMinutes($validated['duration']);

    $qrSession = QrSession::create([
        'lectures_id' => $validated['lecture_id'], // Match your form field name
        'course_units_id' => $validated['course_units_id'],
        'session_code' => $sessionCode,
        'start_time' => $startTime,
        'end_time' => $endTime,
        'is_active' => true,
    ]);

    return redirect()->route('qr-sessions.show', $qrSession)
        ->with('success', 'QR session created successfully');
}

    public function show(QrSession $qrSession)
    {
        // Check if session is expired
        if (Carbon::now() > $qrSession->end_time) {
            $qrSession->update(['is_active' => false]);
        }
        
        $attendanceCount = $qrSession->attendanceRecords()->count();
        $qrCode = QrCode::size(300)->generate(route('attendance.scan', $qrSession->session_code));
        $attendances = $qrSession->attendanceRecords()->with('student')->get();
        
        return view('qr-sessions.show', compact('qrSession', 'qrCode', 'attendanceCount','attendances'));
    }

    public function destroy(QrSession $qrSession)
    {
        $qrSession->delete();
        return redirect()->route('qr-sessions.index')
            ->with('success', 'QR session deleted successfully');
    }

    public function closeSession(QrSession $qrSession)
    {
        $qrSession->update(['is_active' => false]);
        return redirect()->route('qr-sessions.show', $qrSession)
            ->with('success', 'QR session closed successfully');
    }


    // adede
    // added
    public function getAttendances(QrSession $qrSession)
{
    $attendances = $qrSession->attendances()
        ->with('student')
        ->orderBy('created_at', 'desc')
        ->get();
        
    return response()->json([
        'attendances' => $attendances
    ]);
}
}
