{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h2>QR Attendance Session</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Session Details</h5>
                </div>
                <div class="card-body">
                    <p><strong>Course Unit:</strong> {{ $qrSession->courseunit->name }}</p>
                    <p><strong>Lecture:</strong> {{ $qrSession->lecture->title }}</p>
                    <p><strong>Started:</strong> {{ $qrSession->start_time->format('M d, Y H:i') }}</p>
                    <p><strong>Ends:</strong> {{ $qrSession->end_time->format('M d, Y H:i') }}</p>
                    <p><strong>Status:</strong>
                        @if($qrSession->is_active && $qrSession->end_time->isFuture())
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-secondary">Closed</span>
                        @endif
                    </p>
                    <p><strong>Attendance Count:</strong> {{ $attendanceCount }}</p>

                    <div class="mt-3">
                        @if($qrSession->is_active && $qrSession->end_time->isFuture())
                        <form action="{{ route('qr-sessions.close', $qrSession) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-warning">Close Session</button>
                        </form>
                        @endif

                        <a href="{{ route('qr-sessions.index') }}" class="btn btn-secondary">Back to List</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>QR Code</h5>
                </div>
                <div class="card-body text-center">
                    @if($qrSession->is_active && $qrSession->end_time->isFuture())
                    <div class="mb-3">
                        {!! $qrCode !!}
                    </div>
                    <p>Students can scan this QR code to mark their attendance</p>
                    <p><small>Session Code: {{ $qrSession->session_code }}</small></p>
                    <div class="alert alert-info">
                        Share this link with students: <br>
                        <a href="{{ route('attendance.scan', $qrSession->session_code) }}">
                            {{ route('attendance.scan', $qrSession->session_code) }}
                        </a>
                    </div>
                    @else
                    <div class="alert alert-warning">
                        This session is closed. QR code is no longer active.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>QR Attendance Session</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Session Details</h5>
                </div>
                <div class="card-body">
                    <p><strong>Course Unit:</strong> {{ $qrSession->courseunit->name }}</p>
                    <p><strong>Lecture:</strong> {{ $qrSession->lecture->title }}</p>
                    <p><strong>Started:</strong> {{ $qrSession->start_time->format('M d, Y H:i') }}</p>
                    <p><strong>Ends:</strong> {{ $qrSession->end_time->format('M d, Y H:i') }}</p>
                    <p><strong>Status:</strong>
                        @if($qrSession->is_active && $qrSession->end_time->isFuture())
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-secondary">Closed</span>
                        @endif
                    </p>
                    <p><strong>Attendance Count:</strong> <span id="attendance-count">{{ $attendanceCount }}</span></p>

                    <div class="mt-3">
                        @if($qrSession->is_active && $qrSession->end_time->isFuture())
                        <form action="{{ route('qr-sessions.close', $qrSession) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-warning">Close Session</button>
                        </form>
                        @endif

                        <a href="{{ route('qr-sessions.index') }}" class="btn btn-secondary">Back to List</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>QR Code</h5>
                </div>
                <div class="card-body text-center">
                    @if($qrSession->is_active && $qrSession->end_time->isFuture())
                    <div class="mb-3">
                        {!! $qrCode !!}
                    </div>
                    <p>Students can scan this QR code to mark their attendance</p>
                    <p><small>Session Code: {{ $qrSession->session_code }}</small></p>
                    <div class="alert alert-info">
                        Share this link with students: <br>
                        <a href="{{ route('attendance.scan', $qrSession->session_code) }}">
                            {{ route('attendance.scan', $qrSession->session_code) }}
                        </a>
                    </div>
                    @else
                    <div class="alert alert-warning">
                        This session is closed. QR code is no longer active.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Live Attendance Table -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Live Attendance Register</h5>
                    <button id="refresh-btn" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-sync-alt"></i> Refresh
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Registration Number</th>
                                    <th>Check-in Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="attendance-tbody">
                                @foreach($attendances as $index => $attendance)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $attendance->student->user->first_name }} {{
                                        $attendance->student->user->last_name }}</td>
                                    <td>{{ $attendance->student->reg_number }}</td>
                                    <td>{{ $attendance->created_at->format('H:i:s') }}</td>
                                    <td>
                                        <span class="badge bg-success" style='color:white;'>Present</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if(count($attendances) == 0)
                    <div id="no-records" class="text-center py-3">
                        <p class="text-muted">No attendance records yet</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sessionId = "{{ $qrSession->id }}";
        const isActive = {{ $qrSession->is_active && $qrSession->end_time->isFuture() ? 'true' : 'false' }};
        
        if (isActive) {
            // Set up automatic refresh every 30 seconds
            const refreshInterval = setInterval(fetchAttendanceData, 30000);
            
            // Manual refresh button
            document.getElementById('refresh-btn').addEventListener('click', fetchAttendanceData);
            
            // Function to fetch attendance data via AJAX
            function fetchAttendanceData() {
                fetch(`/api/qr-sessions/${sessionId}/attendances`)
                    .then(response => response.json())
                    .then(data => {
                        updateAttendanceTable(data.attendances);
                        document.getElementById('attendance-count').textContent = data.attendances.length;
                    })
                    .catch(error => console.error('Error fetching attendance data:', error));
            }
            
            // Function to update the attendance table
            function updateAttendanceTable(attendances) {
                const tbody = document.getElementById('attendance-tbody');
                const noRecords = document.getElementById('no-records');
                
                // Clear existing table rows
                tbody.innerHTML = '';
                
                if (attendances.length > 0) {
                    // Hide "no records" message if it exists
                    if (noRecords) {
                        noRecords.style.display = 'none';
                    }
                    
                    // Add new rows
                    attendances.forEach((attendance, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${attendance.student.name}</td>
                            <td>${attendance.student.registration_number}</td>
                            <td>${formatTime(attendance.created_at)}</td>
                            <td><span class="badge bg-success">Present</span></td>
                        `;
                        tbody.appendChild(row);
                    });
                } else if (noRecords) {
                    noRecords.style.display = 'block';
                }
            }
            
            // Helper function to format time
            function formatTime(dateTimeString) {
                const date = new Date(dateTimeString);
                return date.toTimeString().split(' ')[0]; // Returns HH:MM:SS
            }
        }
    });
</script>
@endsection