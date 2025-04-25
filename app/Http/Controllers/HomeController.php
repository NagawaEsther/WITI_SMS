<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\AcademicCalendarEvent;
use Illuminate\Http\Request;
use App\Models\RecentActivity;
use App\Models\UpcomingActivity;
use App\Models\NoticeBoard;
use App\Models\Student;
use App\Models\CourseUnit;
use App\Models\Enrollment;
use App\Models\Lecturer;
use App\Models\User;
use App\Models\Lecture;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }



    

public function index()
{
    $academicCalendarEvents = AcademicCalendarEvent::all();

    
    
    $totalUsers = User::count();
    $totalStudents = Student::count();
    $totalLecturers = Lecturer::count();
    $totalCourseUnits = CourseUnit::count();
    $totalEnrollments = Enrollment::count();
    $totalCourseUnits = CourseUnit::count();
    $totalLectures = Lecture::count();
    // $totalLessons = Lesson::count();


    
    $totalEnrollments = DB::table('course_unit_user')->count(); 



    $recentActivities = RecentActivity::latest()->take(5)->get();
    $notices = NoticeBoard::latest()->take(5)->get();
    $upcomingActivities = UpcomingActivity::latest()->take(2)->get();
    return view('home', compact('recentActivities','upcomingActivities','notices','totalUsers', 'totalStudents', 'totalLecturers', 
        'totalCourseUnits', 'totalEnrollments','totalCourseUnits','totalLectures','academicCalendarEvents'
        ));
}





}
