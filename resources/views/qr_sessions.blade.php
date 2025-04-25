{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Active QR Attendance Sessions</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">
        @if($activeSessions->count() > 0)
        @foreach($activeSessions as $session)
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $session->courseunit->name }}</h5>
                    <h6>{{ $session->lecture->title }}</h6>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        {!! QrCode::size(200)->generate(route('attendance.scan', $session->session_code)) !!}
                    </div>
                    <p><strong>Started:</strong> {{ $session->start_time->format('M d, Y H:i') }}</p>
                    <p><strong>Ends:</strong> {{ $session->end_time->format('M d, Y H:i') }}</p>
                    <div class="mt-3">
                        <a href="{{ route('attendance.scan', $session->session_code) }}" class="btn btn-primary">Mark
                            Attendance</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-12">
            <div class="alert alert-info">
                No active attendance sessions found for your enrolled courses.
            </div>
        </div>
        @endif
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">


            @if(isset($qrSession))
            <!-- QR Session Detail View -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Session Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-book me-2"></i><strong>Course Unit:</strong></span>
                                    <span>{{ $qrSession->courseunit->name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-mortarboard me-2"></i><strong>Lecture:</strong></span>
                                    <span>{{ $qrSession->lecture->title }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-clock-history me-2"></i><strong>Started:</strong></span>
                                    <span>{{ $qrSession->start_time->format('M d, Y H:i') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-clock me-2"></i><strong>Ends:</strong></span>
                                    <span>{{ $qrSession->end_time->format('M d, Y H:i') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-circle-fill me-2"></i><strong>Status:</strong></span>
                                    @if($qrSession->is_active && $qrSession->end_time->isFuture())
                                    <span class="badge bg-success rounded-pill">Active</span>
                                    @else
                                    <span class="badge bg-secondary rounded-pill">Closed</span>
                                    @endif
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="bi bi-people me-2"></i><strong>Attendance Count:</strong></span>
                                    <span class="badge bg-primary rounded-pill">{{ $attendanceCount }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <h5 class="fw-bold mb-3">{{ $qrSession->lecture->title }} ({{
                                    $qrSession->courseunit->name }})</h5>
                                <div class="qr-container p-3 border rounded bg-light mb-3">
                                    {!! QrCode::size(200)->generate(route('attendance.scan', $qrSession->session_code))
                                    !!}
                                </div>
                                <p class="text-muted">Scan to record attendance</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <!-- Active Sessions View -->
            @if($activeSessions->count() > 0)
            <div class="text-center mb-4">
                <h2 class="fw-bold">QR Attendance Registration</h2>
                <p class="lead">Scan the QR code to register your attendance for the corresponding session</p>
                <hr class="my-3">
            </div>

            <div class="row g-4">
                @foreach($activeSessions as $session)
                <div class="col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm border-0 hover-shadow">
                        <div class="card-header bg-gradient text-white"
                            style="background-color:white; border:1px solid #800000; ">
                            <h5 class="mb-0">Register Attendance</h5>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="fw-bold text-center mb-3">{{ $session->lecture->title }}</h5>
                            <h6 class="text mb-3" style='color:#800000;'>{{ $session->courseunit->name }}</h6>

                            <div class="mb-4 qr-container p-3 border rounded bg-light">
                                {!! QrCode::size(230)->generate(route('attendance.scan', $session->session_code)) !!}
                            </div>
                            <div class="session-info w-100">
                                <div class="d-flex justify-content-between text-muted mb-2">
                                    <span><i class="bi bi-clock-history me-1"></i> Started:</span>
                                    <span>{{ $session->start_time->format('M d, Y H:i') }}</span>
                                </div>
                                <div class="d-flex justify-content-between text-muted">
                                    <span><i class="bi bi-clock me-1"></i> Ends:</span>
                                    <span>{{ $session->end_time->format('M d, Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light text-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary rounded-pill" style='color:white;'>
                                    <i class="bi bi-qr-code-scan me-1"></i> QR Attendance
                                </span>
                                <small class="text-muted">Session Code: {{ $session->session_code }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="alert alert-info d-flex align-items-center shadow-sm">
                <i class="bi bi-info-circle-fill me-2 fs-4"></i>
                <div>
                    No active attendance sessions found for your enrolled courses.
                </div>
            </div>
            @endif
            @endif
        </div>
    </div>
</div>
@endsection