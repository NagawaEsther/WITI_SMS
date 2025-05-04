@extends('layouts.app')

@section('content')
<div class="container py-5" style="background: #f5f5f5;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="text-center mb-4">
                    <h1 class="display-5 fw-bold text-dark mb-3">
                        Explore Resources & Support
                        <div class="mt-2 mx-auto"
                            style="height: 4px; width: 120px; background: linear-gradient(to right, #800020, #ff6b6b);">
                        </div>
                    </h1>
                    <p class="lead text-muted mb-4">
                        Access YouTube tutorials, books, and other resources to enhance your learning
                    </p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form id="search-form" class="search-form">
                            <div class="input-group input-group-lg search-input-container">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="search" id="search-input" class="form-control border-start-0 shadow-none"
                                    placeholder="Search resources by title, description, or category..."
                                    aria-label="Search resources">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                        <div id="loading" style="display: none; text-align: center; margin-top: 10px;">
                            <i class="fas fa-spinner fa-spin"></i> Loading...
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4" id="resources-grid">
            @forelse ($resources as $resource)
            <div class="col-md-6 col-lg-4" style="margin-bottom:30px;">
                <div class="card resource-card h-100 border-0 shadow-sm overflow-hidden">
                    @if ($resource->thumbnail_url)
                    <div class="card-img-top position-relative overflow-hidden">
                        <img src="{{ $resource->thumbnail_url }}" alt="{{ $resource->title }} Thumbnail"
                            class="img-fluid w-100 resource-image"
                            style="height: 200px; object-fit: cover; transition: transform 0.3s ease;">
                        <div class="image-overlay position-absolute top-0 start-0 w-100 h-100"></div>
                    </div>
                    @endif

                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <h5 class="card-title mb-0 text-dark fw-bold">{{ $resource->title }}</h5>
                        </div>
                        <p class="card-text text-muted mb-3 line-clamp">
                            {{ $resource->description ?? 'Access this resource to support your studies.' }}
                        </p>
                        <div class="mb-2">
                            <span class="badge bg-soft-primary text-primary">
                                <i class="fas fa-tag me-1"></i>
                                {{ $resource->type }}
                            </span>
                            <span class="badge bg-soft-success text-success ms-2">
                                <i class="fas fa-folder me-1"></i>
                                {{ $resource->category ?? 'General' }}
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <a href="{{ $resource->url }}" target="_blank"
                                class="btn btn-outline-primary btn-sm rounded-pill">
                                Access Resource
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-footer p-0"
                        style="height: 4px; background: linear-gradient(to right, #800020, #ff6b6b);"></div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No resources available at this time.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #f8f9fa;
    }
    .resource-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
    }
    .resource-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    .resource-image {
        transition: transform 0.3s ease;
    }
    .resource-card:hover .resource-image {
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
    .bg-soft-success {
        background-color: rgba(40, 167, 69, 0.1);
    }
    .btn-primary {
        background-color: #800020 !important;
        border-color: #800020 !important;
    }
    .btn-primary:hover {
        background-color: #ff6b6b !important;
        border-color: #ff6b6b !important;
    }
    #loading {
        color: #800020;
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        console.log('jQuery loaded, version:', $.fn.jquery);

        $('.resource-card').on('mouseenter', function() {
            $(this).addClass('shadow-lg');
        }).on('mouseleave', function() {
            $(this).removeClass('shadow-lg');
        });

        let timeout;
        $('#search-input').on('keyup', function() {
            clearTimeout(timeout);
            $('#loading').show();
            timeout = setTimeout(() => {
                let query = $(this).val();
                console.log('Searching for:', query);
                $.ajax({
                    url: "{{ route('resources.search') }}",
                    method: 'GET',
                    data: { query: query },
                    dataType: 'json',
                    success: function(data) {
                        console.log('Search success:', data);
                        $('#resources-grid').html(data.html);
                        $('#loading').hide();
                    },
                    error: function(xhr, status, error) {
                        console.error('Search error:', status, error, xhr.responseText);
                        $('#resources-grid').html('<div class="col-12 text-center"><p class="text-muted">An error occurred. Please try again.</p></div>');
                        $('#loading').hide();
                    }
                });
            }, 300);
        });

        $('#search-form').on('submit', function(e) {
            e.preventDefault();
            console.log('Form submission prevented');
        });
    });
</script>
@endpush