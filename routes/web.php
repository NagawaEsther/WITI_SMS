<?php

use App\Http\Controllers\AcademicCalendarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeBoardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::resource('programs', App\Http\Controllers\ProgramController::class);
Route::resource('settings', App\Http\Controllers\SettingController::class);


Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('semesters', App\Http\Controllers\SemesterController::class);


Route::resource('cohorts', App\Http\Controllers\CohortsController::class);




Route::resource('course-units', App\Http\Controllers\CourseUnitController::class);


Route::resource('lecturers', App\Http\Controllers\LecturerController::class);

Route::get('lecturers', [App\Http\Controllers\LecturerController::class, 'index'])->name('lecturers.index');

use App\Http\Controllers\StudentController;

Route::resource('students', StudentController::class);
use App\Http\Controllers\StudentApplicationController;

Route::resource('student_applications', StudentApplicationController::class);
// Route::get('/student_applications', [StudentApplicationController::class, 'index'])->name('student_applications.index');


Route::resource('roles', App\Http\Controllers\RolesController::class);
use App\Http\Controllers\EnrollmentController;

Route::resource('enrollments', EnrollmentController::class);
Route::resource('referral_sources', App\Http\Controllers\ReferralSourceController::class);
Route::resource('referrals', App\Http\Controllers\StudentApplicationReferralSourceController::class);


// Route for bulk delete



Route::delete('students/bulk-delete', [StudentController::class, 'bulkDelete'])
    ->name('students.bulk-delete');
Route::post('/student_applications/bulk-delete', [StudentApplicationController::class, 'bulkDelete'])->name('student_applications.bulk-delete');
Route::post('/roles/bulk-delete', [App\Http\Controllers\RolesController::class, 'bulkDelete'])->name('roles.bulk-delete');
Route::post('/programs/bulk-delete', [App\Http\Controllers\ProgramController::class, 'bulkDelete'])->name('programs.bulk-delete');
Route::post('/semesters/bulk-delete', [App\Http\Controllers\SemesterController::class, 'bulkDelete'])->name('semesters.bulk-delete');
Route::post('/cohorts/bulk-delete', [App\Http\Controllers\CohortsController::class, 'bulkDelete'])->name('cohorts.bulk-delete');

Route::delete('/lecturers/bulk-delete', [App\Http\Controllers\LecturerController::class, 'bulkDelete'])->name('lecturers.bulkDelete');



Route::delete('course-units/bulk-delete', [App\Http\Controllers\CourseUnitController::class, 'bulkDelete'])->name('course-units.bulkDelete');

Route::post('/semesters/bulk-delete', [App\Http\Controllers\SemesterController::class, 'bulkDelete'])->name('semesters.bulk-delete');



Route::resource('enrollments', App\Http\Controllers\EnrollmentController::class);
// In routes/web.php
Route::delete('/users/bulk-destroy', [App\Http\Controllers\UserController::class, 'bulkDestroy'])->name('users.bulkDestroy');


Route::post('/apply', [StudentApplicationController::class, 'store']);
Route::post('/approve/{id}', [StudentApplicationController::class, 'approveStudent'])->middleware('auth'); // Ensure only admins approve
Route::resource('student_applications', StudentApplicationController::class);
// Route::put('/students/{students}', [StudentApplicationController::class, 'update'])->name('students.update');
// Route::delete('/students/{student}', [StudentApplicationController::class, 'destroy'])->name('students.destroy');
Route::post('/student-applications', [StudentApplicationController::class, 'store'])->name('student_applications.store');
Route::post('/applications/{id}/approve', [StudentApplicationController::class, 'approveStudent'])->name('applications.approve');
Route::put('/student_applications/{id}', [StudentApplicationController::class, 'update'])->name('student_applications.update');
// Route::delete('/courses/bulk-destroy', [CourseUnitController::class, 'bulkDestroy'])->name('courses.bulkDestroy');
Route::delete('/course-units/bulk-destroy', [App\Http\Controllers\CourseUnitController::class, 'bulkDestroy'])->name('course-units.bulkDestroy');


use App\Http\Controllers\RecentActivityController;

Route::get('/admin/dashboard', [RecentActivityController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/recent-activities', [RecentActivityController::class, 'store'])->name('recent-activities.store');
Route::delete('/admin/recent-activities/{id}', [RecentActivityController::class, 'destroy'])->name('recent-activities.destroy');



// use App\Http\Livewire\ApplyNow;

// Route::get('/apply-now', ApplyNow::class)->name('apply-now');


// Route::get('/search-courses', [ProgramController::class, 'searchCourses'])->name('search.courses');


Route::post('/submit-application', [StudentApplicationController::class, 'submitApplication']);
use App\Http\Controllers\EmailController;

Route::get('/send-email', [EmailController::class, 'sendEmail']);
Route::get('/approve-application/{id}', [EmailController::class, 'approveApplication']);
Route::get('/reject-application/{id}', [EmailController::class, 'rejectApplication']);





Route::resource('assignments', App\Http\Controllers\AssignmentsController::class);

// Route::get('/dashboard', [StudentController::class, 'dashboard'])->middleware('auth')->name('students.dashboard');

// routes/web.php
use App\Http\Controllers\ChangePasswordController;

Route::post('/password/update', [ChangePasswordController::class, 'update'])->name('password.update');

// Route::get('/attendance/register', [App\Http\Controllers\AttendanceController::class, 'register'])->name('attendance.register');


Route::get('/apply', function () {
    return view('apply');
})->name('application.create');





















Route::resource('recent_activities', RecentActivityController::class);
// routes/web.php

use App\Http\Controllers\UpcomingActivityController;

Route::resource('/upcoming_activities', UpcomingActivityController::class);


// Route::get('/upcoming_activities', [UpcomingActivityController::class, 'index'])->name('upcoming_activities.index');


// use Illuminate\Support\Facades\DB;

// Route::get('/attendance-data', function () {
//     // Query attendance data
//     $data = DB::table('attendances')
//         ->select(DB::raw('DAYNAME(date) as day'), DB::raw("SUM(CASE WHEN status = 'Present' THEN 1 ELSE 0 END) as total_present"), DB::raw("SUM(CASE WHEN status = 'Absent' THEN 1 ELSE 0 END) as total_absent"))
//         ->groupBy('day')
//         ->orderByRaw("FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')")
//         ->get();

//     // Return the data as JSON
//     return response()->json($data);
// });
Route::get('/upcoming-activities', [UpcomingActivityController::class, 'index'])->name('upcoming_activities.index');
Route::resource('notice-board', NoticeBoardController::class);

use App\Http\Controllers\WhatsAppController;

// Route::post('/send-whatsapp', [WhatsAppController::class, 'sendMessage'])->name('send-whatsapp');



// Display the form
Route::get('/whatsapp', [WhatsAppController::class, 'index'])->name('whatsapp.index');

// Send the message
Route::post('/send-whatsapp', [WhatsAppController::class, 'sendMessage'])->name('send-whatsapp');
use App\Http\Controllers\AtendanceController;




// Route::post('/register-attendance', [AtendanceController::class, 'store'])->name('attendance.store');
// // In routes/web.php
// Route::resource('atendance', AtendanceController::class);
// Route::get('/atendance/mark', [AtendanceController::class, 'mark'])->name('atendance.mark');
// Route::get('/atendance/{id}', [AtendanceController::class, 'show']);
// use App\Http\Controllers\AttendanceController;

// Route::get('/attendance-qrcode', [AttendanceController::class, 'qrcode']);
// Route::get('/register-attendance', function () {
//     return view('attendance.register');
// });
// Route::post('/register-attendance', [AttendanceController::class, 'registerAttendance']);

// use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LectureController;
use App\Models\AcademicCalendarEvent;

// Route::get('/attendance-index', [AttendanceController::class, 'index'])->name('attendance.index');  // Route for QR code generation

// Route::get('/register-attendance', function () {
//     return view('attendance.register');  // This is where the student will register their attendance
// });

// Route::post('/register-attendance', [AttendanceController::class, 'registerAttendance']);  // Post route for registering attendance





// Route::get('/register-attendance', [AttendanceController::class, 'viewAttendance']);  // Show the registration form
// Route::post('/register-attendance', [AttendanceController::class, 'registerAttendance']);  // Handle form submission










Route::get('/', function () {
    return view('welcome');
})->name('about');



Route::get('/about', function () {
    return view('about');
})->name('about');




Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/courses', function () {
    return view('courses');
})->name('courses');


Route::get('/apply', function () {
    return view('apply');
})->name('apply');

Route::post('/student_applications', [StudentApplicationController::class, 'store'])->name('student_applications.store');


// Route::get('/courses', [App\Http\Controllers\CourseUnitController::class, 'index'])->name('courses');


Route::get('/student-dashboard', [App\Http\Controllers\StudentDashboardController::class, 'index'])->name('student_dashboard');

// Grades&Transcripts
// Route::get('/student/grades-and-transcripts', [App\Http\Controllers\StudentDashboardController::class, 'showCourseDetails'])->name('student.grades.transcripts');


// Route::get('/grades-transcripts', [App\Http\Controllers\StudentDashboardController::class, 'gradesTranscripts'])
//     ->name('student.grades-transcripts')
//     ->middleware('auth');

Route::get('/grades-transcripts', [App\Http\Controllers\GradesTranscriptsController::class, 'index'])
    ->name('student.grades-transcripts')
    ->middleware('auth');

    Route::get('/grades-transcripts/download', [App\Http\Controllers\GradesTranscriptsController::class, 'downloadTranscript'])
    ->name('student.download-transcript')
    ->middleware('auth');

Route::get('/student-dashboard', [App\Http\Controllers\StudentDashboardController::class, 'index'])
    ->name('student.dashboard')
    ->middleware('auth');
   
// Route::resource('courses', App\Http\Controllers\CourseUnitController::class);
Route::get('/student-dashboard/my-courses', [App\Http\Controllers\StudentDashboardController::class, 'myCourses'])->name('/my_courses');

Route::get('/my-courses', [App\Http\Controllers\StudentDashboardController::class, 'myCourses'])
    ->name('my.courses')
    ->middleware('auth');


// Route::get('/student/coursework', [CourseworkMarksController::class, 'index'])->name('student.coursework');

// Route for coursework marks
Route::get('/student/coursework', [App\Http\Controllers\CourseworkMarksController::class, 'index'])->name('student.coursework');



// Show courses to enroll
Route::get('/student-dashboard/available-courses', [App\Http\Controllers\StudentDashboardController::class, 'showAvailableCourses'])->name('/available_courses');

// Enroll action
Route::post('/student-dashboard/enroll', [App\Http\Controllers\StudentDashboardController::class, 'enroll'])->name('student.enroll');

Route::post('/enroll', [App\Http\Controllers\StudentDashboardController::class, 'enroll'])
    ->name('enroll')
    ->middleware('auth');

// View enrolled courses (My Courses)
Route::get('/student-dashboard/my-courses', [App\Http\Controllers\StudentDashboardController::class, 'myCourses'])->name('/my_courses');


Route::post('/student-dashboard/unenroll', [App\Http\Controllers\StudentDashboardController::class, 'unenroll'])->name('unenroll');


Route::resource('lectures', LectureController::class);
// Route::get('/student-dashboard/academic_calendar', AcademicCalendarController::class);


Route::get('/academic_calendar', [AcademicCalendarController::class, 'academicCalendar'])->name('academic_calendar');






Route::get('/course_units', [LectureController::class, 'studentCourseUnits'])->name('/course_units');
Route::get('/course-units/{id}/lectures', [LectureController::class, 'showLecturesByUnit'])->name('/lectures.by_unit');




// Route::get('/lectures/{lecture_id}/qr-code', [LectureController::class, 'generateQRCode'])->name('lectures.qr_code');

//     // Register attendance for a lecture
//     Route::post('/lectures/{lecture_id}/register-attendance', [App\Http\Controllers\AttendController::class, 'registerAttendance'])->name('attendance.register');


// // Generate QR Code for Attendance
// Route::get('/lectures/{lecture_id}/qr-code', [AttendController::class, 'generateQrCode'])->name('lectures.qr_code');

// // GET: Page shown after QR scan (auto-submit or button)
// Route::get('/lectures/{lecture_id}/register-attendance', [AttendController::class, 'showRegisterAttendanceForm'])->name('lectures.register');

// // POST: Actual attendance submission
// Route::post('/lectures/{lecture_id}/submit-attendance', [AttendController::class, 'registerAttendance'])->name('lectures.submit');

use App\Http\Controllers\CourseUnitController;

// Route for displaying the course units

Route::get('/course-units', [CourseUnitController::class, 'index'])->name('course-units.index');
// In routes/web.php
// Route::get('/attendance/index/{lecture_id}', [AttendanceController::class, 'index']);


// In routes/web.php



// Define the route for the index method with the lecture_id parameter
// Route::get('/attendance-index/{lecture_id}', [AttendanceController::class, 'index']);

// Define the route for registering attendance with lecture_id


// Route::get('/attendance/register', [AttendanceController::class, 'showRegisterForm'])->name('attendance.register');
// Route::post('/attendance/register', [AttendanceController::class, 'register'])->middleware('auth');


Route::get('/feedback', [App\Http\Controllers\FeedbackController::class, 'index'])->name('/feedback');
Route::post('/feedback', [App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');

Route::get('/admin/feedbacks', [App\Http\Controllers\AdminController::class, 'viewFeedbacks'])->name('admin.feedbacks');
Route::delete('/admin/feedbacks/{id}', [App\Http\Controllers\FeedbackController::class, 'destroy'])->name('admin.feedbacks.destroy');
Route::post('/admin/feedbacks/{id}/reply', [App\Http\Controllers\FeedbackController::class, 'replyToFeedback'])->name('admin.feedbacks.reply');




Route::get('/identity-cards', [App\Http\Controllers\IdentityCardController::class, 'index'])->name('identity_cards.index');
Route::get('/identity-cards/create', [App\Http\Controllers\IdentityCardController::class, 'create'])->name('identity_cards.create');
Route::post('/identity-cards', [App\Http\Controllers\IdentityCardController::class, 'store'])->name('identity_cards.store');

Route::resource('identity_cards', App\Http\Controllers\IdentityCardController::class);
Route::get('/identity_cards/{id}/download', [App\Http\Controllers\IdentityCardController::class, 'download'])->name('identity_cards.download');
Route::get('/courses/search', [App\Http\Controllers\CourseUnitController::class, 'search'])->name('courses.search');




Route::post('/admin/feedbacks/bulk-delete', [App\Http\Controllers\FeedbackController::class, 'bulkDelete'])->name('admin.feedbacks.bulkDelete');



Route::get('/admin/student_enrollments', [App\Http\Controllers\AdminController::class, 'showStudentEnrollments'])
        ->name('admin.student_enrollments');

Route::post('/admin/enrollments/bulk-delete', [App\Http\Controllers\AdminController::class, 'bulkDeleteEnrollments'])
    ->name('admin.enrollments.bulk_delete');

Route::post('/lectures/bulk-delete', [LectureController::class, 'bulkDelete'])->name('lectures.bulkDelete');


   
//     Route::get('/attendance/{lecture}', [AttendanceController::class, 'show'])->name('attendance.show');

// Route::get('/attendance/{lecture}/register', [AttendanceController::class, 'register'])->name('attendance.register');

// routes/web.php
// Route::get('/attendance/{lecture}', [AttendanceController::class, 'show'])->name('attendance.show');
// Route::get('/attendance/{lecture}/register', [AttendanceController::class, 'register'])->name('attendance.register');

// Route::get('/attendance/qrcode/{lecture}', [AttendanceController::class, 'generateQRCode']);

// // Mark Attendance
// Route::get('/attendance/mark/{lecture}', [AttendanceController::class, 'markAttendance']);



Route::resource('student_applications', StudentApplicationController::class);

Route::resource('calendar', AcademicCalendarController::class);


Route::post('/calendar/bulk-delete', [AcademicCalendarController::class, 'bulkDelete'])->name('calendar.bulkDelete');
// routes/web.php
// Route::delete('/calendar/bulk-delete', [AcademicCalendarController::class, 'bulkDelete'])->name('calendar.bulkDelete');

Route::get('/students/{student}/pay', [App\Http\Controllers\PaymentController::class, 'showPaymentForm'])->name('payments.create');
Route::post('/students/pay', [App\Http\Controllers\PaymentController::class, 'store'])->name('student.payments.store');


use App\Http\Controllers\RequestController;

Route::post('/request-dead-semester', [RequestController::class, 'submitDeadSemester'])->name('request.dead.semester');
Route::post('/request-dead-year', [RequestController::class, 'submitDeadYear'])->name('request.dead.year');


Route::get('/admin/requests', [App\Http\Controllers\AdminController::class, 'viewRequests'])->name('admin.requests');

Route::post('/requests/{id}/approve', [RequestController::class, 'approve'])->name('requests.approve');
Route::post('/requests/{id}/reject', [RequestController::class, 'reject'])->name('requests.reject');

Route::get('/course-unit/{id}', [App\Http\Controllers\StudentDashboardController::class, 'showCourseDetails'])->name('details');








 use App\Http\Controllers\AssignmentController;

Route::get('/assignments/create', [AssignmentController::class, 'create'])->name('assignments.create');
Route::post('/assignments', [AssignmentController::class, 'store'])->name('assignments.store');
Route::get('/course-units/{courseUnitId}/assignments', [AssignmentController::class, 'index'])->name('assignments.index');
Route::delete('/assignments/{id}', [AssignmentController::class, 'destroy'])->name('assignments.destroy');





use App\Http\Controllers\ModuleController;

Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');
Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');



Route::get('/modules/{id}', [ModuleController::class, 'show'])->name('/details');
Route::get('/course-unit/{id}', [ModuleController::class, 'show'])->name('course-unit.show');




use App\Http\Controllers\QrSessionController;
use App\Http\Controllers\AttendanceRecordController;

// QR Session Routes
Route::resource('qr-sessions', QrSessionController::class);
Route::post('qr-sessions/{qrSession}/close', [QrSessionController::class, 'closeSession'])->name('qr-sessions.close');

// Attendance Routes
Route::get('attendance/scan/{sessionCode}', [AttendanceRecordController::class, 'scanForm'])->name('attendance.scan');
Route::post('attendance/mark/{sessionCode}', [AttendanceRecordController::class, 'markAttendance'])->name('attendance.mark');
Route::get('attendance/report', [AttendanceRecordController::class, 'report'])->name('attendance.report');
Route::post('attendance/report', [AttendanceRecordController::class, 'generateReport'])->name('attendance.generate-report');




Route::get('/qr_sessions', [App\Http\Controllers\StudentQRController::class, 'index'])
    ->name('qr_sessions')
    ->middleware('auth');

use App\Http\Controllers\YearController;
Route::resource('years', YearController::class);

use App\Http\Controllers\StudentAssessmentController;

Route::resource('studentassessments', StudentAssessmentController::class);
Route::get('/course-units-by-program/{programId}', [StudentAssessmentController::class, 'getCourseUnitsByProgram'])->name('course-units.by-program');
