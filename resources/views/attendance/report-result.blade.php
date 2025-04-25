@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Attendance Report: {{ $courseunit->name }}</h2>
    <p>Period: {{ $startDate->format('M d, Y') }} to {{ $endDate->format('M d, Y') }}</p>
    <p>Total Sessions: {{ count($qrSessions) }}</p>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>ID</th>
                            <th>Sessions Attended</th>
                            <th>Total Sessions</th>
                            <th>Attendance %</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendanceData as $data)
                        <tr>
                            <td>{{ $data['student']->name }}</td>
                            <td>{{ $data['student']->id }}</td>
                            <td>{{ $data['attended'] }}</td>
                            <td>{{ $data['total'] }}</td>
                            <td>
                                {{ $data['percentage'] }}%
                                @if($data['percentage'] < 70) <span class="badge bg-danger">Below Required</span>
                                    @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <a href="{{ route('attendance.report') }}" class="btn btn-secondary">Back to Report Form</a>
                <button onclick="window.print()" class="btn btn-primary">Print Report</button>
            </div>
        </div>
    </div>
</div>
@endsection