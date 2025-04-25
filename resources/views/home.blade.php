@extends('layouts.app')

@section('content')

@php
$role_id = auth()->user()->role_id; // Get the role of the currently authenticated user
@endphp

<!-- Only show the following menu items if the user is an admin -->
@if($role_id == 1)
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Dashboard</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <!-- Left Column: Main Dashboard Content -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Dashboard Cards -->
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('users.index') }}">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <i class="fas fa-graduation-cap fa-2x"></i>
                                    <h6 class="cards">Users</h6>
                                    <p class="pop">{{ $totalUsers }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('course-units.index') }}">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <i class="fas fa-book fa-2x"></i>
                                    <h6 class="cards">Course Units</h6>
                                    <p class="pop">{{ $totalCourseUnits }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('students.index') }}">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <i class="fas fa-user-graduate fa-2x"></i>
                                    <h6 class="cards">Students</h6>
                                    <p class="pop">{{ $totalStudents }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('lecturers.index') }}">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <i class="fas fa-chalkboard-teacher fa-2x"></i>
                                    <h6 class="cards">Lecturers</h6>
                                    <p class="pop">{{ $totalLecturers }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('admin.student_enrollments') }}">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <i class="fas fa-plus fa-2x"></i>
                                    <h6 class="cards">Enrollments</h6>
                                    <p class="pop">{{ $totalEnrollments }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('lectures.index') }}">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <i class="fas fa-pencil-alt fa-2x"></i>
                                    <h6 class="cards">Lessons</h6>
                                    <p class="pop">{{ $totalLectures }}</p>
                                </div>
                            </div>
                    </div>
                    </a>
                </div>

                <!-- Attendance Chart -->
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5>Attendance</h5>
                        <canvas id="attendanceChart" height="200"></canvas>
                    </div>
                </div>

                <!-- Notice Board -->
                <div class="card p-4" style="border: 2px solid #b49b5c;">
                    <h5 style="color: black;">Notice Board</h5>
                    <ul class="list-group">
                        @foreach($notices as $notice)
                        <li class="list-group-item" style="line-height: 24px;">
                            <strong>{{ $notice->title }}</strong><br>
                            <span>{{ \Carbon\Carbon::parse($notice->date)->format('d M, Y') }}</span>
                            <span class="float-right">{{ number_format($notice->views ?? 0) }} views</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Right Column: Events Calendar + Academic Calendar -->
            <div class="col-lg-4">
                <!-- Upcoming Activities -->
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="mb-3">Upcoming Activities</h5>
                        @foreach ($upcomingActivities as $activity)
                        <div class="d-flex align-items-center mb-2" style="line-height: 30px;">
                            <i class="text-danger fas fa-bell fa-lg mr-2"></i>
                            <div>
                                <p class="mb-0 font-weight-bold">{{ $activity->title }}</p>
                                <small>{{ $activity->time }} | {{ $activity->status }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5>Recent Activity</h5>
                        <ul class="list-unstyled">
                            @foreach($recentActivities as $activity)
                            <li><i class="{{ $activity->icon }} mr-2" style="color: maroon;"></i>{{ $activity->title }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Latest Message -->
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5>Latest Message</h5>
                        <p class="mb-0">No new messages</p>
                    </div>
                </div>

                {{--
                <!-- Events Calendar + Academic Calendar Section -->
                <div class="card p-4 mb-3" style="border: 2px solid white;">
                    <h5 style="color: black;">Academic Calendar</h5>
                    <div id="eventsCalendar" class="mb-4"></div>

                    <h6 class="text-center mt-4 mb-2"> Semester II (2024/2025)</h6>
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-bordered table-hover calendar-table">
                            <thead class="table-dark">
                                <tr>
                                    <th>Dates</th>
                                    <th>Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Monday, 20th January 2025</td>
                                    <td>Semester Resumes</td>
                                </tr>
                                <tr>
                                    <td>Wed 22nd – Fri 21st March 2025</td>
                                    <td>Face-to-face Teaching (8 Weeks) - Course Work & Assignments</td>
                                </tr>
                                <tr>
                                    <td>Mon 24th – Fri 4th April 2025</td>
                                    <td>Semester Tests & Mid-Term Examinations</td>
                                </tr>
                                <tr>
                                    <td>Thu 27th – Fri 28th March 2025</td>
                                    <td>Mid-Semester Final Year Project Presentations</td>
                                </tr>
                                <tr>
                                    <td>Mon 7th April – Fri 2nd May 2025</td>
                                    <td>Complete Course Teaching + Guest Lectures</td>
                                </tr>
                                <tr>
                                    <td>Mon 5th – Fri 9th May 2025</td>
                                    <td>Final Year Project Presentations</td>
                                </tr>
                                <tr>
                                    <td>Mon 12th – Fri 23rd May 2025</td>
                                    <td>Semester II Exams + Internship (Cohort 3)</td>
                                </tr>
                                <tr>
                                    <td>Mon 2nd June – Thu 31st July 2025</td>
                                    <td>Internship for Cohort 3 Students</td>
                                </tr>
                                <tr class="table-primary">
                                    <td colspan="3" class="text-center"><strong>Recess Semester (Cohort 4)</strong></td>
                                </tr>
                                <tr>
                                    <td>Mon 2nd June 2025</td>
                                    <td>Orientation of Cohort 4 Students</td>
                                </tr>
                                <tr>
                                    <td>Tue 3rd June – 30th June 2025</td>
                                    <td>Face-to-face Teaching (4 Weeks)</td>
                                </tr>
                                <tr>
                                    <td>Tue 1st July – Wed 31st July 2025</td>
                                    <td>Group Project Development (4 Weeks)</td>
                                </tr>
                                <tr>
                                    <td>Mon 4th Aug – Fri 8th Aug 2025</td>
                                    <td>Recess Project Presentations</td>
                                </tr>
                                <tr>
                                    <td>--</td>
                                    <td>Semester Break</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}

            <!-- Events Calendar + Academic Calendar Section -->
            <div class="card p-4 mb-3" style="border: 2px solid white;">
                <h5 style="color: black;">Academic Calendar</h5>
                <div id="eventsCalendar" class="mb-4"></div>

                <h6 class="text-center mt-4 mb-2"> Semester II (2024/2025)</h6>
                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-bordered table-hover calendar-table">
                        <thead class="table-dark">
                            <tr>
                                <th>Dates</th>
                                <th>Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($academicCalendarEvents as $event)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($event->start_date)->format('l, d M Y') }} - {{
                                    \Carbon\Carbon::parse($event->end_date)->format('l, d M Y') }}</td>
                                <td>{{ $event->title }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .pop {
        animation: popEffect 1s infinite;
    }

    @keyframes popEffect {

        0%,
        100% {
            transform: scale(1);
            color: maroon;
        }

        50% {
            transform: scale(1.2);
            color: maroon;
        }
    }

    .calendar-table th {
        background-color: maroon !important;
        color: white;
    }

    .calendar-table td {
        text-align: center;
        vertical-align: middle;
    }

    .table-primary {
        background-color: #cce5ff !important;
        font-weight: bold;
    }
</style>
@endsection

@section('scripts')
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
<script>
    // Initialize the attendance chart
    // Attendance Chart
    // fetch('/attendance-data') // Adjust the URL to match your route
    // .then(response => response.json())
    // .then(data => {
    //     const attendanceChart = new Chart(document.getElementById('attendanceChart').getContext('2d'), {
    //         type: 'bar',
    //         data: {
    //             labels: data.labels, // From the backend response
    //             datasets: [
    //                 {
    //                     label: 'Total Present',
    //                     data: data.presentData, // From the backend response
    //                     backgroundColor: '#800000',
    //                     borderColor: '#b39a5b',
    //                     borderWidth: 1,
    //                 },
    //                 {
    //                     label: 'Total Absent',
    //                     data: data.absentData, // From the backend response
    //                     backgroundColor: '#b39a5b',
    //                     borderColor: '#800000',
    //                     borderWidth: 1,
    //                 }
    //             ]
    //         },
    //         options: {
    //             scales: {
    //                 x: {
    //                     ticks: { color: '#800000' }
    //                 },
    //                 y: {
    //                     ticks: { color: '#800000' }
    //                 }
    //             },
    //             plugins: {
    //                 legend: {
    //                     labels: { color: '#800000' }
    //                 }
    //             }
    //         }
    //     });
    // })
    // .catch(error => {
    //     console.error('Error fetching attendance data:', error);
    // });

    const attendanceChart = new Chart(document.getElementById('attendanceChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [
                    {
                        label: 'Total Present',
                        data: [200, 180, 220, 210, 250],
                        backgroundColor: '#800000',
                        borderColor: '#b39a5b',
                        borderWidth: 1,
                    },
                    {
                        label: 'Total Absent',
                        data: [50, 70, 30, 40, 20],
                        backgroundColor: '#b39a5b',
                        borderColor: '#800000',
                        borderWidth: 1,
                    }
                ]
            },
            options: {
                scales: {
                    x: {
                        ticks: { color: '#800000' }
                    },
                    y: {
                        ticks: { color: '#800000' }
                    }
                },
                plugins: {
                    legend: {
                        labels: { color: '#800000' }
                    }
                }
            }
        });


</script>
@endsection
@endif