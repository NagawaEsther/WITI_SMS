@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Attendance Report</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('attendance.generate-report') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="course_units_id" class="form-label">Course Unit</label>
                    <select name="course_units_id" id="course_units_id" class="form-control" required>
                        <option value="">Select Course Unit</option>
                        @foreach($courseUnits as $courseunit)
                        <option value="{{ $courseunit->id }}">{{ $courseunit->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Generate Report</button>
            </form>
        </div>
    </div>
</div>
@endsection