@extends('layouts.app')

@section('content')

@php
use App\Models\Student;
use App\Models\Program;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\NoticeBoard;
use App\Models\AcademicCalendarEvent;

$user = auth()->user();
$student = $user->student;

$application = $student ? $student->application : null;
$programName = $application ? $application->program->name : 'Program Not Available';

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

// Fetch academic calendar events from the database
$calendarEvents = AcademicCalendarEvent::all()->map(function($event) {
    $type = 'activity'; // default type
    $title = strtolower($event->title);
    if (str_contains($title, 'exam') || str_contains($title, 'test') || str_contains($title, 'quiz')) {
        $type = 'exam';
    } elseif (str_contains($title, 'assignment') || str_contains($title, 'homework') || str_contains($title, 'paper') || str_contains($title, 'due')) {
        $type = 'assignment';
    }
    return [
        'date' => \Carbon\Carbon::parse($event->start_date)->format('Y-m-d'),
        'end_date' => $event->end_date ? \Carbon\Carbon::parse($event->end_date)->format('Y-m-d') : null,
        'type' => $type,
        'title' => $event->title,
        'description' => $event->description
    ];
})->toArray();
@endphp

<section class="student-dashboard">
    <div class="container-fluid">
        <!-- Welcome Banner - Dynamic -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm" style="border-left: 4px solid #800000;">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-1">Welcome, {{ $user->first_name }} {{ $user->last_name }}!</h4>
                            <p class="text-muted mb-0">
                                {{ now()->format('l, F j, Y') }} |
                                <span class="badge text-dark" style="background-color: white; border: 2px solid #800000; border-radius: 25px;">
                                    {{ $programName }}
                                </span> |
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
                <div class="card shadow-sm" style="background-color: white; border-left: 4px solid #800000;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-0" style="color:#800000;">Current GPA</h6>
                                <h2 class="my-2">{{ $gpa }}</h2>
                                <p class="small mb-0 text-muted">Academic Year: {{ $currentYear }}</p>
                            </div>
                            <div>
                                <i class="fas fa-chart-line fa-3x" style="color: #800000;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm" style="background-color: white; border-left: 4px solid #800000;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-0" style="color:#800000;">Attendance</h6>
                                <h2 class="my-2">{{ $attendance['percentage'] }}%</h2>
                                <p class="small mb-0 text-muted">Present: {{ $attendance['present'] }} | Absent: {{ $attendance['absent'] }}</p>
                            </div>
                            <div>
                                <i class="fas fa-calendar-check fa-3x" style="color: #800000;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm" style="background-color: white; border-left: 4px solid #800000;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-0" style="color:#800000;">Financial Status</h6>
                                <h2 class="my-2">${{ number_format($financials['balance'], 2) }}</h2>
                                <p class="small mb-0 text-muted">Balance Due: {{ $financials['due_date'] }}</p>
                            </div>
                            <div>
                                <i class="fas fa-dollar-sign fa-3x" style="color: #800000;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm" style="background-color: white; border-left: 4px solid #800000;">
                    <div class="card-body">
                        <a href="{{ route('my.courses') }}" style="text-decoration: none; color: inherit;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title mb-0" style="color:#800000;">Enrolled CourseUnits</h6>
                                    <h2 class="my-2">{{ $totalCourseUnits }}</h2>
                                    <p class="small mb-0 text-muted">Credits: {{ $totalCredits }}</p>
                                </div>
                                <div>
                                    <i class="fas fa-book fa-3x" style="color: #800000;"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Content -->
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-8">
                
                <!-- Current CourseUnits -->
                <div class="card shadow-sm mb-4" style="border-left: 4px solid #800000;">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0" style="color: #800000;">Current CourseUnits</h5>
                        <a href="{{ route('my.courses') }}" class="btn btn-sm btn-outline-secondary">View All</a>
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
                                            <td><span class="badge bg-light" style="color: #800000;">{{ $unit->status }}</span></td>
                                            <td>
                                                @if(auth()->user()->courseUnits->contains($unit->id))
                                                    <span class="enrolled-badge" style="color: green;">Enrolled</span>
                                                @else
                                                    <form method="POST" action="{{ route('enroll') }}">
                                                        @csrf
                                                        <input type="hidden" name="course_unit_id" value="{{ $unit->id }}">
                                                        <button type="submit" class="enroll-btn" style="color: #800000;">Enroll</button>
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

                <!-- Academic Calendar -->
                <div class="card shadow-sm mb-4" style="border-left: 4px solid #800000;">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0" style="color: #800000;">Academic Calendar</h5>
                        <div>
                            <button id="prev-month" class="btn btn-sm btn-outline-secondary me-1"><i class="fas fa-chevron-left"></i></button>
                            <span id="current-month-display">{{ date('F Y') }}</span>
                            <button id="next-month" class="btn btn-sm btn-outline-secondary ms-1"><i class="fas fa-chevron-right"></i></button>
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
                <div class="card shadow-sm mb-4" style="border: 2px solid #b8a373;">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0" style="color: #800000;">Notice Board</h5>
                    </div>
                    <div class="card-body p-0" style="border: 1px solid #b8a373;">
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
                <!-- Notifications -->
                <div class="card shadow-sm mb-4" style="border-left: 4px solid #800000;">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0" style="color: #800000;">Notifications</h5>
                    </div>
                    <div class="card-body p-0">
                        @if ($notifications->count() > 0)
                            <ul class="list-group list-group-flush">
                                @foreach ($notifications as $notification)
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="border: none;">
                                        <span>{{ $notification->data['message'] }}</span>
                                        <div>
                                            <a href="{{ $notification->data['link'] }}" class="btn btn-sm btn-outline-primary me-2">View</a>
                                            <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-secondary">Mark as Read</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="list-group-item">
                                <p class="mb-0 text-muted">No new notifications.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Upcoming Activities -->
                <div class="card shadow-sm mb-4" style="border-left: 4px solid #800000;">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0" style="color: #800000;">Upcoming Activities</h5>
                        <a href="#" class="btn btn-sm btn-outline-secondary">Calendar</a>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @foreach ($upcomingActivities as $activity)
                                <li class="list-group-item" style="line-height:24px; border: none;">
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

                <!-- Recent Activities -->
                <div class="card shadow-sm mb-4" style="border-left: 4px solid #800000;">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0" style="color: #800000;">Recent Activities</h5>
                        <a href="#" class="btn btn-sm btn-outline-secondary">View All</a>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @foreach($recentActivities as $activity)
                                <li class="list-group-item" style="border: none;">
                                    <i class="{{ $activity->icon }} mr-2" style="color: #800000;"></i>{{ $activity->title }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Financial Summary -->
                <div class="card shadow-sm mb-4" style="border-left: 4px solid #800000;">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0" style="color: #800000;">Financial Summary</h5>
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
                        <a href="{{ route('payments.create', ['student' => $student->id]) }}" class="btn btn-primary w-100" style="background-color: #800000; border: none;">Make Payment</a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="card shadow-sm mb-4" style="border-left: 4px solid #800000;">
                    <div class="card-header bg-white">
                        <h5 class="mb-0" style="color: #800000;">Quick Links</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center" style="border: none; gap:10px;">
                                <i class="fas fa-calendar me-3" style="color: #800000;"></i> Class Schedule
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center" style="border: none; gap:10px;">
                                <i class="fas fa-file-alt me-3" style="color: #800000;"></i> Transcript
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#deadSemesterModal" style="border: none; gap:10px;">
                                <i class="fas fa-book me-3" style="color: #800000;"></i> Request a dead semester
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#deadYearModal" style="border: none; gap:10px;">
                                <i class="fas fa-question-circle me-3" style="color: #800000;"></i> Request a dead year
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center" style="border: none; gap:10px;">
                                <i class="fas fa-envelope me-3" style="color: #800000;"></i> Feedback & Suggestions
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dead Semester Modal -->
<div class="modal fade" id="deadSemesterModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('request.dead.semester') }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header" style="background-color: #800000; color: white;">
                <h5 class="modal-title">Request a Dead Semester</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <label>Name</label>
                <input name="name" class="form-control" required>
                <label class="mt-2">Semester</label>
                <select name="semester" class="form-control" required>
                    <option value="Jan-Apr 2025">Jan-Apr 2025</option>
                    <option value="May-Aug 2025">May-Aug 2025</option>
                </select>
                <label class="mt-2">Reason</label>
                <textarea name="reason" class="form-control" required></textarea>
                <label class="mt-2">Document (optional)</label>
                <input type="file" name="document" class="form-control">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" style="background-color: #800000; border: none;">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- Dead Year Modal -->
<div class="modal fade" id="deadYearModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('request.dead.year') }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header" style="background-color: #800000; color: white;">
                <h5 class="modal-title">Request a Dead Year</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <label>Name</label>
                <input name="name" class="form-control" required>
                <label class="mt-2">Year</label>
                <input name="year" class="form-control" placeholder="e.g. 2025" required>
                <label class="mt-2">Reason</label>
                <textarea name="reason" class="form-control" required></textarea>
                <label class="mt-2">Document (optional)</label>
                <input type="file" name="document" class="form-control">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" style="background-color: #800000; border: none;">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- Event Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #800000; color: white;">
                <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 id="event-title"></h4>
                <p><strong>Date: </strong><span id="event-date"></span></p>
                <div id="event-details"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: #800000;">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery, Bootstrap, and DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<!-- Pass Laravel Events to JS -->
<script>
    const events = @json($calendarEvents);
</script>

<!-- Calendar Script with Modal -->
<script>
    const calendarBody = document.getElementById("calendar-body");
    const monthDisplay = document.getElementById("current-month-display");
    let currentDate = new Date();
    const eventModal = new bootstrap.Modal(document.getElementById('eventModal'));

    function renderCalendar(date) {
        const year = date.getFullYear();
        const month = date.getMonth();

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        calendarBody.innerHTML = "";

        let dateNum = 1;
        for (let i = 0; i < 6; i++) {
            const row = document.createElement("tr");

            for (let j = 0; j < 7; j++) {
                const cell = document.createElement("td");
                if (i === 0 && j < firstDay) {
                    cell.innerHTML = "";
                } else if (dateNum > daysInMonth) {
                    break;
                } else {
                    const cellDate = new Date(year, month, dateNum);
                    const formattedDate = cellDate.toISOString().split('T')[0];

                    const eventMatch = events.find(event => event.date === formattedDate);

                    if (eventMatch) {
                        cell.innerHTML = `<span class="badge bg-maroon event-date" data-event-id="${eventMatch.id}">${dateNum}</span>`;
                        cell.classList.add("event-cell");
                        cell.addEventListener('click', function() {
                            document.getElementById('event-title').innerText = eventMatch.title;
                            document.getElementById('event-date').innerText = new Date(formattedDate).toLocaleDateString('en-US', { 
                                weekday: 'long', 
                                year: 'numeric', 
                                month: 'long', 
                                day: 'numeric' 
                            });
                            document.getElementById('event-details').innerText = eventMatch.description || 'No additional details available.';
                            eventModal.show();
                        });
                    } else {
                        cell.innerText = dateNum;
                    }

                    dateNum++;
                }
                row.appendChild(cell);
            }

            calendarBody.appendChild(row);
        }

        monthDisplay.innerText = date.toLocaleString('default', { month: 'long', year: 'numeric' });
    }

    document.getElementById("prev-month").addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    document.getElementById("next-month").addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });

    renderCalendar(currentDate);
</script>

<!-- Styling for Calendar, Events, and Grades -->
<style>
    .bg-maroon {
        background-color: #800000 !important;
        color: whiteshearpened;
        padding: 5px 8px;
        border-radius: 50%;
    }
    .event-cell {
        cursor: pointer;
        position: relative;
    }
    .event-cell:hover {
        background-color: #f8f9fa;
    }
    .event-date {
        display: inline-block;
        transition: transform 0.2s;
    }
    .event-cell:hover .event-date {
        transform: scale(1.2);
    }
    .grade-row:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s;
    }
    .table-responsive {
        max-height: 400px;
        overflow-y: auto;
    }
    .table th, .table td {
        vertical-align: middle;
        border-color: #b8a373;
    }
    .accordion-button {
        font-weight: 500;
        transition: background-color 0.2s;
    }
    .accordion-button:hover {
        background-color: #e9ecef;
    }
    .badge {
        font-size: 0.9em;
        transition: transform 0.2s;
    }
    .badge:hover {
        transform: scale(1.1);
    }
</style>
@endsection