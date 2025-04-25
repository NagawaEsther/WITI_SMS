{{-- views/course_units

@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Course Units</h2>

    <div class="row">
        @foreach($courseUnits as $unit)
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $unit->name }}</h5>
                    <p class="text-muted">{{ $unit->description ?? '' }}</p>
                    <a href="{{ route('/lectures.by_unit', $unit->id) }}" class="btn btn-primary btn-sm">
                        View Lectures
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection --}}

{{-- views/course_units --}}

{{-- @extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-center fw-bold position-relative mb-4">
                Course Units
                <div class="position-absolute"
                    style="height: 3px; width: 80px; background-color: #800020; bottom: -10px; left: 50%; transform: translateX(-50%);">
                </div>
            </h2>
        </div>
    </div>

    <div class="row g-4">
        @foreach($courseUnits as $unit)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3 d-flex align-items-center justify-content-center rounded-circle"
                            style="width: 36px; height: 36px; background-color: #f9f0f2; border: 1px solid #ecd5d9;">
                            <i class="fas fa-book" style="color: #800020;"></i>
                        </div>

                        <h5 class="card-title mb-0">{{ $unit->name }}</h5>
                    </div>

                    <p class="card-text text-muted mb-3">{{ $unit->description ?? 'Explore lectures and materials for
                        this course unit.' }}</p>

                    <div class="mt-auto text-end">
                        <a href="{{ route('/lectures.by_unit', $unit->id) }}" class="btn btn-light border"
                            style="border-radius: 6px; padding: 6px 16px;">
                            <span>View Lectures</span>
                            <i class="fas fa-arrow-right ms-2" style="color: #800020;"></i>
                        </a>
                    </div>
                </div>
                <div class="card-footer p-0" style="height: 3px; background-color: #800020; opacity: 0.7;"></div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection



<style>
    .card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
    }

    .btn:hover {
        border-color: #800020 !important;
        background-color: #f9f0f2 !important;
    }

    h2 {
        color: #333;
    }
</style> --}}



@extends('layouts.app')

@section('content')
<div class="container py-5 " style="background: #f5f5f5;">
    <div class=" container">
        {{-- Search and Header Section --}}
        <div class="row mb-5">
            <div class="col-12">
                <div class="text-center mb-4">
                    <h1 class="display-5 fw-bold text-dark mb-3">
                        Explore Your Lectures
                        <div class="mt-2 mx-auto"
                            style="height: 4px; width: 120px; background: linear-gradient(to right, #800020, #ff6b6b);">
                        </div>
                    </h1>
                    <p class="lead text-muted mb-4">
                        Discover comprehensive learning paths tailored to your academic journey
                    </p>
                </div>

                {{-- Advanced Search Bar --}}
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('courses.search') }}" method="GET" class="search-form">
                            <div class="input-group input-group-lg search-input-container">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="search" name="query" class="form-control border-start-0 shadow-none"
                                    placeholder="Search course units by name or description..."
                                    aria-label="Search course units">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Course Units Grid --}}
        <div class="row g-4">
            @foreach($courseUnits as $unit)
            <div class="col-md-6 col-lg-4" style="margin-bottom:30px;">
                <div class="card course-unit-card h-100 border-0 shadow-sm overflow-hidden  ">
                    {{-- Thumbnail Section --}}
                    @if($unit->thumbnailUrl)
                    <div class="card-img-top position-relative overflow-hidden">
                        <img src="{{ $unit->thumbnailUrl }}" alt="{{ $unit->name }} Thumbnail"
                            class="img-fluid w-100 course-unit-image"
                            style="height: 200px; object-fit: cover; transition: transform 0.3s ease;">
                        <div class="image-overlay position-absolute top-0 start-0 w-100 h-100"></div>
                    </div>
                    @endif

                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <h5 class="card-title mb-0 text-dark fw-bold">{{ $unit->name }}</h5>
                        </div>

                        <p class="card-text text-muted mb-3 line-clamp">
                            {{ $unit->description ?? 'Explore comprehensive lectures and learning materials for this
                            course unit.' }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            {{-- <span class="badge bg-soft-primary text-primary">
                                <i class="fas fa-clock me-1"></i>

                                {{ $unit->lectures->count() }}

                            </span> --}}
                            <span class="badge bg-soft-success text-success">
                                <i class="fas fa-clock me-1"></i>
                                <span class="pop-number">
                                    {{ $unit->lectures->count() }}
                                </span>
                            </span>

                            <a href="{{ route('/lectures.by_unit', $unit->id) }}"
                                class="btn btn-outline-primary btn-sm rounded-pill">
                                View Lectures
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-footer p-0"
                        style="height: 4px; background: linear-gradient(to right, #800020, #ff6b6b);"></div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        {{-- @if($courseUnits->hasPages())
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                {{ $courseUnits->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
        @endif --}}
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Advanced Styling */
    body {
        background-color: #f8f9fa;
    }

    .course-unit-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
    }

    .course-unit-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .course-unit-image {
        transition: transform 0.3s ease;
    }

    .course-unit-card:hover .course-unit-image {
        transform: scale(1.05);
    }

    .image-overlay {
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5));
    }

    .line-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    @keyframes popEffect {
        0% {
            transform: scale(1);
            opacity: 0;
        }

        50% {
            transform: scale(1.2);
            opacity: 1;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .pop-number {
        display: inline-block;
        animation: popEffect 0.5s ease forwards !important;
    }


    .search-form {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 50px;
    }

    .search-input-container {
        border-radius: 50px;
        overflow: hidden;
    }

    .bg-soft-primary {
        background-color: rgba(128, 0, 32, 0.1);
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Optional: Add some interactivity
        const courseCards = document.querySelectorAll('.course-unit-card');
        courseCards.forEach(card => {
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