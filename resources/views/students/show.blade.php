@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Student Details</h4>

    <div class="card shadow-sm">

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Student Name</th>
                    <td>{{ $student->user->first_name }} {{ $student->user->last_name }}</td>
                </tr>
                <tr>
                    <th>Reg Number</th>
                    <td>{{ $student->reg_number }}</td>
                </tr>
                <tr>
                    <th>Admission Date</th>
                    <td>{{ \Carbon\Carbon::parse($student->admission_date)->format('d M Y') }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if ($student->status == 'dropped')
                        <span class="badge badge-danger">{{ ucfirst($student->status) }}</span>
                        @elseif ($student->status == 'graduated')
                        <span class="badge badge-success">{{ ucfirst($student->status) }}</span>
                        @elseif ($student->status == 'active')
                        <span class="badge badge-warning">{{ ucfirst($student->status) }}</span>
                        @else
                        <span class="badge badge-secondary">{{ ucfirst($student->status) }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Cohort</th>
                    <td>{{ $student->cohort->name }}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{ Auth::user()->first_name }}</td>
                </tr>
                <tr>
                    <th>Student Application ID</th>
                    <td>{{ $student->student_application_id }}</td>
                </tr>
            </table>

            <div class="text-center mt-3">


            </div>
        </div>
    </div>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection



{{-- @extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
    <div class="profile-card">
        <div class="profile-header d-flex align-items-center flex-wrap">
            <img src="/api/placeholder/120/120" alt="Student Profile" class="profile-img">
            <div class="name-section">
                <h1 class="display-6 mb-0">{{ $student->user->first_name }} {{ $student->user->last_name }}</h1>
                <p class="mb-0"><i class="fas fa-id-card me-2"></i>{{ $student->reg_number }}</p>
            </div>
            <div class="status-badge 
                @if ($student->status == 'dropped')
                    status-dropped
                @elseif ($student->status == 'graduated')
                    status-graduated
                @elseif ($student->status == 'active')
                    status-active
                @else
                    status-other
                @endif
            ">
                <i class="fas 
                    @if ($student->status == 'dropped')
                        fa-user-slash
                    @elseif ($student->status == 'graduated')
                        fa-user-graduate
                    @elseif ($student->status == 'active')
                        fa-user-check
                    @else
                        fa-user
                    @endif
                    me-2"></i>{{ ucfirst($student->status) }}
            </div>
        </div>

        <ul class="nav nav-tabs mt-4 px-3" id="profileTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview"
                    type="button" role="tab" aria-controls="overview" aria-selected="true">
                    <i class="fas fa-user me-2"></i>Overview
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="academic-tab" data-bs-toggle="tab" data-bs-target="#academic" type="button"
                    role="tab" aria-controls="academic" aria-selected="false">
                    <i class="fas fa-graduation-cap me-2"></i>Academic
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="timeline-tab" data-bs-toggle="tab" data-bs-target="#timeline" type="button"
                    role="tab" aria-controls="timeline" aria-selected="false">
                    <i class="fas fa-history me-2"></i>Timeline
                </button>
            </li>
        </ul>

        <div class="tab-content" id="profileTabsContent">
            <!-- Overview Tab -->
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                <div class="row">
                    <div class="col-md-8">
                        <div class="info-section">
                            <h5 class="info-title">Personal Information</h5>

                            <div class="row info-row">
                                <div class="col-md-4 info-label"><i class="fas fa-user me-2"></i>Full Name</div>
                                <div class="col-md-8 info-value">{{ $student->user->first_name }} {{
                                    $student->user->last_name }}</div>
                            </div>

                            <div class="row info-row">
                                <div class="col-md-4 info-label"><i class="fas fa-id-card me-2"></i>Registration Number
                                </div>
                                <div class="col-md-8 info-value">{{ $student->reg_number }}</div>
                            </div>

                            <div class="row info-row">
                                <div class="col-md-4 info-label"><i class="fas fa-calendar-alt me-2"></i>Admission Date
                                </div>
                                <div class="col-md-8 info-value">{{
                                    \Carbon\Carbon::parse($student->admission_date)->format('d M Y') }}</div>
                            </div>

                            <div class="row info-row">
                                <div class="col-md-4 info-label"><i class="fas fa-users me-2"></i>Cohort</div>
                                <div class="col-md-8 info-value">{{ $student->cohort->name }}</div>
                            </div>

                            <div class="row info-row">
                                <div class="col-md-4 info-label"><i class="fas fa-user-plus me-2"></i>Created By</div>
                                <div class="col-md-8 info-value">{{ Auth::user()->first_name }}</div>
                            </div>

                            <div class="row info-row">
                                <div class="col-md-4 info-label"><i class="fas fa-hashtag me-2"></i>Application ID</div>
                                <div class="col-md-8 info-value">{{ $student->student_application_id }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stats-card">
                            <div class="stats-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stats-number">{{
                                \Carbon\Carbon::parse($student->admission_date)->diffInDays(now()) }}</div>
                            <div class="stats-label">Days Since Admission</div>
                        </div>

                        <div class="stats-card">
                            <div class="stats-icon">
                                <i class="fas fa-user-clock"></i>
                            </div>
                            <div class="stats-number">{{
                                \Carbon\Carbon::parse($student->admission_date)->diffInMonths(now()) }}</div>
                            <div class="stats-label">Months Enrolled</div>
                        </div>

                        <div class="stats-card">
                            <div class="stats-icon">
                                <i class="fas fa-book-reader"></i>
                            </div>
                            <div class="stats-number">5</div>
                            <div class="stats-label">Courses Enrolled</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Academic Tab -->
            <div class="tab-pane fade" id="academic" role="tabpanel" aria-labelledby="academic-tab">
                <div class="info-section">
                    <h5 class="info-title">Academic Information</h5>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="stats-number">3.8</div>
                                <div class="stats-label">GPA</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <div class="stats-number">24/30</div>
                                <div class="stats-label">Credits Completed</div>
                            </div>
                        </div>
                    </div>

                    <h6 class="mb-3">Current Courses</h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-maroon">
                                <tr>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Credits</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>CS101</td>
                                    <td>Introduction to Programming</td>
                                    <td>3</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-maroon" role="progressbar" style="width: 75%"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>MATH201</td>
                                    <td>Advanced Calculus</td>
                                    <td>4</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-maroon" role="progressbar" style="width: 60%"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ENG105</td>
                                    <td>Technical Writing</td>
                                    <td>3</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-maroon" role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Timeline Tab -->
            <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <p class="timeline-date">{{ \Carbon\Carbon::parse($student->admission_date)->format('d M Y')
                                }}</p>
                            <h5 class="timeline-title">Admitted to {{ $student->cohort->name }}</h5>
                            <p class="timeline-text">Started academic journey with registration number {{
                                $student->reg_number }}</p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <p class="timeline-date">{{
                                \Carbon\Carbon::parse($student->admission_date)->addDays(14)->format('d M Y') }}</p>
                            <h5 class="timeline-title">Orientation Completed</h5>
                            <p class="timeline-text">Successfully completed the orientation program</p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <p class="timeline-date">{{
                                \Carbon\Carbon::parse($student->admission_date)->addMonths(3)->format('d M Y') }}</p>
                            <h5 class="timeline-title">First Semester Completed</h5>
                            <p class="timeline-text">Completed first semester with good academic standing</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to List
        </a>
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-maroon ms-2">
            <i class="fas fa-edit me-2"></i>Edit Profile
        </a>
    </div>
</div>

<!-- CSS Styles for Maroon Theme -->
<style>
    :root {
        --primary-color: #800000;
        /* Maroon */
        --primary-light: #a52a2a;
        /* Lighter maroon */
        --primary-dark: #500000;
        /* Darker maroon */
        --secondary-color: #2c3e50;
        --light-bg: #f8f9fa;
        --dark-bg: #343a40;
    }

    body {
        background-color: #f0f2f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .profile-header {
        /* background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); */
        background: #b3995d;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 20px;
        position: relative;
        margin-bottom: 0;
    }

    .profile-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border: 4px solid white;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .name-section {
        margin-left: 20px;
    }

    .status-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 14px;
        padding: 8px 16px;
        border-radius: 20px;
    }

    .status-active {
        background-color: #ffc107;
        color: #212529;
    }

    .status-graduated {
        background-color: #28a745;
        color: white;
    }

    .status-dropped {
        background-color: #dc3545;
        color: white;
    }

    .status-other {
        background-color: #6c757d;
        color: white;
    }

    .profile-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        overflow: hidden;
    }

    .info-section {
        padding: 30px;
    }

    .info-title {
        color: var(--primary-dark);
        font-weight: 600;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 10px;
    }

    .info-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: var(--primary-color);
    }

    .info-row {
        margin-bottom: 10px;
        padding: 15px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .info-row:hover {
        background-color: rgba(128, 0, 0, 0.05);
    }

    .info-label {
        color: var(--primary-dark);
        font-weight: 600;
    }

    .info-value {
        color: #333;
    }

    .btn-maroon {
        background-color: var(--primary-color);
        color: white;
        border-radius: 50px;
        padding: 8px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-maroon:hover {
        background-color: var(--primary-dark);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(128, 0, 0, 0.3);
    }

    .action-btn {
        border-radius: 50px;
        padding: 8px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .action-btn i {
        margin-right: 5px;
    }

    .card-footer {
        background-color: #f8f9fa;
        border-top: 1px solid #eee;
        padding: 15px 30px;
    }

    .stats-card {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
        text-align: center;
        transition: all 0.3s ease;
        border-top: 3px solid var(--primary-color);
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .stats-icon {
        font-size: 24px;
        margin-bottom: 10px;
        color: var(--primary-color);
    }

    .stats-number {
        font-size: 24px;
        font-weight: 700;
        color: var(--primary-dark);
    }

    .stats-label {
        color: #6c757d;
        font-size: 14px;
    }

    .bg-maroon {
        background-color: var(--primary-color) !important;
    }

    .table-maroon {
        background-color: var(--primary-color);
        color: white;
    }

    .timeline {
        position: relative;
        padding: 20px 0;
    }

    .timeline:before {
        content: '';
        position: absolute;
        top: 0;
        left: 15px;
        height: 100%;
        width: 2px;
        background-color: #e9ecef;
    }

    .timeline-item {
        position: relative;
        padding-left: 40px;
        margin-bottom: 20px;
    }

    .timeline-dot {
        position: absolute;
        left: 6px;
        top: 5px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: var(--primary-color);
        border: 3px solid white;
        z-index: 1;
    }

    .timeline-content {
        background-color: white;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        border-left: 3px solid var(--primary-color);
    }

    .timeline-date {
        color: #6c757d;
        font-size: 14px;
    }

    .timeline-title {
        margin: 5px 0;
        color: var(--primary-dark);
        font-weight: 600;
    }

    .timeline-text {
        color: #333;
        margin-bottom: 0;
    }

    .nav-tabs {
        border-bottom: none;
        margin-bottom: 20px;
    }

    .nav-tabs .nav-link {
        border: none;
        color: #6c757d;
        font-weight: 500;
        padding: 4px 10px;
        border-radius: 50px;
        margin-right: 10px;
        transition: all 0.3s ease;
    }

    .nav-tabs .nav-link:hover {
        color: var(--primary-color);
        background-color: rgba(128, 0, 0, 0.1);
    }

    .nav-tabs .nav-link.active {
        color: white;
        background-color: var(--primary-color);
    }

    .tab-content {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }

    @media (max-width: 767px) {
        .profile-header {
            text-align: center;
            padding-bottom: 30px;
        }

        .profile-img {
            margin-bottom: 20px;
        }

        .name-section {
            margin-left: 0;
        }

        .status-badge {
            position: static;
            display: inline-block;
            margin-top: 10px;
        }
    }
</style>

<!-- Include Bootstrap and Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection --}}