<?php

namespace App\Http\Controllers;

use App\Models\AcademicCalendarEvent;
use App\Models\CourseUnit;
use App\Models\NoticeBoard;
use App\Models\Enrollment;
use App\Models\UpcomingActivity;
use App\Models\RecentActivity;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get the authenticated user and their associated student record
        $user = Auth::user();
        $student = Student::where('user_id', $user->id)->first();

        if (!$student) {
            abort(403, 'No student record found for this user.');
        }

        // Existing data
        $notices = NoticeBoard::latest()->take(3)->get();
        $courseUnits = CourseUnit::latest()->take(5)->get();
        $totalEnrollments = Enrollment::count();
        $recentActivities = RecentActivity::latest()->take(5)->get();
        $upcomingActivities = UpcomingActivity::latest()->take(2)->get();
        $enrolledCourseUnits = $student->courseUnits ?? collect([]);
        $totalCourseUnits = $enrolledCourseUnits->count();
        $totalCredits = $enrolledCourseUnits->sum('credit_unit');
        $calendarEvents = AcademicCalendarEvent::all();
        $events = AcademicCalendarEvent::all();

        // Fetch unread notifications
        $notifications = $user->unreadNotifications;

        return view('student_dashboard', compact(
            'notices',
            'courseUnits',
            'totalEnrollments',
            'totalCourseUnits',
            'totalCredits',
            'enrolledCourseUnits',
            'upcomingActivities',
            'recentActivities',
            'calendarEvents',
            'events',
            'notifications',
            'student'
        ));
    }

    public function markNotificationAsRead($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        return redirect()->back()->with('success', 'Notification marked as read.');
    }

    public function showAvailableCourses()
    {
        $courseUnits = CourseUnit::paginate(3);
        return view('available_courses', compact('courseUnits'));
    }

    public function myCourses()
    {
        $user = auth()->user();
        $student = Student::where('user_id', $user->id)->first();

        if (!$student) {
            abort(403, 'No student record found for this user.');
        }

        $courseUnits = $student->courseUnits ?? collect([]);
        return view('my_courses', compact('courseUnits'));
    }

    public function unenroll(Request $request)
    {
        $user = auth()->user();
        $student = Student::where('user_id', $user->id)->first();

        if (!$student) {
            abort(403, 'No student record found for this user.');
        }

        if ($student->courseUnits->contains($request->course_unit_id)) {
            $student->courseUnits()->detach($request->course_unit_id);
            return redirect()->back()->with('success', 'You have been unenrolled from the course.');
        }
        return redirect()->back()->with('info', 'You are not enrolled in this course.');
    }

    public function enroll(Request $request)
    {
        $user = auth()->user();
        $student = Student::where('user_id', $user->id)->first();

        if (!$student) {
            abort(403, 'No student record found for this user.');
        }

        if (!$student->courseUnits->contains($request->course_unit_id)) {
            $student->courseUnits()->attach($request->course_unit_id);
            return redirect()->back()->with('success', 'Enrolled successfully!');
        }
        return redirect()->back()->with('info', 'You are already enrolled in this course.');
    }

    public function showCourseDetails($id)
    {
        $courseUnit = CourseUnit::findOrFail($id);
        return view('details', compact('courseUnit'));
    }
}