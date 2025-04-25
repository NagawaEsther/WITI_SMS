{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h4>My Courses</h4>

    <div class="row">
        @if($courseUnits->isEmpty())
        <p>You are not enrolled in any courses yet.</p>
        @else
        <ul class="list-group">
            @foreach($courseUnits as $courseUnit)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <h5>{{ $courseUnit->name }}</h5>
                <p>{{ $courseUnit->course_unit_code }}</p>
                <p>{{ $courseUnit->description }}</p>
                <p>{{ $courseUnit->status }}</p>
                <p>{{ $courseUnit->credit_unit }}</p>
                <p>Thumbnail:<img src={{ $courseUnit->thumbnailUrl }} alt="Thumbnail" width="50" height="50"></p>

                <p>Lecturer Image: <img src="{{ $courseUnit->lecturer_image }}" alt="lecturer_image" width="50"
                        height="50"></p>



                <p>Duration: {{ $courseUnit->duration }}</p>
                <p>Start Date: {{ $courseUnit->startDate }}</p>
                <p>End Date: {{ $courseUnit->endDate }}</p>
                <p>Total hours: {{ $courseUnit->totalHours }}</p>
                <p>Total Lessons: {{ $courseUnit->totalLessons }}</p>

                <p>Last Accessed: {{ \Carbon\Carbon::now()->diffForHumans() }}</p>




                <!-- Unenroll Button -->
                <form action="{{ route('unenroll') }}" method="POST">
                    @csrf
                    <input type="hidden" name="course_unit_id" value="{{ $courseUnit->id }}">
                    <button type="submit" class="btn btn-danger btn-sm">Unenroll</button>
                </form>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
@endsection --}}

{{-- @extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Section with Search -->
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold text-dark" style="font-family: 'Poppins', sans-serif;">
                My Learning Journey
            </h2>
            <span class="badge rounded-pill bg-primary px-3 py-2">
                {{ $courseUnits->count() }} Active Courses
            </span>
        </div>
        <!-- Search Bar -->
        <form action="{{ route('courses.search') }}" method="GET" class="d-flex gap-2">
            @csrf
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0" style="border-radius: 10px 0 0 10px;">
                    <i class="fas fa-search text-muted"></i>
                </span>
                <input type="text" name="search" class="form-control border-start-0"
                    placeholder="Search courses by name or code..."
                    style="border-radius: 0 10px 10px 0; font-size: 0.9rem;" value="{{ request('search') }}">
            </div>
            <button type="submit" class="btn btn-primary rounded-pill px-4" style="font-size: 0.9rem;">
                Search
            </button>
        </form>
    </div>

    <!-- Empty State -->
    @if($courseUnits->isEmpty())
    <div class="card text-center border-0 shadow-sm p-5">
        <div class="card-body">
            <i class="fas fa-book-open fa-3x text-muted mb-3"></i>
            <h5 class="fw-semibold">No Courses Yet</h5>
            <p class="text-muted">Start your learning journey by enrolling in a course today!</p>
            <a href="#" class="btn btn-outline-primary rounded-pill px-4">Explore Courses</a>
        </div>
    </div>
    @else
    <!-- Courses Grid -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($courseUnits as $courseUnit)
        <div class="col">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 15px; max-width: 350px;">
                <!-- Thumbnail Header -->
                <div class="position-relative">
                    <img src="{{ $courseUnit->thumbnailUrl }}" alt="Course Thumbnail" class="card-img-top"
                        style="height: 120px; object-fit: cover;">
                    <span class="position-absolute top-0 end-0 m-2 badge bg-dark bg-opacity-75 small">
                        {{ $courseUnit->course_unit_code }}
                    </span>
                </div>

                <!-- Card Body -->
                <div class="card-body p-3">
                    <h5 class="card-title fw-bold mb-2 text-truncate"
                        style="font-family: 'Poppins', sans-serif; color: #1a1a1a; font-size: 1.1rem;">
                        {{ $courseUnit->name }}
                    </h5>
                    <p class="card-text text-muted mb-2" style="font-size: 0.85rem; line-height: 1.3;">
                        {{ Str::limit($courseUnit->description, 60) }}
                    </p>

                    <!-- Course Details with Larger Font -->
                    <div class="row g-2 mb-2" style="font-size: 0.9rem;">
                        <div class="col-6">
                            <span class="text-muted">Status:</span>
                            <span class="fw-medium text-success ms-1">{{ $courseUnit->status }}</span>
                        </div>
                        <div class="col-6">
                            <span class="text-muted">Credits:</span>
                            <span class="fw-medium ms-1">{{ $courseUnit->credit_unit }}</span>
                        </div>
                        <div class="col-6">
                            <span class="text-muted">Duration:</span>
                            <span class="fw-medium ms-1">{{ $courseUnit->duration }}</span>
                        </div>
                        <div class="col-6 d-flex align-items-center">
                            <span class="text-muted me-1">Progress:</span>
                            <div class="progress w-50" style="height: 5px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 60%;"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Lecturer and Dates Inline -->
                    <div class="d-flex justify-content-between align-items-center mb-2" style="font-size: 0.9rem;">
                        <div class="d-flex align-items-center">
                            <img src="{{ $courseUnit->lecturer_image }}" alt="Lecturer" class="rounded-circle me-1"
                                style="width: 25px; height: 25px; object-fit: cover;">
                            <span class="fw-medium">TBD</span> <!-- Add lecturer name if available -->
                        </div>
                        <span class="text-muted">
                            {{ $courseUnit->startDate }} - {{ $courseUnit->endDate }}
                        </span>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer bg-transparent border-top-0 p-3 pt-0">
                    <div class="d-flex gap-2 align-items-center">
                        <a href="#" class="btn btn-primary flex-grow-1 rounded-pill py-1 px-3"
                            style="font-size: 0.85rem;">
                            <i class="fas fa-play me-1"></i>Continue
                        </a>
                        <form action="{{ route('unenroll') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="course_unit_id" value="{{ $courseUnit->id }}">
                            <button type="submit" class="btn btn-outline-danger rounded-pill p-1"
                                style="width: 35px; height: 35px;"
                                onclick="return confirm('Are you sure you want to unenroll?')">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                    <small class="text-muted d-block mt-1 text-center" style="font-size: 0.8rem;">
                        Last: {{ \Carbon\Carbon::now()->diffForHumans() }}
                    </small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<style>
    /* Custom Styles */
    .card {
        transition: all 0.3s ease;
        background: #fff;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12) !important;
    }

    .card-img-top {
        transition: transform 0.3s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.03);
    }

    h2 {
        letter-spacing: -0.5px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #007bff, #0056b3);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #0056b3, #003d82);
    }

    .progress {
        background: #e9ecef;
        border-radius: 8px;
    }

    .text-truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #007bff;
    }
</style>
@endsection --}}



{{-- @extends('layouts.app')

@section('content')
<div class="container py-5" style="background: #f5f5f5; border-radius: 15px;">
    <div class="container py-5" style="background: #f5f5f5; border-radius: 15px;">
        <!-- Introductory Header -->
        <div class="text-center mb-4" style="margin-top: -61px;">
            <h2 class="fw-bold" style="font-family: 'Poppins', sans-serif; color: black; font-size: 1.8rem;">
                Welcome to Your Learning Hub
            </h2>
            <p style="color: #666; font-size: 1rem;">
                Explore and manage your enrolled course units below.
            </p>
        </div>
        <!-- Header Section with Search -->
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-4">


                <h5 style="font-family:  'Times New Roman', serif; color: rgb(3, 3, 3); font-weight:bold;">
                    My CourseUnits
                </h5>

                <span class="badge rounded-pill px-3 py-2" style="background: white; color: green; font-size: 0.9rem;">
                    {{ $courseUnits->count() }} Active Courses
                </span>
            </div>
            <!-- Search Bar -->
            <form action="{{ route('courses.search') }}" method="GET" class="d-flex gap-2" id="searchForm">
                @csrf
                <div class="input-group shadow-sm" style='width:80%'>
                    <span class="input-group-text border-end-0"
                        style="border-radius: 10px 0 0 10px; background: #f5f5f5; border-color: #8a5858;">
                        <i class="fas fa-search" style="color: #800000;"></i>
                    </span>
                    <input type="text" name="search" class="form-control border-start-0"
                        placeholder="Search courses by name or code..."
                        style="border-radius: 0 10px 10px 0; font-size: 0.9rem; background: #f5f5f5; border-color: #800000; color: #666;"
                        value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn rounded-pill px-4 shadow-sm"
                    style="font-size: 0.9rem; background: maroon; color: white; border: none; margin-left:50px;"
                    id="searchBtn">
                    <span class="spinner-border spinner-border-sm me-2 d-none" role="status" id="spinner"></span>
                    Search
                </button>
            </form>
        </div>

        <!-- Empty State -->
        @if($courseUnits->isEmpty())
        <div class="card text-center border-0 shadow-sm p-5" style="background: #f5f5f5; border-radius: 15px;">
            <div class="card-body">
                <i class="fas fa-book-open fa-3x mb-3" style="color: #800000;"></i>
                <h5 class="fw-semibold" style="color: #800000;">No Courses Yet</h5>
                <p style="color: #666;">Start your learning journey by enrolling in a courseunit today!</p>
                <a href="/student-dashboard/available-courses" class="btn btn-outline rounded-pill px-4 shadow-sm"
                    style="border-color: #800000; color: #800000; font-size: 0.9rem;">
                    Explore Courses
                </a>
            </div>
        </div>
        @else
        <!-- Courses Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($courseUnits as $courseUnit)
            <div class="col">
                <div class="card border-0 shadow-sm overflow-hidden"
                    style="border-radius: 15px; max-width: 350px; background: #f5f5f5; border-left: 4px solid #800000;">
                    <!-- Thumbnail Header -->
                    <div class="position-relative">
                        <img src="{{ $courseUnit->thumbnailUrl }}" alt="Course Thumbnail" class="card-img-top"
                            style="height: 120px; object-fit: cover; border-top-left-radius: 11px; border-top-right-radius: 15px;">
                        <span class="position-absolute top-0 end-0 m-2 badge small"
                            style="background: #800000; color: #f5f5f5;">
                            {{ $courseUnit->course_unit_code }}
                        </span>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-3">
                        <h5 class="card-title fw-bold mb-2 text-truncate"
                            style="font-family: 'Poppins', sans-serif; color: #333; font-size: 1.1rem;"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $courseUnit->name }}">
                            {{ $courseUnit->name }}
                        </h5>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge small px-2 py-1" style=" color: #800000; ">
                                {{ $courseUnit->semester->name ?? 'General' }}
                            </span>
                            <div>
                                <i class="fas fa-star me-1" style="color: #800000;"></i>
                                <span style="font-size: 0.85rem; color: #333;">{{ $courseUnit->course_unit_code?? '4.5'
                                    }}</span>
                            </div>
                        </div>
                        <p class="mb-3" style="font-size: 0.85rem; line-height: 1.4; color: #666;"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $courseUnit->description }}">
                            {{ Str::limit($courseUnit->description, 60) }}
                        </p>

                        <!-- Course Details -->
                        <div class="row g-2 mb-3" style="font-size: 0.9rem; color: #666;">
                            <div class="col-6">
                                <span>Status:</span>
                                <span class="ms-1 badge 
                                        {{ $courseUnit->status === 'Active' ? 'bg-success' : 
                                           ($courseUnit->status === 'Completed' ? 'bg-secondary' : 'bg-warning') }}">
                                    {{ $courseUnit->status }}
                                </span>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <span class="me-1">Progress:</span>
                                <div class="progress w-50" style="height: 6px; background: #fff;">
                                    <div class="progress-bar" role="progressbar" style="width: 60%; background: green;"
                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="ms-1 fw-medium">1%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer border-top-0 p-3 pt-0" style="background: #f5f5f5;">
                        <div class="d-flex gap-2 align-items-center">
                            <a href="#" class="btn flex-grow-2 rounded-pill py-1 px-3 shadow-sm"
                                style="font-size: 0.85rem; background: #f5f5f5; color: #800000; border: 1px solid #800000;">
                                Continue
                            </a>
                            <form action="{{ route('unenroll') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="course_unit_id" value="{{ $courseUnit->id }}">
                                <button type="submit" class="btn rounded-pill py-1 px-3 shadow-sm"
                                    style="font-size: 0.85rem; background: #bfc4c7; color: black; border: none; margin-left:95px;"
                                    onclick="return confirm('Are you sure you want to unenroll?')">
                                    Unenroll
                                </button>

                            </form>
                        </div>
                        <small class="d-block mt-2 text-center" style="font-size: 0.8rem; color: #666;">
                            LastAccessed: {{ \Carbon\Carbon::now()->diffForHumans() }}


                        </small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        @endif
    </div>

    <script>
        function updateLastAccessed() {
        let lastAccessedElement = document.getElementById('last-accessed');
        let lastAccessedTime = new Date();
        
        // Format time in a human-readable way
        let formattedTime = lastAccessedTime.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });

        lastAccessedElement.textContent = `Today at ${formattedTime}`;
    }

    // Update every second
    setInterval(updateLastAccessed, 1000);
    </script>


    <style>
        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .card-img-top {
            transition: transform 0.3s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.03);
        }

        h2 {
            letter-spacing: -0.5px;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #660000;
            /* Darker maroon on hover */
            color: #f5f5f5;
        }

        .btn[style*="background: #f5f5f5"]:hover {
            background: #e0e0e0;
            /* Slightly darker whitesmoke on hover */
            color: #800000;
        }

        .progress {
            border-radius: 8px;
        }

        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(128, 0, 0, 0.25);
            border-color: #800000;
            background: #fff;
        }

        .badge {
            font-weight: 500;
        }

        .shadow-sm {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05) !important;
        }
    </style>

    <script>
        document.getElementById('searchForm').addEventListener('submit', function() {
        document.getElementById('spinner').classList.remove('d-none');
        document.getElementById('searchBtn').setAttribute('disabled', 'true');
    });
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    </script>
    @endsection --}}









    @extends('layouts.app')

    @section('content')
    <div class="container py-5" style="background: #f5f5f5; border-radius: 15px;">
        <div class="container py-5" style="background: #f5f5f5; border-radius: 15px;">
            <!-- Introductory Header -->
            <div class="text-center mb-4" style="margin-top: -61px;">
                <h2 class="fw-bold" style="font-family: 'Poppins', sans-serif; color: black; font-size: 1.8rem;">
                    Welcome to Your Learning Hub
                </h2>
                <p style="color: #666; font-size: 1rem;">
                    Explore and manage your enrolled course units below.
                </p>
            </div>
            <!-- Header Section with Search -->
            <div class="mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    {{-- <h4 class="fw-bold" style="font-family: 'Poppins', sans-serif; color: rgb(58, 53, 53);">
                        My CourseUnits
                    </h4> --}}

                    <h5 style="font-family:  'Times New Roman', serif; color: rgb(3, 3, 3); font-weight:bold;">
                        My CourseUnits
                    </h5>

                    <span class="badge rounded-pill px-3 py-2"
                        style="background: white; color: green; font-size: 0.9rem;">
                        {{ $courseUnits->count() }} Active Courses
                    </span>
                </div>
                <!-- Search Bar -->
                <form action="{{ route('courses.search') }}" method="GET" class="d-flex gap-2" id="searchForm">
                    @csrf
                    <div class="input-group shadow-sm" style='width:80%'>
                        <span class="input-group-text border-end-0"
                            style="border-radius: 10px 0 0 10px; background: #f5f5f5; border-color: #8a5858;">
                            <i class="fas fa-search" style="color: #800000;"></i>
                        </span>
                        <input type="text" name="search" class="form-control border-start-0"
                            placeholder="Search courses by name or code..."
                            style="border-radius: 0 10px 10px 0; font-size: 0.9rem; background: #f5f5f5; border-color: #800000; color: #666;"
                            value="{{ request('search') }}">
                    </div>
                    <button type="submit" class="btn rounded-pill px-4 shadow-sm"
                        style="font-size: 0.9rem; background: maroon; color: white; border: none; margin-left:50px;"
                        id="searchBtn">
                        <span class="spinner-border spinner-border-sm me-2 d-none" role="status" id="spinner"></span>
                        Search
                    </button>
                </form>
            </div>

            <!-- Empty State -->
            @if($courseUnits->isEmpty())
            <div class="card text-center border-0 shadow-sm p-5" style="background: #f5f5f5; border-radius: 15px;">
                <div class="card-body">
                    <i class="fas fa-book-open fa-3x mb-3" style="color: #800000;"></i>
                    <h5 class="fw-semibold" style="color: #800000;">No Courses Yet</h5>
                    <p style="color: #666;">Start your learning journey by enrolling in a courseunit today!</p>
                    <a href="/student-dashboard/available-courses" class="btn btn-outline rounded-pill px-4 shadow-sm"
                        style="border-color: #800000; color: #800000; font-size: 0.9rem;">
                        Explore Courses
                    </a>
                </div>
            </div>
            @else
            <!-- Courses Grid -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($courseUnits as $courseUnit)
                <div class="col">
                    <div class="card border-0 shadow-sm overflow-hidden"
                        style="border-radius: 15px; max-width: 350px; background: #f5f5f5; border-left: 4px solid #800000;">
                        <!-- Thumbnail Header -->
                        <div class="position-relative">
                            <img src="{{ $courseUnit->thumbnailUrl }}" alt="Course Thumbnail" class="card-img-top"
                                style="height: 120px; object-fit: cover; border-top-left-radius: 11px; border-top-right-radius: 15px;">
                            <span class="position-absolute top-0 end-0 m-2 badge small"
                                style="background: #800000; color: #f5f5f5;">
                                {{ $courseUnit->course_unit_code }}
                            </span>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-3">
                            <h5 class="card-title fw-bold mb-2 text-truncate"
                                style="font-family: 'Poppins', sans-serif; color: #333; font-size: 1.1rem;"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $courseUnit->name }}">
                                {{ $courseUnit->name }}
                            </h5>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge small px-2 py-1" style=" color: #800000; ">
                                    {{ $courseUnit->semester->name ?? 'General' }}
                                </span>
                                <div>
                                    <i class="fas fa-star me-1" style="color: #800000;"></i>
                                    <span style="font-size: 0.85rem; color: #333;">{{ $courseUnit->course_unit_code??
                                        '4.5'
                                        }}</span>
                                </div>
                            </div>
                            <p class="mb-3" style="font-size: 0.85rem; line-height: 1.4; color: #666;"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $courseUnit->description }}">
                                {{ Str::limit($courseUnit->description, 60) }}
                            </p>

                            <!-- Course Details -->
                            <div class="row g-2 mb-3" style="font-size: 0.9rem; color: #666;">
                                <div class="col-6">
                                    <span>Status:</span>
                                    {{-- <span class="ms-1 badge 
                                        {{ $courseUnit->status === 'Active' ? 'bg-success' : 
                                           ($courseUnit->status === 'Completed' ? 'bg-secondary' : 'bg-warning') }}">
                                        {{ $courseUnit->status }}
                                    </span> --}}

                                    <span class="ms-1 badge bg-success" style="color: white !important;">
                                        {{ $courseUnit->status }}
                                    </span>

                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <span class="me-1">Progress:</span>
                                    <div class="progress w-50" style="height: 6px; background: #fff;">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: 20%; background: green;" aria-valuenow="60" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                    <span class="ms-1 fw-medium">1%</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer border-top-0 p-3 pt-0" style="background: #f5f5f5;">
                            <div class="d-flex gap-2 align-items-center">
                                <a href="{{ route('/details', $courseUnit->id) }}"
                                    class="btn flex-grow-2 rounded-pill py-1 px-3 shadow-sm"
                                    style="font-size: 0.85rem; background: #f5f5f5; color: #800000; border: 1px solid #800000;">
                                    Continue
                                </a>
                                <form action="{{ route('unenroll') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="course_unit_id" value="{{ $courseUnit->id }}">
                                    <button type="submit" class="btn rounded-pill py-1 px-3 shadow-sm"
                                        style="font-size: 0.85rem; background: #bfc4c7; color: black; border: none; margin-left:95px;"
                                        onclick="return confirm('Are you sure you want to unenroll?')">
                                        Unenroll
                                    </button>

                                </form>






                            </div>
                            <small class="d-block mt-2 text-left" style="font-size: 0.8rem; color: #666;">
                                LastAccessed: {{ \Carbon\Carbon::now()->diffForHumans() }}


                            </small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination (Uncomment if needed) -->
            {{-- @if($courseUnits->hasPages())
            <div class="mt-4">
                {{ $courseUnits->links('pagination::bootstrap-5') }}
            </div>
            @endif --}}
            @endif
        </div>

        <script>
            function updateLastAccessed() {
        let lastAccessedElement = document.getElementById('last-accessed');
        let lastAccessedTime = new Date();
        
        // Format time in a human-readable way
        let formattedTime = lastAccessedTime.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });

        lastAccessedElement.textContent = `Today at ${formattedTime}`;
    }

    // Update every second
    setInterval(updateLastAccessed, 1000);
        </script>


        <style>
            .card {
                transition: all 0.3s ease;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
            }

            .card-img-top {
                transition: transform 0.3s ease;
            }

            .card:hover .card-img-top {
                transform: scale(1.03);
            }

            h2 {
                letter-spacing: -0.5px;
            }

            .btn {
                transition: all 0.3s ease;
            }

            .btn:hover {
                background: #660000;
                /* Darker maroon on hover */
                color: #f5f5f5;
            }

            .btn[style*="background: #f5f5f5"]:hover {
                background: #e0e0e0;
                /* Slightly darker whitesmoke on hover */
                color: #800000;
            }

            .progress {
                border-radius: 8px;
            }

            .text-truncate {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .form-control:focus {
                box-shadow: 0 0 0 0.2rem rgba(128, 0, 0, 0.25);
                border-color: #800000;
                background: #fff;
            }

            .badge {
                font-weight: 500;
            }

            .shadow-sm {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05) !important;
            }
        </style>

        <script>
            document.getElementById('searchForm').addEventListener('submit', function() {
        document.getElementById('spinner').classList.remove('d-none');
        document.getElementById('searchBtn').setAttribute('disabled', 'true');
    });
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
        </script>
        @endsection