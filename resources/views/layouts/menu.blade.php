{{-- @php
$role_id = auth()->user()->role_id; // Get the role of the currently authenticated user
@endphp

<!-- Only show the following menu items if the user is an admin -->
@if($role_id == 1)
<!-- Dashboard -->
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class="fas fa-building"></i><span>Dashboard</span>
    </a>
</li>

<!-- Settings -->
<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{{ route('settings.index') }}">
        <i class="fa fa-cog"></i><span>@lang('models/settings.plural')</span>
    </a>
</li>

<!-- User management -->
<li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="#" id="userManagementDropdown" role="button" data-toggle="collapse"
        data-target="#userDropdown" aria-expanded="false">
        <i class="fa fa-users"></i> <span>User Management</span>
    </a>
    <div class="collapse {{ Request::is('roles*') || Request::is('students*') || Request::is('lecturers*') ? 'show' : '' }}"
        id="userDropdown">
        <ul class="nav flex-column ml-3">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('roles*') ? 'text-danger' : '' }}" href="{{ route('roles.index') }}">
                    <i class="fa fa-building"></i>
                    <span class="{{ Request::is('roles*') ? 'text-danger' : '' }}">Roles</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('students*') ? 'text-danger' : '' }}"
                    href="{{ route('students.index') }}">
                    <i class="fa fa-user-graduate"></i>
                    <span class="{{ Request::is('students*') ? 'text-danger' : '' }}">Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('lecturers*') ? 'text-danger' : '' }}"
                    href="{{ route('lecturers.index') }}">
                    <i class="fa fa-chalkboard-teacher"></i>
                    <span class="{{ Request::is('lecturers*') ? 'text-danger' : '' }}">Lecturers</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<!-- Programs -->
<li class="side-menus {{ Request::is('programs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('programs.index') }}">
        <i class="fa fa-tasks"></i><span>Programs</span>
    </a>
</li>

<!-- Semesters -->
<li class="side-menus {{ Request::is('semesters*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('semesters.index') }}">
        <i class="fa fa-calendar"></i><span>Semesters</span>
    </a>
</li>

<!-- Cohorts -->
<li class="side-menus {{ Request::is('cohorts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('cohorts.index') }}">
        <i class="fa fa-graduation-cap"></i><span>Cohorts</span>
    </a>
</li>

<!-- Course Units -->
<li class="nav-item {{ Request::is('course-units*') ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="#" id="courseUnitsDropdown" role="button" data-toggle="collapse"
        data-target="#courseDropdown" aria-expanded="false">
        <i class="fa fa-users"></i> <span>Course Units</span>
    </a>
    <div class="collapse" id="courseDropdown">
        <ul class="nav flex-column ml-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('course-units.index') }}">All Course units</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('course-units.create') }}">Add Course unit</a>
            </li>
        </ul>
    </div>
</li>

<!-- Enrollments -->
<li class="side-menus {{ Request::is('enrollments*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.student_enrollments') }}">
        <i class="fa fa-building"></i><span>Enrollments</span>
    </a>
</li>

<!-- Student Applications -->
<li class="nav-item {{ Request::is('student-applications*') ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="#" id="studentApplicationsDropdown" role="button" data-toggle="collapse"
        data-target="#studentApplicationsDropdownContent" aria-expanded="false">
        <i class="fa fa-file-alt"></i> <span>Student Applications</span>
    </a>
    <div class="collapse {{ Request::is('student_applications*') || Request::is('referral_sources*') || Request::is('referrals*') ? 'show' : '' }}"
        id="studentApplicationsDropdownContent">
        <ul class="nav flex-column ml-3">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('student_applications*') ? 'text-danger' : '' }}"
                    href="{{ route('student_applications.index') }}">
                    <i class="fa fa-clipboard-list"></i>
                    <span class="{{ Request::is('student_applications*') ? 'text-danger' : '' }}">All
                        Applications</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('referral_sources*') ? 'text-danger' : '' }}"
                    href="{{ route('referral_sources.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="{{ Request::is('referral_sources*') ? 'text-danger' : '' }}">Referral sources</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('referrals*') ? 'text-danger' : '' }}"
                    href="{{ route('referrals.index') }}">
                    <i class="fa fa-chalkboard-teacher"></i>
                    <span class="{{ Request::is('referrals*') ? 'text-danger' : '' }}">App referral sources</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item {{ Request::is('attendances*') ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="#" id="dashboardcardsDropdown" role="button" data-toggle="collapse"
        data-target="#dashboardcardsDropdownContent" aria-expanded="false">
        <i class="fa fa-file-alt"></i> <span>Dashboard cards</span>
    </a>
    <div class="collapse {{ Request::is('attendances*') || Request::is('recent_activities*') || Request::is('upcoming_activities*') || Request::is('notice-board*') ? 'show' : '' }}"
        id="dashboardcardsDropdownContent">
        <ul class="nav flex-column ml-3">


            <li class="nav-item">
                <a class="nav-link {{ Request::is('recent_activities*') ? 'text-danger' : '' }}"
                    href="{{ route('recent_activities.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="{{ Request::is('recent_activities*') ? 'text-danger' : '' }}">Recent Activities</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ Request::is('upcoming_activities*') ? 'text-danger' : '' }}"
                    href="{{ route('upcoming_activities.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="{{ Request::is('upcoming_activities*') ? 'text-danger' : '' }}">Upcoming
                        activities</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ Request::is('notice-board*') ? 'text-danger' : '' }}"
                    href="{{ route('notice-board.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="{{ Request::is('notice-board*') ? 'text-danger' : '' }}">Notice Board</span>
                </a>
            </li>


        </ul>
    </div>
</li>








<li class="nav-item">
    <a class="nav-link {{ Request::is('notice-board*') ? 'text-danger' : '' }}" href="{{ route('lectures.index') }}">
        <i class="fa fa-graduation-cap"></i>
        <span class="{{ Request::is('notice-board*') ? 'text-danger' : '' }}">Lectures</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('notice-board*') ? 'text-danger' : '' }}" href="{{ route('admin.feedbacks') }}">
        <i class="fa fa-graduation-cap"></i>
        <span class="{{ Request::is('notice-board*') ? 'text-danger' : '' }}">Feedback and Suggestions</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('notice-board*') ? 'text-danger' : '' }}"
        href="{{ route('identity_cards.index') }}">
        <i class="fa fa-graduation-cap"></i>
        <span class="{{ Request::is('notice-board*') ? 'text-danger' : '' }}">Cards</span>
    </a>
</li>

<li class="side-menus {{ Request::is('calender*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('calendar.index') }}">
        <i class="fa fa-building"></i><span>Academic calender</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('requests*') ? 'text-danger' : '' }}" href="{{ route('admin.requests') }}">
        <i class="fa fa-users"></i>
        <span class="{{ Request::is('requests*') ? 'text-danger' : '' }}">Requests</span>
    </a>
</li>




<li class="nav-item">
    <a class="nav-link {{ Request::is('assignments/create') ? 'text-danger' : '' }}"
        href="{{ route('assignments.create') }}">
        <i class="fa fa-plus"></i>
        <span class="{{ Request::is('assignments/create') ? 'text-danger' : '' }}">Create Assignment</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link {{ Request::is('modules*') ? 'text-danger' : '' }}" href="{{ route('modules.index') }}">
        <i class="fa fa-users"></i>
        <span class="{{ Request::is('modules*') ? 'text-danger' : '' }}">Modules</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link {{ Request::is('qr-sessions*') || Request::is('attendance*') ? 'text-danger' : '' }}"
        href="{{ route('qr-sessions.index') }}">
        <i class="fa fa-users"></i>
        <span
            class="{{ Request::is('qr-sessions*') || Request::is('attendance*') ? 'text-danger' : '' }}">Attendance</span>
    </a>
</li>











</ul>
</div>
</li>

@endif









@php
use App\Models\Student;


$user = auth()->user();
$student = $user->student;
@endphp
<style>
    .active-link {
        color: maroon !important;
        font-weight: bold;
    }
</style>
<!-- Student Menu Items -->
@if($role_id != 1)
<!-- Student menu items -->

<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/student-dashboard">
        <i class="fas fa-building"></i><span>Dashboard</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link {{ Request::is('available-courses*') ? 'text-danger' : '' }}"
        href="{{ route('/available_courses') }}">
        <i class="fa fa-graduation-cap"></i>
        <span class="{{ Request::is('available-courses*') ? 'text-danger' : '' }}">Course-units</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link {{ Request::is('my-course*') ? 'text-danger' : '' }}" href="{{ route('/my_courses') }}">
        <i class="fa fa-graduation-cap"></i>
        <span class="{{ Request::is('my-course*') ? 'text-danger' : '' }}">My Course-units</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('lectures*') ? 'text-danger' : '' }}" href="{{ route('/course_units') }}">
        <i class="fas fa-list-ul"></i>
        <span class="{{ Request::is('lectures*') ? 'text-danger' : '' }}">Lectures</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ Request::is('time-table*') ? 'text-danger' : '' }}" href="{{ route('notice-board.index') }}">
        <i class="fas fa-clock"></i>
        <span class="{{ Request::is('time-table*') ? 'text-danger' : '' }}">Timetable</span>
    </a>
</li>






<li class="nav-item">
    <a class="nav-link {{ Request::is('my_marks*') ? 'active-link' : '' }}" href="{{ route('/feedback') }}">
        <i class="fa fa-comment"></i>
        <span>My coursework marks</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link {{ Request::is('academic_calendar*') ? 'text-danger' : '' }}"
        href="{{ route('academic_calendar') }}">
        <i class="fa fa-calendar"></i>
        <span class="{{ Request::is('academic_calendar*') ? 'text-danger' : '' }}">Academic Calendar</span>
    </a>
</li>




<li class="nav-item">
    <a class="nav-link {{ Request::is('grades*') ? 'text-danger' : '' }}" href="{{ route('notice-board.index') }}">
        <i class="fa fa-users"></i>
        <span class="{{ Request::is('grades*') ? 'text-danger' : '' }}">Grades & Transcripts</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('resources*') ? 'active-link' : '' }}" href="{{ route('students.index') }}">
        <i class="fa fa-question-circle"></i>
        <span class="{{ Request::is('resources*') ? 'active-link' : '' }}">Resources & Support</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('feedback*') ? 'active-link' : '' }}" href="{{ route('/feedback') }}">
        <i class="fa fa-comment"></i>
        <span>Feedback & Suggestions</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link {{ Request::is('payments*') ? 'active-link' : '' }}"
        href="{{ route('payments.create', ['student' => $student->id]) }}">
        <i class="fa fa-comment"></i>
        <span>Payments</span>
    </a>
</li>









@endif --}}



@php
// Safely get the role_id - check if the user is authenticated first
$role_id = auth()->check() ? auth()->user()->role_id : null;
// Get the authenticated user object or null if not authenticated
$user = auth()->user();
// Get student data only if user is authenticated and has a student relation
$student = $user && isset($user->student) ? $user->student : null;
@endphp

<!-- Only show the following menu items if the user is an admin -->
@if(auth()->check() && $role_id == 1)
<!-- Dashboard -->
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class="fas fa-building"></i><span>Dashboard</span>
    </a>
</li>

<!-- Settings -->
<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{{ route('settings.index') }}">
        <i class="fa fa-cog"></i><span>@lang('models/settings.plural')</span>
    </a>
</li>

<!-- User management -->
<li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="#" id="userManagementDropdown" role="button" data-toggle="collapse"
        data-target="#userDropdown" aria-expanded="false">
        <i class="fa fa-users"></i> <span>User Management</span>
    </a>
    <div class="collapse {{ Request::is('roles*') || Request::is('students*') || Request::is('lecturers*') ? 'show' : '' }}"
        id="userDropdown">
        <ul class="nav flex-column ml-3">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('roles*') ? 'text-danger' : '' }}" href="{{ route('roles.index') }}">
                    <i class="fa fa-building"></i>
                    <span class="{{ Request::is('roles*') ? 'text-danger' : '' }}">Roles</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('students*') ? 'text-danger' : '' }}"
                    href="{{ route('students.index') }}">
                    <i class="fa fa-user-graduate"></i>
                    <span class="{{ Request::is('students*') ? 'text-danger' : '' }}">Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('lecturers*') ? 'text-danger' : '' }}"
                    href="{{ route('lecturers.index') }}">
                    <i class="fa fa-chalkboard-teacher"></i>
                    <span class="{{ Request::is('lecturers*') ? 'text-danger' : '' }}">Lecturers</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<!-- Programs -->
<li class="side-menus {{ Request::is('programs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('programs.index') }}">
        <i class="fa fa-tasks"></i><span>Programs</span>
    </a>
</li>

<!-- Semesters -->
<li class="side-menus {{ Request::is('semesters*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('semesters.index') }}">
        <i class="fa fa-calendar"></i><span>Semesters</span>
    </a>
</li>

<!-- Cohorts -->
<li class="side-menus {{ Request::is('cohorts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('cohorts.index') }}">
        <i class="fa fa-graduation-cap"></i><span>Cohorts</span>
    </a>
</li>

<!-- Course Units -->
<li class="nav-item {{ Request::is('course-units*') ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="#" id="courseUnitsDropdown" role="button" data-toggle="collapse"
        data-target="#courseDropdown" aria-expanded="false">
        <i class="fa fa-users"></i> <span>Course Units</span>
    </a>
    <div class="collapse" id="courseDropdown">
        <ul class="nav flex-column ml-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('course-units.index') }}">All Course units</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('course-units.create') }}">Add Course unit</a>
            </li>
        </ul>
    </div>
</li>

<!-- Enrollments -->
<li class="side-menus {{ Request::is('enrollments*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.student_enrollments') }}">
        <i class="fa fa-building"></i><span>Enrollments</span>
    </a>
</li>

<li class="nav-item {{ Request::is('years*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('years.index') }}">
        <i class="fa fa-calendar-alt "></i><span>Years</span>
    </a>
</li>

<li class="nav-item {{ Request::is('studentassessments*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('studentassessments.index') }}">
        <i class="fa fa-list-alt"></i><span>StudentAssessment</span>
    </a>
</li>

<!-- Student Applications -->
<li class="nav-item {{ Request::is('student-applications*') ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="#" id="studentApplicationsDropdown" role="button" data-toggle="collapse"
        data-target="#studentApplicationsDropdownContent" aria-expanded="false">
        <i class="fa fa-file-alt"></i> <span>Student Applications</span>
    </a>
    <div class="collapse {{ Request::is('student_applications*') || Request::is('referral_sources*') || Request::is('referrals*') ? 'show' : '' }}"
        id="studentApplicationsDropdownContent">
        <ul class="nav flex-column ml-3">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('student_applications*') ? 'text-danger' : '' }}"
                    href="{{ route('student_applications.index') }}">
                    <i class="fa fa-clipboard-list"></i>
                    <span class="{{ Request::is('student_applications*') ? 'text-danger' : '' }}">All
                        Applications</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('referral_sources*') ? 'text-danger' : '' }}"
                    href="{{ route('referral_sources.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="{{ Request::is('referral_sources*') ? 'text-danger' : '' }}">Referral sources</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('referrals*') ? 'text-danger' : '' }}"
                    href="{{ route('referrals.index') }}">
                    <i class="fa fa-chalkboard-teacher"></i>
                    <span class="{{ Request::is('referrals*') ? 'text-danger' : '' }}">App referral sources</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item {{ Request::is('attendances*') ? 'active' : '' }}">
    <a class="nav-link dropdown-toggle" href="#" id="dashboardcardsDropdown" role="button" data-toggle="collapse"
        data-target="#dashboardcardsDropdownContent" aria-expanded="false">
        <i class="fa fa-file-alt"></i> <span>Dashboard cards</span>
    </a>
    <div class="collapse {{ Request::is('attendances*') || Request::is('recent_activities*') || Request::is('upcoming_activities*') || Request::is('notice-board*') ? 'show' : '' }}"
        id="dashboardcardsDropdownContent">
        <ul class="nav flex-column ml-3">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('recent_activities*') ? 'text-danger' : '' }}"
                    href="{{ route('recent_activities.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="{{ Request::is('recent_activities*') ? 'text-danger' : '' }}">Recent Activities</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('upcoming_activities*') ? 'text-danger' : '' }}"
                    href="{{ route('upcoming_activities.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="{{ Request::is('upcoming_activities*') ? 'text-danger' : '' }}">Upcoming
                        activities</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('notice-board*') ? 'text-danger' : '' }}"
                    href="{{ route('notice-board.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="{{ Request::is('notice-board*') ? 'text-danger' : '' }}">Notice Board</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('notice-board*') ? 'text-danger' : '' }}" href="{{ route('lectures.index') }}">
        <i class="fa fa-graduation-cap"></i>
        <span class="{{ Request::is('notice-board*') ? 'text-danger' : '' }}">Lectures</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('notice-board*') ? 'text-danger' : '' }}" href="{{ route('admin.feedbacks') }}">
        <i class="fa fa-graduation-cap"></i>
        <span class="{{ Request::is('notice-board*') ? 'text-danger' : '' }}">Feedback and Suggestions</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('notice-board*') ? 'text-danger' : '' }}"
        href="{{ route('identity_cards.index') }}">
        <i class="fa fa-graduation-cap"></i>
        <span class="{{ Request::is('notice-board*') ? 'text-danger' : '' }}">Cards</span>
    </a>
</li>

<li class="side-menus {{ Request::is('calender*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('calendar.index') }}">
        <i class="fa fa-building"></i><span>Academic calender</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('requests*') ? 'text-danger' : '' }}" href="{{ route('admin.requests') }}">
        <i class="fa fa-users"></i>
        <span class="{{ Request::is('requests*') ? 'text-danger' : '' }}">Requests</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('assignments/create') ? 'text-danger' : '' }}"
        href="{{ route('assignments.create') }}">
        <i class="fa fa-plus"></i>
        <span class="{{ Request::is('assignments/create') ? 'text-danger' : '' }}">Create Assignment</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('modules*') ? 'text-danger' : '' }}" href="{{ route('modules.index') }}">
        <i class="fa fa-users"></i>
        <span class="{{ Request::is('modules*') ? 'text-danger' : '' }}">Modules</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('qr-sessions*') || Request::is('attendance*') ? 'text-danger' : '' }}"
        href="{{ route('qr-sessions.index') }}">
        <i class="fa fa-users"></i>
        <span
            class="{{ Request::is('qr-sessions*') || Request::is('attendance*') ? 'text-danger' : '' }}">Attendance</span>
    </a>
</li>

@endif

{{-- Student dashboard --}}
<style>
    .active-link {
        color: maroon !important;
        font-weight: bold;
    }
</style>

<!-- Student Menu Items -->
@if(auth()->check() && $role_id != 1)
<!-- Student menu items -->

<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/student-dashboard">
        <i class="fas fa-building"></i><span>Dashboard</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('available-courses*') ? 'text-danger' : '' }}"
        href="{{ route('/available_courses') }}">
        <i class="fa fa-graduation-cap"></i>
        <span class="{{ Request::is('available-courses*') ? 'text-danger' : '' }}">Course-units</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('my-course*') ? 'text-danger' : '' }}" href="{{ route('/my_courses') }}">
        <i class="fa fa-graduation-cap"></i>
        <span class="{{ Request::is('my-course*') ? 'text-danger' : '' }}">My Course-units</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('lectures*') ? 'text-danger' : '' }}" href="{{ route('/course_units') }}">
        <i class="fas fa-list-ul"></i>
        <span class="{{ Request::is('lectures*') ? 'text-danger' : '' }}">Lectures</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('time-table*') ? 'text-danger' : '' }}" href="{{ route('notice-board.index') }}">
        <i class="fas fa-clock"></i>
        <span class="{{ Request::is('time-table*') ? 'text-danger' : '' }}">Timetable</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('my_marks*') ? 'active-link' : '' }}" href="{{ route('/feedback') }}">
        <i class="fa fa-comment"></i>
        <span>My coursework marks</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('academic_calendar*') ? 'text-danger' : '' }}"
        href="{{ route('academic_calendar') }}">
        <i class="fa fa-calendar"></i>
        <span class="{{ Request::is('academic_calendar*') ? 'text-danger' : '' }}">Academic Calendar</span>
    </a>
</li>

{{-- <li class="nav-item">
    <a class="nav-link {{ Request::is('grades*') ? 'text-danger' : '' }}" href="{{ route('course.details') }}">
        <i class="fa fa-users"></i>
        <span class="{{ Request::is('grades*') ? 'text-danger' : '' }}">Grades & Transcripts</span>
    </a>
</li> --}}

<li class="nav-item">
    <a class="nav-link {{ Request::is('student-dashboard*') ? 'text-danger' : '' }}"
       href="{{ route('student.grades-transcripts') }}#gradesTranscriptsAccordion">
        <i class="fa fa-users"></i>
        <span class="{{ Request::is('student-dashboard*') ? 'text-danger' : '' }}">Grades & Transcripts</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link {{ Request::is('resources*') ? 'active-link' : '' }}" href="{{ route('students.index') }}">
        <i class="fa fa-question-circle"></i>
        <span class="{{ Request::is('resources*') ? 'active-link' : '' }}">Resources & Support</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('feedback*') ? 'active-link' : '' }}" href="{{ route('/feedback') }}">
        <i class="fa fa-comment"></i>
        <span>Feedback & Suggestions</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('payments*') ? 'active-link' : '' }}"
        href="{{ route('payments.create', ['student' => $student->id]) }}">
        <i class="fa fa-comment"></i>
        <span>Payments</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('/qr_sessions*') ? 'active-link' : '' }}" href="{{ route('qr_sessions') }}">
        <i class="fa fa-qrcode"></i>
        <span>QR Attendance</span>
    </a>
</li>




@endif

<!-- Guest menu items or public menu items could be added here -->
@if(!auth()->check())
<!-- You can add basic navigation for guests here if needed -->
@endif