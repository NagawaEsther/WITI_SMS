@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Student Dashboard</h3>
    </div>

    <div class="section-body">
        <div class="row">
            <!-- Left Column: Main Content -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- My Courses -->
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('course-units.index') }}">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <i class="fas fa-book-reader fa-2x"></i>
                                    <h6 class="cards">My Courses</h6>
                                    {{-- <p class="pop">{{ $myCoursesCount }}</p> --}}
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Attendance -->
                    {{-- <div class="col-md-4 mb-3">
                        <a href="{{ route('student.attendance') }}">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <i class="fas fa-calendar-check fa-2x"></i>
                                    <h6 class="cards">My Attendance</h6>
                                    <p class="pop">{{ $attendancePercentage }}%</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Grades / Results (optional) -->
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('student.results') }}">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <i class="fas fa-chart-line fa-2x"></i>
                                    <h6 class="cards">My Results</h6>
                                    <p class="pop">{{ $resultsCount }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> --}}

                <!-- Notice Board -->
                {{-- <div class="card p-4 mb-3" style="border: 2px solid #b49b5c;">
                    <h5 class="mb-3" style="color: black;">Notice Board</h5>
                    <ul class="list-group">
                        @foreach($notices as $notice)
                        <li class="list-group-item">
                            <strong>{{ $notice->title }}</strong><br>
                            <small>{{ \Carbon\Carbon::parse($notice->date)->format('d M, Y') }}</small>
                            <span class="float-right">{{ number_format($notice->views ?? 0) }} views</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div> --}}

            <!-- Right Column: Activities & Calendar -->
            {{-- <div class="col-lg-4">
                <!-- Upcoming Activities -->
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="mb-3">Upcoming Activities</h5>
                        @foreach ($upcomingActivities as $activity)
                        <div class="d-flex align-items-center mb-2">
                            <i class="text-success fas fa-bell fa-lg mr-2"></i>
                            <div>
                                <p class="mb-0 font-weight-bold">{{ $activity->title }}</p>
                                <small>{{ $activity->time }} | {{ $activity->status }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> --}}

                <!-- Messages -->
                {{-- <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5>Messages</h5>
                        @if($latestMessage)
                        <p><strong>{{ $latestMessage->title }}</strong></p>
                        <small>{{ $latestMessage->date }}</small>
                        @else
                        <p class="mb-0">No new messages</p>
                        @endif
                    </div>
                </div> --}}

                <!-- Academic Calendar -->
                <div class="card p-4" style="border: 2px solid white;">
                    <h5 class="text-dark">Academic Calendar</h5>
                    <div id="eventsCalendar" class="mb-4"></div>

                    <h6 class="text-center mt-4 mb-2">Semester II (2024/2025)</h6>
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
                                    <td>20 Jan 2025</td>
                                    <td>Semester Resumes</td>
                                </tr>
                                <tr>
                                    <td>22 Jan – 21 Mar 2025</td>
                                    <td>Face-to-face Teaching (8 Weeks)</td>
                                </tr>
                                <tr>
                                    <td>24 Mar – 4 Apr 2025</td>
                                    <td>Mid-Semester Exams</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection