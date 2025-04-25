{{-- attendance/scan.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">Register Attendance for {{ $lecture->title }}</h2>

    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm p-4">
        <div class="card-body text-center">
            <h5>Scan the QR Code Below</h5>
            <p>Use your device to scan this QR code to register your attendance.</p>
            {!! $qrCode !!}
            <p class="mt-3">Lecture: {{ $lecture->title }}</p>
            {{-- <p>Time: {{ $lecture->start_time ? $lecture->start_time->format('d M Y H:i') : 'Not scheduled' }}</p>
            --}}
        </div>
    </div>
</div>
@endsection