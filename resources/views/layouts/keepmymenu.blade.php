@extends('layouts.app')

@section('content')

@php
use App\Models\Student;
use App\Models\Program;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\NoticeBoard;

$user = auth()->user();
$student = $user->student;

$application = $student ? $student->application : null;
$programName = $application ? $application->program->name : 'Program Not Available';

// Static data for demonstration
$recentGrades = [
['id' => 1, 'title' => 'Mid-term Exam', 'course' => 'CS101', 'score' => '82/100', 'date' =>
now()->subDays(5)->format('Y-m-d')],
['id' => 2, 'title' => 'Lab Report', 'course' => 'PHY201', 'score' => '45/50', 'date' =>
now()->subDays(7)->format('Y-m-d')],
['id' => 3, 'title' => 'Quiz 3', 'course' => 'MATH202', 'score' => '18/20', 'date' =>
now()->subDays(2)->format('Y-m-d')],
];

$attendance = [
'present' => 42,
'absent' => 3,
'late' => 5,
'percentage' => 92
];

// Fetch notices dynamically from the database
$notices = \App\Models\NoticeBoard::orderBy('created_at', 'desc')->limit(5)->get();

$financials = [
'tuition' => 12500.00,
'paid' => 7500.00,
'balance' => 5000.00,
'due_date' => now()->addDays(21)->format('Y-m-d')
];

$currentSemester = 'Spring 2025';
$currentYear = '2024/2025';
$gpa = 5.05;

// Get current month and year for calendar
$currentMonth = date('n');
$currentYear = date('Y');
@endphp

<section class="student-dashboard">
    <div class="container-fluid">
        <!-- Welcome Banner - Dynamic -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-1">Welcome, {{ $user->first_name }} {{ $user->last_name }}!</h4>
                            <p class="text-muted mb-0">
                                {{ now()->format('l, F j, Y') }} |
                                <span class="badge bg-info text-white">{{ $programName }}</span> |
                                {{ $student->reg_number ?? 'CS12345' }}
                            </p>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-user-circle me-1"></i> My Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm" style="background-color: #b2985b; color: white;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-0" style='color:white;'>Current GPA</h6>
                                <h2 class="my-2" style='color:white;'>{{ $gpa }}</h2>
                                <p class="small mb-0" style='color:white;'>Academic Year: {{ $currentYear }}</p>
                            </div>
                            <div>
                                <i class="fas fa-chart-line fa-3x text-white" style="background: none;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm" style="background-color:#9c4434; color: white;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-0" style='color:white;'>Attendance</h6>
                                <h2 class="my-2" style='color:white;'>{{ $attendance['percentage'] }}%</h2>
                                <p class="small mb-0" style='color:white;'>Present: {{ $attendance['present'] }} |
                                    Absent: {{ $attendance['absent'] }}</p>
                            </div>
                            <div>
                                <i class="fas fa-calendar-check fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm" style="background-color:#b2985b; color: white;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-0" style='color:white;'>Financial Status</h6>
                                <h2 class="my-2" style='color:white;'>${{ number_format($financials['balance'], 2) }}
                                </h2>
                                <p class="small mb-0" style='color:white;'>Balance Due: {{ $financials['due_date'] }}
                                </p>
                            </div>
                            <div>
                                <i class="fas fa-dollar-sign fa-3x text-white" style="background: none;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm" style="background-color: #9c4434; color: white;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-0" style='color:white;'>Enrolled CourseUnits</h6>
                                <h2 class="my-2" style='color:white;'>{{ $totalCourseUnits}}</h2>
                                <p class="small mb-0" style='color:white;'>Credits: {{ $totalCredits }}</p>
                            </div>
                            <div>
                                <i class="fas fa-book fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Content -->
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-8">
                <!-- Current Courses -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Current CourseUnits</h5>
                        <a href="#" class="btn btn-sm btn-outline-secondary">View All</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Course</th>
                                        <th>Credits</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courseUnits as $unit)
                                    <tr>
                                        <td><strong>{{ $unit->course_unit_code }}</strong></td>
                                        <td class="course-name-cell">
                                            <span>{{ $unit->name }}</span>
                                        </td>
                                        <td>{{ $unit->credit_unit }}</td>
                                        {{-- <td><span class="badge bg-light text-dark">{{ $unit->status }}</span></td>
                                        --}}
                                        <td><span class="badge bg-light" style="color: maroon;">{{ $unit->status
                                                }}</span></td>

                                        <td>
                                            @if(auth()->user()->courseUnits->contains($unit->id))
                                            <span class="enrolled-badge">Enrolled</span>
                                            @else
                                            <form method="POST" action="{{ route('student.enroll', $unit->id) }}">
                                                @csrf
                                                <input type="hidden" name="course_unit_id" value="{{ $unit->id }}">
                                                <button type="submit" class="enroll-btn">Enroll</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Calendar (replacing Upcoming Assignments) -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Academic Calendar</h5>
                        <div>
                            <button id="prev-month" class="btn btn-sm btn-outline-secondary me-1"><i
                                    class="fas fa-chevron-left"></i></button>
                            <span id="current-month-display">{{ date('F Y') }}</span>
                            <button id="next-month" class="btn btn-sm btn-outline-secondary ms-1"><i
                                    class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="calendar-container">
                            <table class="table table-bordered calendar-table">
                                <thead>
                                    <tr>
                                        <th>Sun</th>
                                        <th>Mon</th>
                                        <th>Tue</th>
                                        <th>Wed</th>
                                        <th>Thu</th>
                                        <th>Fri</th>
                                        <th>Sat</th>
                                    </tr>
                                </thead>
                                <tbody id="calendar-body">
                                    <!-- Calendar will be generated by JavaScript -->
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <!-- Notice Board -->
                <div class="card shadow-sm mb-4" style='border:2px solid #b2985b;'>
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Notice Board</h5>
                    </div>
                    <div class="card-body p-0" style='border:1px solid #b2985b;'>
                        <div class="list-group list-group-flush">
                            @forelse($notices->take(4) as $notice)
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <div>
                                        <h6 class="mb-1 font-weight-bold">{{ $notice->title }}</h6>
                                        <small class="text-muted">{{ $notice->created_at->format('d M, Y') }}</small>
                                    </div>
                                    <small class="text-muted">{{ $notice->views ?? 0 }} views</small>
                                </div>
                            </a>
                            @empty
                            <div class="list-group-item">
                                <p class="mb-0 text-muted">No notices available at the moment.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-4">
                <!-- Academic Calendar -->
                <div class="card shadow-sm mb-4 ">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Upcoming Activities</h5>
                        <a href="#" class="btn btn-sm btn-outline-secondary">Calendar</a>
                    </div>
                    <div class="card-body p-0">

                        <ul class="list-group list-group-flush">
                            @foreach ($upcomingActivities as $activity)
                            <li class="list-group-item" style='line-height:24px; border: none;'>

                                <div>

                                    <p class="mb-0 font-weight-bold">
                                        <i class="text-danger fas fa-bell fa-lg mr-2"></i> {{ $activity->title }}
                                    </p>
                                    <small>{{ $activity->time }} | {{ $activity->status }}</small>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Announcements -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Recent Activities</h5>
                        <a href="#" class="btn btn-sm btn-outline-secondary">View All</a>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @foreach($recentActivities as $activity)
                            <li class="list-group-item" style='border: none;'>
                                <i class="{{ $activity->icon }} mr-2" style="color: maroon;"></i>{{ $activity->title }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Financial Summary -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Financial Summary</h5>
                        <a href="#" class="btn btn-sm btn-outline-secondary">Details</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tuition & Fees:</span>
                                <strong>${{ number_format($financials['tuition'], 2) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Paid Amount:</span>
                                <strong class="text-success">${{ number_format($financials['paid'], 2) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Remaining Balance:</span>
                                <strong class="text-danger">${{ number_format($financials['balance'], 2) }}</strong>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Next Payment Due:</span>
                                <strong>{{ $financials['due_date'] }}</strong>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary w-100">Make Payment</a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Quick Links</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center"
                                style='border: none; gap:10px;'>
                                <i class="fas fa-calendar me-3 text-maroon"></i> Class Schedule
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center"
                                style='border: none; gap:10px;'>
                                <i class="fas fa-file-alt me-3 text-maroon"></i> Transcript
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center"
                                style='border: none; gap:10px;'>
                                <i class="fas fa-book me-3 text-maroon"></i> Course Catalog
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center"
                                style='border: none; gap:10px;'>
                                <i class="fas fa-question-circle me-3 text-maroon"></i> Help Center
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center"
                                style='border: none; gap:10px;'>
                                <i class="fas fa-envelope me-3 text-maroon"></i> Feedback & Suggestions
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    .calendar-table {
        table-layout: fixed;
    }

    .calendar-table th,
    .calendar-table td {
        text-align: center;
        width: 14.28%;
        height: 50px;
        vertical-align: middle;
    }

    .calendar-day {
        position: relative;
        height: 100%;
        min-height: 50px;
    }

    .today {
        background-color: #f8f9fa;
        font-weight: bold;
        border: 2px solid #007bff;
    }

    .not-current-month {
        color: #ccc;
    }

    .event-dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }

    .calendar-event {
        position: absolute;
        bottom: 2px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 2px;
    }
</style>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        
        $('[data-toggle="tooltip"]').tooltip();
        
    
        let currentMonth = {{ $currentMonth }};
        let currentYear = {{ $currentYear }};
        
        
        const events = [
            { date: '2025-04-12', type: 'assignment', title: 'Algorithm Analysis Due' },
            { date: '2025-04-15', type: 'exam', title: 'Midterm Exam' },
            { date: '2025-04-18', type: 'activity', title: 'Group Project Meeting' },
            { date: '2025-04-22', type: 'assignment', title: 'Research Paper Due' },
            { date: '2025-04-25', type: 'activity', title: 'Lab Session' },
            { date: '2025-05-02', type: 'exam', title: 'Final Exam' },
            { date: '2025-05-05', type: 'assignment', title: 'Term Paper Due' },
            { date: '2025-03-28', type: 'activity', title: 'Guest Lecture' }
        ];
        
        function generateCalendar(month, year) {
            const firstDay = new Date(year, month - 1, 1);
            const lastDay = new Date(year, month, 0);
            const daysInMonth = lastDay.getDate();
            const startingDayOfWeek = firstDay.getDay(); // 0 (Sunday) to 6 (Saturday)
            
            // Update the month and year display
            $('#current-month-display').text(firstDay.toLocaleString('default', { month: 'long' }) + ' ' + year);
            
            let calendarHTML = '';
            let dayCount = 1;
            
           
            for (let i = 0; i < 6; i++) { 
                calendarHTML += '<tr>';
                
                
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < startingDayOfWeek) {
                       
                        const prevMonth = month === 1 ? 12 : month - 1;
                        const prevYear = month === 1 ? year - 1 : year;
                        const daysInPrevMonth = new Date(prevYear, prevMonth, 0).getDate();
                        const prevDate = daysInPrevMonth - (startingDayOfWeek - j - 1);
                        
                        calendarHTML += `<td class="not-current-month">${prevDate}</td>`;
                    } else if (dayCount > daysInMonth) {
                        // Empty cells after the last day of the month
                        const nextMonthDay = dayCount - daysInMonth;
                        calendarHTML += `<td class="not-current-month">${nextMonthDay}</td>`;
                        dayCount++;
                    } else {
                        // Current month cells
                        const dateStr = `${year}-${month.toString().padStart(2, '0')}-${dayCount.toString().padStart(2, '0')}`;
                        const isToday = dayCount === new Date().getDate() && 
                                        month === new Date().getMonth() + 1 && 
                                        year === new Date().getFullYear();
                        
                       
                        const todayEvents = events.filter(event => event.date === dateStr);
                        let eventHTML = '';
                        
                        if (todayEvents.length > 0) {
                            eventHTML = '<div class="calendar-event">';
                            const eventTypes = new Set(todayEvents.map(e => e.type));
                            
                            if (eventTypes.has('assignment')) {
                                eventHTML += '<span class="event-dot bg-primary" data-toggle="tooltip" title="Assignment Due"></span>';
                            }
                            if (eventTypes.has('activity')) {
                                eventHTML += '<span class="event-dot bg-success" data-toggle="tooltip" title="Class Activity"></span>';
                            }
                            if (eventTypes.has('exam')) {
                                eventHTML += '<span class="event-dot bg-warning" data-toggle="tooltip" title="Exam"></span>';
                            }
                            
                            eventHTML += '</div>';
                        }
                        
                        calendarHTML += `<td class="${isToday ? 'today' : ''}">
                            <div class="calendar-day">
                                ${dayCount}
                                ${eventHTML}
                            </div>
                        </td>`;
                        
                        dayCount++;
                    }
                }
                
                calendarHTML += '</tr>';
                
               
                if (dayCount > daysInMonth + 7) {
                    break;
                }
            }
            
            $('#calendar-body').html(calendarHTML);
            $('[data-toggle="tooltip"]').tooltip();
        }
        
       
        generateCalendar(currentMonth, currentYear);
        
       
        $('#prev-month').click(function() {
            currentMonth--;
            if (currentMonth < 1) {
                currentMonth = 12;
                currentYear--;
            }
            generateCalendar(currentMonth, currentYear);
        });
        
       
        $('#next-month').click(function() {
            currentMonth++;
            if (currentMonth > 12) {
                currentMonth = 1;
                currentYear++;
            }
            generateCalendar(currentMonth, currentYear);
        });
        
       
        if (typeof Chart !== 'undefined') {
            var attendanceCtx = document.getElementById('attendanceChart');
            if (attendanceCtx) {
                new Chart(attendanceCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Present', 'Absent', 'Late'],
                        datasets: [{
                            data: [{{ $attendance['present'] }}, {{ $attendance['absent'] }}, {{ $attendance['late'] }}],
                            backgroundColor: ['#28a745', '#dc3545', '#ffc107']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            }
        }
    });
</script>
@endsection






{{--
<!-- Discussion Section -->
<div class="card">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4">Discussion</h5>

        <!-- Comment Form -->
        <div class="mb-4">
            <div class="d-flex mb-3">
                <img src="/api/placeholder/100/100" alt="User Avatar" class="avatar me-3">
                <div class="flex-grow-1">
                    <textarea class="form-control" rows="2" placeholder="Add to the discussion..."
                        style="border-radius: 12px; resize: none;"></textarea>
                </div>
            </div>
            <div class="text-end">
                <button class="btn btn-primary px-4" style="border-radius: 20px;">Post Comment</button>
            </div>
        </div>

        <!-- Comments List -->
        <div>
            <!-- Comment 1 -->
            <div class="comment">
                <div class="d-flex">
                    <img src="/api/placeholder/100/100" alt="Student Avatar" class="avatar me-3">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center mb-1">
                            <h6 class="mb-0 fw-semibold">Sarah Johnson</h6>
                            <span class="ms-2 text-muted small">3 days ago</span>
                        </div>
                        <p class="mb-2">Can someone explain the difference between method overriding and
                            method overloading in more detail? I'm still a bit confused.</p>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-sm text-muted p-0 me-3">
                                <i class="far fa-thumbs-up me-1"></i> 3
                            </button>
                            <button class="btn btn-sm text-muted p-0">
                                <i class="far fa-comment me-1"></i> Reply
                            </button>
                        </div>

                        <!-- Reply to Comment 1 -->
                        <div class="comment-reply">
                            <div class="d-flex">
                                <img src="/api/placeholder/100/100" alt="Instructor Avatar" class="avatar-sm me-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center mb-1">
                                        <h6 class="mb-0 fw-semibold">Dr. James Wilson</h6>
                                        <span class="ms-2 badge badge-primary rounded-pill px-2">Instructor</span>
                                        <span class="ms-2 text-muted small">2 days ago</span>
                                    </div>
                                    <p class="mb-2">Great question, Sarah! Method overloading is when
                                        you have multiple methods with the same name but different
                                        parameters within the same class. Method overriding happens when
                                        a subclass provides a specific implementation of a method that
                                        is already defined in its parent class. We'll cover this in more
                                        detail in tomorrow's lecture!</p>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-sm text-muted p-0 me-3">
                                            <i class="far fa-thumbs-up me-1"></i> 7
                                        </button>
                                        <button class="btn btn-sm text-muted p-0">
                                            <i class="far fa-comment me-1"></i> Reply
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comment 2 -->
            <div class="comment mb-0">
                <div class="d-flex">
                    <img src="/api/placeholder/100/100" alt="Student Avatar" class="avatar me-3">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center mb-1">
                            <h6 class="mb-0 fw-semibold">Michael Chen</h6>
                            <span class="ms-2 text-muted small">Yesterday</span>
                        </div>
                        <p class="mb-2">I found this example really helpful! Just finished implementing
                            a similar structure in my project and it's working great. The flexibility of
                            polymorphism is amazing.</p>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-sm text-muted p-0 me-3">
                                <i class="far fa-thumbs-up me-1"></i> 5
                            </button>
                            <button class="btn btn-sm text-muted p-0">
                                <i class="far fa-comment me-1"></i> Reply
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div> --}}

<?php

            namespace App\Providers;
            
            use Illuminate\Support\ServiceProvider;
            use Illuminate\Support\Facades\View; // ✅ Import View
            use App\Models\CourseUnit;           // ✅ Import CourseUnit model
            
            class AppServiceProvider extends ServiceProvider
            {
                /**
                 * Register any application services.
                 *
                 * @return void
                 */
                public function register()
                {
                    //
                }
            
                /**
                 * Bootstrap any application services.
                 *
                 * @return void
                 */
                public function boot()
                {
                    // ✅ Share course units with all views
                    View::composer('*', function ($view) {
                        $view->with('courseUnits', CourseUnit::all());
                    });
                }
            }

















































            {{--
<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class="fas fa-building"></i><span>Dashboard</span>
    </a>
</li>


<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{{ route('settings.index') }}">
        <i class="fa fa-cog"></i><span>@lang('models/settings.plural')</span>
    </a>
</li>


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


<li class="side-menus {{ Request::is('programs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('programs.index') }}">
        <i class="fa fa-tasks"></i><span>Programs</span>
    </a>
</li>


<li class="side-menus {{ Request::is('semesters*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('semesters.index') }}">
        <i class="fa fa-calendar"></i><span>Semesters</span>
    </a>
</li>


<li class="side-menus {{ Request::is('cohorts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('cohorts.index') }}">
        <i class="fa fa-graduation-cap"></i><span>Cohorts</span>
    </a>
</li>


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


<li class="side-menus {{ Request::is('enrollments*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('enrollments.index') }}">
        <i class="fa fa-building"></i><span>Enrollments</span>
    </a>
</li>


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
    <a class="nav-link {{ Request::is('attendance') ? 'text-danger' : '' }}" href="{{ route('attendance.qrcode') }}">
        <i class="fa fa-qrcode"></i>
        <span class="{{ Request::is('attendance') ? 'text-danger' : '' }}">QR Code Attendance</span>
    </a>
</li> --}}





















@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary: #800000;
        --primary-light: rgba(128, 0, 0, 0.1);
        --secondary: #333333;
        --accent: #4a8747;
        --light-bg: #f8f9fa;
        --card-bg: #ffffff;
        --text-dark: #333333;
        --text-muted: #6c757d;
        --border-radius-lg: 12px;
        --border-radius-md: 8px;
        --border-radius-sm: 5px;
        --shadow: 0 4px 10px rgba(0, 0, 0, 0.07);
    }


    body {
        /* font-family: 'Segoe UI', 'Roboto', sans-serif;
            background: var(--light-bg); */
        /* color: var(--text-dark); */
        /* line-height: 1.6; */
    }

    .card {
        border: none;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow);
        background: var(--card-bg);
        transition: transform 0.2s, box-shadow 0.2s;
        margin-bottom: 20px;
    }

    .card:hover {
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .btn-primary:hover {
        background-color: #660000;
        border-color: #660000;
    }

    .btn-outline-primary {
        color: var(--primary);
        border-color: var(--primary);
    }

    .btn-outline-primary:hover {
        background-color: var(--primary);
        color: white;
    }

    .nav-link {
        color: var(--text-dark);
        padding: 0.75rem 1rem;
        border-radius: var(--border-radius-sm);
    }

    .nav-link:hover,
    .nav-link.active {
        background-color: var(--primary-light);
        color: var(--primary);
    }

    .course-banner {
        height: 220px;
        /* border-radius: var(--border-radius-lg) var(--border-radius-lg) 0 0; */
        position: relative;
        overflow: hidden;
        background-color: maroon;
    }

    .banner-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* background: linear-gradient(rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.6)); */


        background: linear-gradient(rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.9));
        display: flex;
        align-items: flex-end;
        padding: 1.5rem;

    }

    .progress {
        height: 8px;
        border-radius: 4px;
        background-color: #e9ecef;
    }

    .progress-bar {
        background-color: var(--accent);
    }

    .module-item {
        border-radius: var(--border-radius-md);
        padding: 1rem;
        margin-bottom: 0.75rem;
        transition: background-color 0.2s;
        border-left: 3px solid transparent;
    }

    .module-item:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .module-item.active {
        background-color: var(--primary-light);
        border-left-color: var(--primary);
    }

    .resource-item {
        display: flex;
        align-items: center;
        padding: 0.75rem;
        border-radius: var(--border-radius-sm);
        margin-bottom: 0.5rem;
        transition: background-color 0.2s;
    }

    .resource-item:hover {
        background-color: rgba(0, 0, 0, 0.03);
    }

    .video-container {
        position: relative;
        border-radius: var(--border-radius-md);
        overflow: hidden;
        padding-top: 56.25%;
        /* 16:9 aspect ratio */
        background-color: #000;
    }

    .video-thumbnail {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .play-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 60px;
        background-color: rgba(128, 0, 0, 0.8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .play-button:hover {
        transform: translate(-50%, -50%) scale(1.1);
    }

    .code-block {
        background-color: #f8f9fa;
        color: #333;
        border-radius: var(--border-radius-md);
        padding: 1rem;
        overflow-x: auto;
        border-left: 4px solid var(--accent);
    }

    .code-block pre {
        margin-bottom: 0;
        font-size: 0.9rem;
    }

    .code-comment {
        color: #228B22;
    }

    .stats-item {
        background: var(--card-bg);
        border-radius: var(--border-radius-md);
        padding: 1rem;
        text-align: center;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .comment {
        margin-bottom: 1.5rem;
    }

    .comment-reply {
        margin-left: 3rem;
        margin-top: 1rem;
    }

    .avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
    }

    .avatar-sm {
        width: 35px;
        height: 35px;
    }

    .badge-primary {
        background-color: var(--primary);
        color: white;
    }

    .badge-secondary {
        background-color: #e9ecef;
        color: var(--text-dark);
    }

    .sticky-sidebar {
        position: sticky;
        top: 20px;
    }

    .instructor-badge {
        border: 1px solid var(--primary);
        border-radius: 20px;
        padding: 2px 10px;
        color: var(--primary) !important;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .module-icon {
        color: var(--primary);
    }

    .resource-icon {
        color: var(--primary);
    }

    .stats-icon {
        color: var(--primary);
        opacity: 0.9;
    }

    .task-badge {
        background-color: var(--primary);
        color: white;
        font-size: 0.75rem;
        padding: 0.25rem 0.75rem;
    }

    .key-concepts {
        border-left: 4px solid var(--primary);
        background-color: rgba(128, 0, 0, 0.03);
    }

    .lesson-nav-btn {
        border-radius: 30px;
        padding: 0.5rem 1.2rem;
    }
</style>
</head>

<body>
    <div class="container-fluid py-4">
        <div class="row g-4">


            <!-- Course Header -->
            <div class="col-12">
                <div class="card mb-4">
                    <div class="course-banner">
                        <img src="{{ $courseUnit->thumbnailUrl }}" alt="Course Banner"
                            class="w-100 h-100 object-fit-cover">

                        <div class="banner-overlay">
                            <div class="container-fluid">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-light text-dark px-3 py-2 rounded-pill">{{
                                        $courseUnit->course_unit_code }}</span>
                                    <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                                        <i class="far fa-calendar-alt me-1"></i> {{ $courseUnit->duration }}
                                    </span>
                                </div>
                                <h2 class="text-dark fw-bold mb-2">{{ $courseUnit->name }}</h2>
                                <h6 class="text-dark  mb-2">{{ $courseUnit->description }}</h6>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $courseUnit->lecturer_image }}" alt="lecturer_image"
                                        class="avatar-sm me-2"
                                        style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                                    <span class="instructor-badge" style='margin-left:25px;'>{{
                                        $courseUnit->lecturer_name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Left Sidebar - Course Navigation -->
            <div class="col-lg-3">
                <div class="sticky-sidebar">
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Your Progress</h5>
                            <div class="d-flex align-items-center mb-2">
                                <div class="progress flex-grow-1 me-3">
                                    <div class="progress-bar" role="progressbar" style="width: 35%;" aria-valuenow="35"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="fw-semibold text-success">35%</span>
                            </div>
                            <div class="d-flex justify-content-between small mt-2">
                                <span class="text-muted">4 of 12 modules complete</span>
                                <span class="text-primary fw-semibold">8 remaining</span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="card">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Course Modules</h5>
                            <div class="nav flex-column">
                                <div class="module-item">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-play-circle me-3 module-icon"></i>
                                        <div>
                                            <div class="fw-semibold">Module 1: Introduction</div>
                                            <div class="text-muted small">4 lessons • 45 mins</div>
                                        </div>
                                        <i class="fas fa-check-circle text-success ms-auto"></i>
                                    </div>
                                </div>

                                <div class="module-item">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-file-alt me-3 module-icon"></i>
                                        <div>
                                            <div class="fw-semibold">Module 2: Data Structures</div>
                                            <div class="text-muted small">6 lessons • 1h 20m</div>
                                        </div>
                                        <i class="fas fa-check-circle text-success ms-auto"></i>
                                    </div>
                                </div>

                                <div class="module-item">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-code me-3 module-icon"></i>
                                        <div>
                                            <div class="fw-semibold">Module 3: Algorithms</div>
                                            <div class="text-muted small">5 lessons • 2h 15m</div>
                                        </div>
                                        <i class="fas fa-check-circle text-success ms-auto"></i>
                                    </div>
                                </div>

                                <div class="module-item">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-project-diagram me-3 module-icon"></i>
                                        <div>
                                            <div class="fw-semibold">Module 4: Design Patterns</div>
                                            <div class="text-muted small">3 lessons • 1h 30m</div>
                                        </div>
                                        <i class="fas fa-check-circle text-success ms-auto"></i>
                                    </div>
                                </div>

                                <div class="module-item active">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-laptop-code me-3 module-icon"></i>
                                        <div>
                                            <div class="fw-semibold">Module 5: Advanced OOP</div>
                                            <div class="text-muted small">7 lessons • 3h 10m</div>
                                        </div>
                                        <span
                                            class="badge bg-warning text-dark rounded-pill px-2 ms-auto">Current</span>
                                    </div>
                                </div>

                                <div class="module-item">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-database me-3 text-muted"></i>
                                        <div>
                                            <div class="fw-semibold">Module 6: Database Integration</div>
                                            <div class="text-muted small">4 lessons • 2h 05m</div>
                                        </div>
                                        <span class="badge bg-light text-muted rounded-pill px-2 ms-auto">Locked</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            --}}
            <div class="card">
                <div class="card-body p-4">
                    {{-- <h5 class="fw-bold mb-3">Course Modules for {{ $courseUnit->name }}</h5> --}}
                    <h5 class="fw-bold mb-3">Course Modules</h5>
                    <div class="nav flex-column">
                        @forelse ($modules as $module)
                        <div class="module-item {{ $module->status === 'current' ? 'active' : '' }}">
                            <div class="d-flex align-items-center" style='gap:10px;'>
                                <i class="fas {{ $module->icon ?? 'fa-play-circle' }} me-3 module-icon"></i>
                                <div>
                                    <div class="fw-semibold">{{ $module->title }}</div>
                                    <div class="text-muted small">
                                        {{ $module->lesson_count }} lessons • {{ $module->duration }}
                                    </div>
                                </div>

                                @if ($module->status === 'completed')
                                <i class="fas fa-check-circle text-success ms-auto"></i>
                                @elseif ($module->status === 'current')
                                <span class="badge bg-warning text-dark rounded-pill px-2 ms-auto">Current</span>
                                @elseif ($module->status === 'locked')
                                <span class="badge bg-light text-muted rounded-pill px-2 ms-auto">Locked</span>
                                @endif
                            </div>
                        </div>
                        @empty
                        <div class="text-muted">No modules available for this course unit.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Center Content Area - Current Lesson -->
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold">Module 5: Advanced OOP</h4>
                    <div>
                        <button class="btn btn-sm btn-outline-primary rounded-circle me-2" title="Bookmark">
                            <i class="far fa-bookmark"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-primary rounded-circle" title="Download">
                            <i class="fas fa-download"></i>
                        </button>
                    </div>
                </div>



                <div class="video-container mb-4 position-relative"
                    style="padding-bottom: 56.25%; height: 0; overflow: hidden;">
                    <iframe src="https://www.youtube.com/embed/k7LSFYyBZUs" frameborder="0" allowfullscreen
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                    </iframe>
                </div>


                <!-- Lesson Content -->
                <div>
                    <h5 class="fw-bold mb-3">Lesson 1: Polymorphism in Practice</h5>

                    <p class="mb-4" style='line-height:1.6;'>
                        Polymorphism is one of the core principles of object-oriented programming that allows
                        objects of different classes to be treated as objects of a common superclass. The word
                        "poly" means many and
                        "morph" means forms, so polymorphism refers to the ability of an object to take on many
                        forms.
                    </p>

                    <div class="card mb-4 key-concepts">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3 text-primary">Key Concepts</h6>
                            <ul class="mb-0 ps-3">
                                <li class="mb-2">Method overriding vs method overloading</li>
                                <li class="mb-2">Runtime polymorphism using virtual methods</li>
                                <li class="mb-2">Abstract classes and interfaces</li>
                                <li>Implementing polymorphic behavior in real applications</li>
                            </ul>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3">Code Example</h6>
                    <div class="code-block mb-4">
                        <pre><span class="code-comment">// Example of polymorphism</span>
abstract class Shape {
    protected $color;
    
    public function __construct($color) {
        $this->color = $color;
    }
    
    <span class="code-comment">// Abstract method to be implemented by subclasses</span>
    abstract public function calculateArea();
    
    public function getColor() {
        return $this->color;
    }
}

class Circle extends Shape {
    private $radius;
    
    public function __construct($color, $radius) {
        parent::__construct($color);
        $this->radius = $radius;
    }
    
    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    private $width;
    private $height;
    
    public function __construct($color, $width, $height) {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }
    
    public function calculateArea() {
        return $this->width * $this->height;
    }
}

<span class="code-comment">// Using polymorphism</span>
$shapes = [
    new Circle('red', 5),
    new Rectangle('blue', 4, 6)
];

foreach ($shapes as $shape) {
    echo "Shape color: " . $shape->getColor() . "\n";
    echo "Shape area: " . $shape->calculateArea() . "\n\n";
}</pre>
                    </div>

                    <h6 class="fw-bold mb-3">Learning Outcomes</h6>
                    <div class="d-flex flex-column gap-2 mb-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle me-2 text-success"></i>
                            <span>Understand how polymorphism enables code reusability</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle me-2 text-success"></i>
                            <span>Implement polymorphic behavior in your own code</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="far fa-circle me-2 text-muted"></i>
                            <span>Apply polymorphism to solve complex programming problems</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="far fa-circle me-2 text-muted"></i>
                            <span>Design flexible and maintainable object hierarchies</span>
                        </div>
                    </div>
                </div>

                <!-- Lesson Navigation -->
                <div class="d-flex justify-content-between mt-5">
                    <button class="btn btn-light lesson-nav-btn">
                        <i class="fas fa-arrow-left me-2"></i> Previous Lesson
                    </button>
                    <button class="btn btn-primary lesson-nav-btn">
                        Next Lesson <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>


        <!-- Tests and Exams Section (Replacing Discussion) -->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4">Tests and Exams</h5>

                <!-- Exam Section Tabs -->
                <div class="d-flex mb-4">
                    <div class="exam-tab active me-3" data-target="upcoming">
                        <i class="fas fa-calendar-alt me-2"></i> Upcoming
                    </div>
                    <div class="exam-tab me-3" data-target="current">
                        <i class="fas fa-edit me-2"></i> Current
                    </div>
                    <div class="exam-tab" data-target="past-papers">
                        <i class="fas fa-history me-2"></i> Past Papers
                    </div>
                </div>

                <!-- Upcoming Exams -->
                <div id="upcoming-exams" class="mb-4">
                    <div class="exam-item">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">Mid-Term Examination</h6>
                            <span class="badge bg-warning text-dark">April 20, 2025</span>
                        </div>
                        <p class="text-muted mb-2 small">Topics: Modules 1-5 (OOP Principles, Data Structures,
                            Algorithms)</p>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-light text-dark me-2">Duration: 2 hours</span>
                            <span class="badge bg-light text-dark">Weight: 30%</span>
                        </div>
                    </div>

                    <div class="exam-item">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">Weekly Quiz #5</h6>
                            <span class="badge bg-danger text-white">April 17, 2025</span>
                        </div>
                        <p class="text-muted mb-2 small">Topics: Polymorphism, Abstract Classes, Interfaces</p>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-light text-dark me-2">Duration: 30 minutes</span>
                            <span class="badge bg-light text-dark">Weight: 5%</span>
                        </div>
                    </div>
                </div>

                <!-- Current Exams (Initially Hidden) -->
                <div id="current-exams" class="mb-4 collapsed-content">
                    <div class="exam-item">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">Module 5 Assessment</h6>
                            <span class="badge bg-success text-white">Available Now</span>
                        </div>
                        <p class="text-muted mb-2 small">Topics: Advanced OOP Concepts</p>
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-light text-dark me-2">Duration: 60 minutes</span>
                            <span class="badge bg-light text-dark me-2">Attempts: 1/2</span>
                            <span class="badge bg-light text-dark">Due: Today, 11:59 PM</span>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Start Exam</button>
                        </div>
                    </div>
                </div>

                <!-- Past Papers (Initially Hidden) -->
                <div id="past-papers" class="mb-4 collapsed-content">
                    <div class="exam-item">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">2024 Final Examination</h6>
                            <div>
                                <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-download me-1"></i>
                                    Questions</a>
                                <a href="#" class="btn btn-sm btn-outline-primary ms-2"><i
                                        class="fas fa-download me-1"></i> Solutions</a>
                            </div>
                        </div>
                        <p class="text-muted mb-0 small">Topics: All modules, comprehensive assessment</p>
                    </div>

                    <div class="exam-item">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">2024 Mid-Term Examination</h6>
                            <div>
                                <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-download me-1"></i>
                                    Questions</a>
                                <a href="#" class="btn btn-sm btn-outline-primary ms-2"><i
                                        class="fas fa-download me-1"></i> Solutions</a>
                            </div>
                        </div>
                        <p class="text-muted mb-0 small">Topics: Modules 1-5</p>
                    </div>

                    <div class="exam-item">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">2023 Final Examination</h6>
                            <div>
                                <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-download me-1"></i>
                                    Questions</a>
                                <a href="#" class="btn btn-sm btn-outline-primary ms-2"><i
                                        class="fas fa-download me-1"></i> Solutions</a>
                            </div>
                        </div>
                        <p class="text-muted mb-0 small">Topics: All modules, comprehensive assessment</p>
                    </div>

                    <div class="exam-item">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="fw-bold mb-0">Practice Quiz Bundle</h6>
                            <div>
                                <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-download me-1"></i>
                                    Download</a>
                            </div>
                        </div>
                        <p class="text-muted mb-0 small">Collection of practice quizzes for exam preparation</p>
                    </div>
                </div>

                <!-- Show Discussion section button -->
                <div class="text-center mt-4">
                    <button class="btn btn-outline-primary" id="show-discussion">
                        <i class="fas fa-comments me-2"></i> Continue to Discussion
                    </button>
                </div>
            </div>
        </div>


    </div>





    <!-- Right Sidebar - Resources & Activities -->
    <div class="col-lg-3">
        <div class="sticky-sidebar">
            

            <div class="container-fluid px-0" style="width: 100%; max-width: 1400px;">
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">Assignments</h5>
                        <div class="d-flex flex-column gap-3">
                            @foreach($courseUnit->assignments as $assignment)
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-3">
                                <div class="flex-grow-1 me-3">
                                    <h6 class="mb-1 fw-semibold">{{ $assignment->title }}</h6>
                                    <span class="text-muted small" style='color:orange !important;'>Due: {{
                                        \Carbon\Carbon::parse($assignment->due_date)->format('F d, Y') }}</span>
                                </div>
                                <a href="{{ Storage::url($assignment->file_url) }}"
                                    class="btn btn-sm btn-outline-primary" target="_blank">
                                    <i class="fas fa-download me-1"></i> Download
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Resources -->
            <div class="card mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Resources</h5>
                    <div class="d-flex flex-column gap-2">
                        <a href="#" class="resource-item text-decoration-none">
                            <i class="fas fa-file-pdf me-3 resource-icon"></i>
                            <div class="flex-grow-1">
                                <div class="fw-medium text-dark">Polymorphism Cheatsheet</div>
                                <div class="text-muted small">PDF • 2.4MB</div>
                            </div>
                            <i class="fas fa-download text-muted"></i>
                        </a>
                        <a href="#" class="resource-item text-decoration-none">
                            <i class="fas fa-file-powerpoint me-3 resource-icon"></i>
                            <div class="flex-grow-1">
                                <div class="fw-medium text-dark">Lecture Slides</div>
                                <div class="text-muted small">PPT • 5.1MB</div>
                            </div>
                            <i class="fas fa-download text-muted"></i>
                        </a>
                        <a href="#" class="resource-item text-decoration-none">
                            <i class="fas fa-link me-3 resource-icon"></i>
                            <div class="flex-grow-1">
                                <div class="fw-medium text-dark">Additional Reading</div>
                                <div class="text-muted small">External resource</div>
                            </div>
                            <i class="fas fa-external-link-alt text-muted"></i>
                        </a>
                        <a href="#" class="resource-item text-decoration-none">
                            <i class="fas fa-code me-3 resource-icon"></i>
                            <div class="flex-grow-1">
                                <div class="fw-medium text-dark">Starter Code</div>
                                <div class="text-muted small">ZIP • 1.2MB</div>
                            </div>
                            <i class="fas fa-download text-muted"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Upcoming Tasks -->
            <div class="card mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Upcoming Tasks</h5>
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="d-flex align-items-center mb-2">
                            <span class="task-badge rounded-pill me-2">Assignment</span>
                            <span class="text-muted small ms-auto">Due in 5 days</span>
                        </div>
                        <h6 class="mb-0">Implement a Class Hierarchy</h6>
                    </div>
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="d-flex align-items-center mb-2">
                            <span class="task-badge rounded-pill me-2">Quiz</span>
                            <span class="text-muted small ms-auto">Due in 2 days</span>
                        </div>
                        <h6 class="mb-0">OOP Concepts Review</h6>
                    </div>
                    <div>
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-success rounded-pill me-2">Project</span>
                            <span class="text-muted small ms-auto">Due in 2 weeks</span>
                        </div>
                        <h6 class="mb-0">Design Patterns Implementation</h6>
                    </div>
                </div>
            </div>

            <!-- Need Help -->
            <div class="card">
                <div class="card-body p-4 text-center">
                    <i class="fas fa-question-circle fa-2x mb-3" style="color: var(--primary);"></i>
                    <h5 class="fw-bold mb-2">Need Help?</h5>
                    <p class="text-muted mb-3">Having trouble with this lesson? Reach out for assistance.
                    </p>
                    <div class="d-grid">
                        <button class="btn btn-outline-primary">Contact Instructor</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>





    @endsection