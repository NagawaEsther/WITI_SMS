{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Lectures for: {{ $courseUnit->name }}</h3>

    @if($courseUnit->lectures->isEmpty())
    <div class="alert alert-info">
        No lectures are available for this course unit yet.
    </div>
    @else
    @foreach($courseUnit->lectures as $lecture)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $lecture->title }}</h5>
            <p class="card-text">{{ $lecture->description }}</p>
            @if($lecture->file_path)
            <a href="{{ asset('storage/'.$lecture->file_path) }}" class="btn btn-success btn-sm"
                target="_blank">Download File</a>
            @endif
            @if($lecture->video_url)
            <a href="{{ $lecture->video_url }}" class="btn btn-info btn-sm" target="_blank">Watch Video</a>
            @endif
        </div>
        <div class="card-footer text-muted">
            Posted by: {{ $lecture->posted_by }} | {{ $lecture->created_at->format('d M Y') }}
        </div>
    </div>
    @endforeach
    @endif

    <a href="{{ route('/course_units') }}" class="btn btn-secondary mt-3">Back to Course Units</a>
</div>
@endsection

--}}


{{-- lectures

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Clean Header Section -->
    <div class="row align-items-center mb-4">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb" class="mb-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('/course_units') }}" class="text-decoration-none text-secondary">
                            <i class="fas fa-home me-1"></i>Course Units
                        </a>
                    </li>
                    <li class="breadcrumb-item active fw-medium" aria-current="page">{{ $courseUnit->name }}</li>
                </ol>
            </nav>
            <h2 class="fw-bold mb-0">{{ $courseUnit->name }}</h2>
        </div>
        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
            <a href="{{ route('/course_units') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Course Units
            </a>
        </div>
    </div>

    <!-- Empty State - Simple and Clean -->
    @if($courseUnit->lectures->isEmpty())
    <div class="card border-0 rounded-3 shadow-sm p-5 mb-4 text-center bg-light">
        <div class="py-4">
            <div class="mb-3">
                <i class="fas fa-book-open text-secondary" style="font-size: 3.5rem;"></i>
            </div>
            <h4 class="fw-bold mb-3">No lectures available yet</h4>
            <p class="text-muted mb-0 mx-auto" style="max-width: 500px;">Lectures for this course unit will appear here
                once they're added.</p>
        </div>
    </div>
    @else

    <!-- Course Stats Summary - Clean and Organized -->
    <div class="card border-0 rounded-3 shadow-sm mb-4">
        <div class="card-body p-4">
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-book me-3 text-primary" style="font-size: 1.5rem;"></i>
                        <div class="text-start">
                            <div class="text-muted small">Total Lectures</div>
                            <div class="fw-bold fs-5">{{ $courseUnit->lectures->count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 border-start border-end">
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-clock me-3 text-primary" style="font-size: 1.5rem;"></i>
                        <div class="text-start">
                            <div class="text-muted small">Latest Update</div>
                            <div class="fw-bold fs-5">{{
                                $courseUnit->lectures->sortByDesc('created_at')->first()->created_at->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fas fa-file me-3 text-primary" style="font-size: 1.5rem;"></i>
                        <div class="text-start">
                            <div class="text-muted small">Resources</div>
                            <div class="fw-bold fs-5">{{ $courseUnit->lectures->whereNotNull('file_path')->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lectures List Header - Simplified -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">
            <i class="fas fa-list-ul me-2 text-primary"></i>
            <span>Lectures</span>
        </h4>
        <div>
            <select class="form-select form-select-sm" aria-label="Sort by">
                <option selected>Sort by: Latest</option>
                <option value="1">Sort by: Oldest</option>
                <option value="2">Sort by: Title</option>
            </select>
        </div>
    </div>

    <!-- Lectures List - Clean Card Design -->
    <div class="row g-4 mb-5">
        @foreach($courseUnit->lectures as $lecture)
        <div class="col-12">
            <div class="card border-0 rounded-3 shadow-sm h-100">


                <div class="card-body p-4">
                    <div class="row">
                        <!-- Left Content - Clean Typography -->
                        <div class="col-lg-8">
                            <h5 class="card-title fw-bold mb-3">{{ $lecture->title }}</h5>
                            <p class="card-text text-muted mb-4">{{ $lecture->description }}</p>

                            <div class="d-flex flex-wrap text-muted mt-3">
                                <div class="me-4 mb-2">
                                    <i class="fas fa-user me-2 text-secondary"></i>
                                    <span>{{ $lecture->posted_by }}</span>
                                </div>
                                <div class="me-4 mb-2">
                                    <i class="fas fa-calendar-alt me-2 text-secondary"></i>
                                    <span>{{ $lecture->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Content - Clean Button Design -->
                        <div class="col-lg-4 d-flex flex-column justify-content-center mt-4 mt-lg-0">
                            <div class="d-grid gap-2">
                                @if($lecture->file_path)
                                <a href="{{ asset('storage/'.$lecture->file_path) }}" class="btn btn-primary"
                                    target="_blank">
                                    <i class="fas fa-file-download me-2"></i>Download Lecture
                                </a>
                                @endif

                                @if($lecture->video_url)
                                <a href="{{ $lecture->video_url }}" class="btn btn-outline-primary" target="_blank">
                                    <i class="fas fa-play-circle me-2"></i>Watch Video
                                </a>
                                @endif



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- "Looking for more resources" Section - Kept as requested -->
    <div class="card border-0 rounded-3 shadow-sm mt-5 overflow-hidden">
        <div class="card-body p-0">
            <div class="row g-0">
                <div class="col-lg-8 p-4 p-md-5">
                    <h4 class="fw-bold mb-3">Looking for more resources?</h4>
                    <p class="text-muted mb-4">Explore our extensive library of supplementary materials to enhance your
                        learning experience.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-book me-2"></i>Browse Library
                        </a>

                        <a href="mailto:witi@gmail.org" class="btn btn-outline-secondary">
                            <i class="fas fa-question-circle me-2"></i>Get Help
                        </a>

                    </div>
                </div>
                <div class="col-lg-4 bg-light p-4 p-md-5 d-flex flex-column justify-content-center">
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="fas fa-comments text-primary" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Have Feedback?</h5>
                        <p class="text-muted mb-3">We're constantly improving our course materials based on student
                            feedback.</p>

                        <a href="/feedback" class="btn btn-outline-primary">
                            <i class="fas fa-paper-plane me-2"></i>Send Feedback
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Simple Pagination -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    @endif
</div>
@endsection --}}


@extends('layouts.app')

@section('content')
<div class="container  py-5" style="background: #f5f5f5;">
    <div class="container">
        {{-- Header Section --}}
        <div class="row align-items-center mb-5">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('/course_units') }}" class="text-decoration-none text-muted">
                                <i class="fas fa-home me-2"></i>Course Units
                            </a>
                        </li>
                        <li class="breadcrumb-item active fw-bold" aria-current="page">
                            {{ $courseUnit->name }}
                        </li>
                    </ol>
                </nav>

                <div class="d-flex align-items-center">
                    <div class="me-4">
                        <div class="course-unit-thumbnail rounded-circle overflow-hidden"
                            style="width: 60px; height: 60px; background-color: rgba(128, 0, 32, 0.1);">
                            <img src="{{ $courseUnit->thumbnailUrl }}" alt="Course Thumbnail"
                                class="img-fluid w-100 h-100" style="object-fit: cover;">
                        </div>

                    </div>
                    <div>
                        <h4 class="display-6 fw-bold mb-2">{{ $courseUnit->name }}</h4>
                        <p class="text-muted mb-0">Comprehensive learning materials for your academic journey</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <div class="d-flex justify-content-lg-end gap-3">
                    <a href="{{ route('/course_units') }}" class="btn btn-outline-secondary rounded-pill">
                        <i class="fas fa-arrow-left me-2"></i>Back to Course Units
                    </a>
                    <button class="btn btn-primary rounded-pill">
                        <i class="fas fa-filter me-2"></i>Filter
                    </button>
                </div>
            </div>
        </div>

        {{-- Empty State --}}
        @if($courseUnit->lectures->isEmpty())
        <div class="card border-0 rounded-4 shadow-sm text-center py-5 mb-4">
            <div class="card-body">
                <div class="mb-4">
                    <i class="fas fa-book-open text-maroon" style="font-size: 4rem;"></i>
                </div>
                <h3 class="fw-bold mb-3">No Lectures Available</h3>
                <p class="text-muted mx-auto" style="max-width: 400px;">
                    Lectures for this course unit will be added soon. Check back later or contact your instructor.
                </p>
                <a href="#" class="btn btn-primary rounded-pill mt-3">
                    <i class="fas fa-sync me-2"></i>Refresh
                </a>
            </div>
        </div>
        @else
        {{-- Course Stats --}}
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card border-0 rounded-4 shadow-sm p-4 h-100">
                    <div class="d-flex align-items-center">
                        <div class="me-4">
                            <div class="rounded-circle bg-soft-primary p-3">
                                <i class="fas fa-book text-maroon" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-muted large mb-1">Total Lectures</div>
                            <h4 class="fw-bold mb-0">{{ $courseUnit->lectures->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 rounded-4 shadow-sm p-4 h-100">
                    <div class="d-flex align-items-center">
                        <div class="me-4">
                            <div class="rounded-circle bg-soft-primary p-3">
                                <i class="fas fa-clock text-maroon" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-muted large mb-1">Latest Update</div>
                            <h5 class="fw-bold mb-0">
                                {{ $courseUnit->lectures->sortByDesc('created_at')->first()->created_at->format('d M Y')
                                }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 rounded-4 shadow-sm p-4 h-100">
                    <div class="d-flex align-items-center">
                        <div class="me-4">
                            <div class="rounded-circle bg-soft-primary p-3">
                                <i class="fas fa-file text-maroon" style="font-size: 1.5rem;"></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-muted large mb-1">Available Resources</div>
                            <h4 class="fw-bold mb-0">
                                {{ $courseUnit->lectures->whereNotNull('file_path')->count() }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Lectures Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">
                {{-- <i class="fas fa-list-ul me-3 text-primary"></i> --}}
                Available lectures
            </h5>
            <div class="d-flex align-items-center gap-3">
                {{-- <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded-pill" type="button"
                        id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-sort me-2"></i>Sort By
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item" href="#">Latest</a></li>
                        <li><a class="dropdown-item" href="#">Oldest</a></li>
                        <li><a class="dropdown-item" href="#">Title</a></li>
                    </ul>
                </div> --}}
                <div class="search-container">
                    <input type="search" class="form-control rounded-pill" placeholder="Search lectures...">
                    {{-- <i class="fas fa-search search-icon"></i> --}}
                </div>
            </div>
        </div>

        {{-- Lectures List --}}
        <div class="row g-4 mb-5">
            @foreach($courseUnit->lectures as $lecture)
            <div class="col-12">
                <div class="lecture-card card border-0 rounded-4 shadow-sm overflow-hidden">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-lg-9">
                                <h5 class="card-title fw-bold mb-3">{{ $lecture->title }}</h5>
                                <p class="card-text text-muted mb-3 lecture-description">
                                    {{ $lecture->description }}
                                </p>
                                <div class="lecture-meta d-flex flex-wrap text-muted">
                                    <div class="me-4 mb-2">
                                        <i class="fas fa-user me-2 text-secondary"></i>
                                        <span>{{ $lecture->posted_by }}</span>
                                    </div>
                                    {{-- <div class="me-4 mb-2">
                                        <i class="fas fa-user me-2 text-secondary"></i>
                                        <span>{{ $lecture->start_time }}</span>
                                    </div>
                                    <div class="me-4 mb-2">
                                        <i class="fas fa-user me-2 text-secondary"></i>
                                        <span>{{ $lecture->end_time }}</span>
                                    </div> --}}
                                    <div class="me-4 mb-2">
                                        <i class="fas fa-calendar-alt me-2 text-secondary"></i>
                                        <span>{{ $lecture->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 text-lg-end mt-3 mt-lg-0">
                                <div class="d-grid gap-2">
                                    @if($lecture->file_path)
                                    <a href="{{ asset('storage/'.$lecture->file_path) }}"
                                        class="btn btn-primary rounded-pill" target="_blank">
                                        <i class="fas fa-file-download me-2"></i>Download
                                    </a>
                                    @endif
                                    @if($lecture->video_url)
                                    <a href="{{ $lecture->video_url }}" class="btn btn-outline-primary rounded-pill"
                                        target="_blank">
                                        <i class="fas fa-play-circle me-2"></i>Watch
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Resources Section --}}
        <div class="card border-0 rounded-4 shadow-sm overflow-hidden mb-5">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-lg-8 p-4 p-md-5 bg-soft-maroon">
                        <h3 class="fw-bold mb-3 text-maroon">Explore More Resources</h3>
                        <p class="text-muted mb-4" style="font-size: 15px; line-height:1.5;">
                            Enhance your learning with our comprehensive library of supplementary materials,
                            research papers, and additional study resources.
                        </p>
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-primary rounded-pill">
                                <i class="fas fa-book me-2"></i>Browse Library
                            </a>
                            <a href="mailto:support@example.com" class="btn btn-outline-primary rounded-pill">
                                <i class="fas fa-question-circle me-2"></i>Get Support
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 bg-light p-4 p-md-5 d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <div class="mb-3">
                                <i class="fas fa-comments text-maroon" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Your Feedback Matters</h4>
                            <p class="text-muted mb-4" style="font-size:15px; line-height:1.5;">
                                Help us improve by sharing your thoughts and experiences.
                            </p>
                            <a href="/feedback" class="btn btn-outline-primary rounded-pill">
                                <i class="fas fa-paper-plane me-2"></i>Send Feedback
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    .bg-soft-primary {
        background-color: rgba(128, 0, 32, 0.05);
    }

    .lecture-card {
        transition: all 0.3s ease;
    }

    .lecture-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
    }

    .search-container {
        position: relative;
    }

    .search-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
    }

    .lecture-description {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lectureCards = document.querySelectorAll('.lecture-card');
        lectureCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.classList.add('shadow-lg');
            });
            card.addEventListener('mouseleave', function() {
                this.classList.remove('shadow-lg');
            });
        });
    });
</script>
@endpush
@endsection