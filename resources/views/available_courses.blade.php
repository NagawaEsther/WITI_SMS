{{-- @extends('layouts.app')

@section('content')
<style>
    :root {
        --maroon: #800000;
        --maroon-light: #a52a2a;
        --whitesmoke: #f5f5f5;
        --text-dark: #333333;
    }

    .courses-container {
        max-width: 1200px;
        margin: 0 auto;
        background-color: var(--whitesmoke);
        padding: 20px;
    }

    .page-title {
        color: var(--maroon);
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--maroon);
    }

    .alert {
        padding: 12px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .alert-success {
        background-color: #e8f5e9;
        border-left: 4px solid #4CAF50;
        color: white;
    }

    .alert-info {
        background-color: #e3f2fd;
        border-left: 4px solid #2196F3;
        color: #0d47a1;
    }

    .course-card {
        background-color: white;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        overflow: hidden;
    }

    .course-header {
        display: flex;
        align-items: center;
        padding: 15px;
        background-color: white;
        border-bottom: 1px solid #eee;
    }

    /* .course-thumbnail {
        width: 50px;
        height: 50px;
        border-radius: 4px;
        margin-right: 15px;
        border: 1px solid #eee;
    } */

    .course-thumbnail {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        /* Makes it a perfect circle */
        margin-right: 15px;
        border: 1px solid #eee;
        object-fit: cover;
        /* Ensures the image fills the circle nicely */
    }


    .course-title {
        color: var(--maroon);
        font-size: 18px;
        font-weight: 600;
        margin: 0;
        flex-grow: 1;
    }

    .course-code {
        background-color: var(--whitesmoke);
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 14px;
        color: var(--text-dark);
    }

    .course-content {
        padding: 15px;
    }

    .course-details {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 15px;
    }

    .detail-item {
        margin-bottom: 8px;
    }

    .detail-label {
        font-weight: 600;
        color: var(--text-dark);
        font-size: 14px;
        margin-bottom: 3px;
    }

    .detail-value {
        color: #666;
    }

    .status-badge {
        display: inline-block;
        padding: 3px 8px;
        border-radius: 15px;
        background-color: var(--maroon-light);
        color: white;
        font-size: 13px;
    }

    .course-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 15px;
        background-color: var(--whitesmoke);
        border-top: 1px solid #eee;
    }

    .last-accessed {
        font-size: 13px;
        color: #777;
    }

    .enroll-btn {
        background-color: var(--maroon);
        color: white;
        border: none;
        padding: 6px 15px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .enroll-btn:hover {
        background-color: var(--maroon-light);
    }

    .enrolled-badge {
        background-color: #e8f5e9;
        color: #2e7d32;
        padding: 6px 15px;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 500;
    }

    .description-text {
        margin-bottom: 15px;
        line-height: 1.5;
    }
</style>

<div class="courses-container">
    <h1 class="page-title">Available CourseUnits</h1>



    @foreach($courseUnits as $unit)
    <div class="course-card">
        <div class="course-header">
            <img class="course-thumbnail" src="{{ $unit->thumbnailUrl }}" alt="Thumbnail">
            <h2 class="course-title">{{ $unit->name }}</h2>
            <span class="course-code">{{ $unit->course_unit_code }}</span>
        </div>

        <div class="course-content">
            <p class="description-text">{{ $unit->description }}</p>

            <div class="course-details">
                <div class="detail-item">
                    <div class="detail-label">Semester</div>
                    <div class="detail-value">{{ $unit->semester->name }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Status</div>
                    <div class="detail-value"><span class="status-badge">{{ $unit->status }}</span></div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Credit Units</div>
                    <div class="detail-value">{{ $unit->credit_unit }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Duration</div>
                    <div class="detail-value">{{ $unit->duration }}</div>
                </div>



                <div class="detail-item">
                    <div class="detail-label">Start Date</div>
                    <div class="detail-value">{{ $unit->startDate }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">End Date</div>
                    <div class="detail-value">{{ $unit->endDate }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Total Hours</div>
                    <div class="detail-value">{{ $unit->totalHours }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Total Lessons</div>
                    <div class="detail-value">{{ $unit->totalLessons }}</div>
                </div>

                <div class="detail-item">

                    <div class="detail-label">Lecturer name</div>
                    <div class="detail-value">{{ $unit->lecturer_name }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Instructor</div>
                    <img class="course-thumbnail" src="{{ $unit->lecturer_image }}" alt="Thumbnail">
                </div>
            </div>
        </div>

        <div class="course-footer">
            <span class="last-accessed">Last Accessed: {{ \Carbon\Carbon::now()->diffForHumans() }}</span>

            @if(auth()->user()->courseUnits->contains($unit->id))
            <span class="enrolled-badge">Already Enrolled</span>
            @else
            <form method="POST" action="{{ route('student.enroll', $unit->id) }}">
                @csrf
                <input type="hidden" name="course_unit_id" value="{{ $unit->id }}">
                <button type="submit" class="enroll-btn">Enroll</button>
            </form>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection --}}

{{-- @extends('layouts.app')

@section('content')
<style>
    :root {
        --primary: #800000;
        --primary-light: #a52a2a;
        --primary-dark: #600000;
        --secondary: #1a3a5f;
        --bg-light: #f8f9fa;
        --bg-card: #ffffff;
        --text-dark: #2c3e50;
        --text-muted: #6c757d;
        --border-color: #e9ecef;
        --success: #28a745;
        --info: #17a2b8;
    }



    .courses-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* Page Header */
    .page-header {
        margin-bottom: 30px;
        position: relative;
    }

    .page-title {
        color: black;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        display: inline-block;
    }

    .page-title::after {
        content: "";
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 3px;
        background-color: var(--primary);
    }

    .page-subtitle {
        color: var(--text-muted);
        font-size: 16px;
        max-width: 700px;
    }

    /* Course Grid */
    .course-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(min(100%, 540px), 1fr));
        gap: 25px;
    }

    /* Course Card */
    .course-card {
        background-color: var(--bg-card);
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        position: relative;
    }

    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    /* Course Header */
    .course-header {
        display: flex;
        align-items: center;
        padding: 20px;
        background-color: var(--bg-card);
        border-bottom: 1px solid var(--border-color);
        position: relative;
    }

    .course-thumbnail {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 15px;
        border: 2px solid var(--primary-light);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .course-title-wrapper {
        flex-grow: 1;
    }

    .course-title {
        color: var(--primary-dark);
        font-size: 20px;
        font-weight: 700;
        margin: 0 0 5px 0;
        line-height: 1.3;
    }

    .course-code {
        display: inline-block;
        background-color: rgba(128, 0, 0, 0.1);
        color: var(--primary);
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    /* Course Content */
    .course-content {
        padding: 20px;
    }

    .description-text {
        margin-bottom: 20px;
        line-height: 1.7;
        color: var(--text-dark);
        font-size: 15px;
    }

    /* Course Details */
    .course-details {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
        padding-top: 15px;
        border-top: 1px dashed var(--border-color);
    }

    .detail-item {
        margin-bottom: 8px;
    }

    .detail-label {
        font-weight: 600;
        color: var(--text-muted);
        font-size: 13px;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-value {
        color: var(--text-dark);
        font-size: 15px;
    }

    /* Status Badge */
    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        background-color: green;
        color: white;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    /* Instructor Info */
    .instructor-info {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        background-color: rgba(248, 249, 250, 0.7);
        border-radius: 8px;
        margin-top: 15px;
    }

    .instructor-image {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 12px;
        border: 1px solid var(--border-color);
    }

    .instructor-name {
        font-size: 15px;
        font-weight: 600;
        color: var(--text-dark);
    }

    .instructor-title {
        font-size: 13px;
        color: var(--text-muted);
    }

    /* Course Footer */
    .course-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background-color: rgba(248, 249, 250, 0.5);
        border-top: 1px solid var(--border-color);
        transition: background-color 0.3s ease;
    }

    .course-card:hover .course-footer {
        background-color: rgba(248, 249, 250, 0.9);
    }

    .last-accessed {
        font-size: 13px;
        color: var(--text-muted);
        display: flex;
        align-items: center;
    }

    .last-accessed:before {
        content: "🕒";
        margin-right: 5px;
        font-size: 14px;
    }

    .enroll-btn {
        background-color: var(--primary);
        color: white;
        border: none;
        padding: 8px 18px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        transition: background-color 0.3s, transform 0.2s;
        box-shadow: 0 2px 5px rgba(128, 0, 0, 0.2);
    }

    .enroll-btn:hover {
        background-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(128, 0, 0, 0.3);
    }

    .enrolled-badge {
        background-color: #e8f5e9;
        color: #2e7d32;
        padding: 8px 18px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        display: flex;
        align-items: center;
    }

    .enrolled-badge:before {
        content: "✓";
        margin-right: 5px;
        font-weight: bold;
    }

    /* Alert Styles */
    .alert {
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 25px;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.05);
    }

    .alert-success {
        background-color: #e8f5e9;
        border-left: 4px solid #4CAF50;
        color: white;
    }

    .alert-info {
        background-color: #e3f2fd;
        border-left: 4px solid #2196F3;
        color: #0d47a1;
    }

    /* Course Stats */
    .course-stats {
        display: flex;
        margin-top: 15px;
        gap: 15px;
    }

    .stat-item {
        flex: 1;
        padding: 10px;
        background-color: rgba(248, 249, 250, 0.7);
        border-radius: 8px;
        text-align: center;
    }

    .stat-value {
        font-size: 18px;
        font-weight: 600;
        color: var(--primary);
    }

    .stat-label {
        font-size: 12px;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .course-grid {
            grid-template-columns: 1fr;
        }

        .course-details {
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        }
    }
</style>

<div class="courses-container">
    <div class="page-header">
        <h1 class="page-title">Available Course Units</h1>
        <p class="page-subtitle">Browse through our selection of course units and enroll in the ones that match your
            academic goals.</p>
    </div>


    <div class="course-grid">
        @foreach($courseUnits as $unit)
        <div class="course-card">
            <div class="course-header">
                <img class="course-thumbnail" src="{{ $unit->thumbnailUrl }}" alt="{{ $unit->name }} thumbnail">
                <div class="course-title-wrapper">
                    <h2 class="course-title">{{ $unit->name }}</h2>
                    <span class="course-code">{{ $unit->course_unit_code }}</span>
                </div>
            </div>

            <div class="course-content">
                <p class="description-text">{{ $unit->description }}</p>

                <!-- Course Stats -->
                <div class="course-stats">
                    <div class="stat-item">
                        <div class="stat-value">{{ $unit->credit_unit }}</div>
                        <div class="stat-label">Credits</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">{{ $unit->totalLessons }}</div>
                        <div class="stat-label">Lessons</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">{{ $unit->totalHours }}</div>
                        <div class="stat-label">Hours</div>
                    </div>
                </div>

                <div class="course-details">
                    <div class="detail-item">
                        <div class="detail-label">Semester</div>
                        <div class="detail-value">{{ $unit->semester->name }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Status</div>
                        <div class="detail-value"><span class="status-badge">{{ $unit->status }}</span></div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Duration</div>
                        <div class="detail-value">{{ $unit->duration }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Start Date</div>
                        <div class="detail-value">{{ $unit->startDate }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">End Date</div>
                        <div class="detail-value">{{ $unit->endDate }}</div>
                    </div>
                </div>

                <!-- Instructor Info -->
                <div class="instructor-info">
                    <img class="instructor-image" src="{{ $unit->lecturer_image }}" alt="{{ $unit->lecturer_name }}">
                    <div>
                        <div class="instructor-name">{{ $unit->lecturer_name }}</div>
                        <div class="instructor-title">Course Instructor</div>
                    </div>
                </div>
            </div>

            <div class="course-footer">
                <span class="last-accessed">Last Accessed: {{ \Carbon\Carbon::now()->diffForHumans() }}</span>

                @if(auth()->user()->courseUnits->contains($unit->id))
                <span class="enrolled-badge">Already Enrolled</span>
                @else
                <form method="POST" action="{{ route('student.enroll', $unit->id) }}">
                    @csrf
                    <input type="hidden" name="course_unit_id" value="{{ $unit->id }}">
                    <button type="submit" class="enroll-btn">Enroll Now</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<style>
    /* ===== ROOT VARIABLES ===== */
    :root {
        --primary: #800000;
        --primary-light: #a52a2a;
        --primary-dark: #600000;
        --secondary: #1a3a5f;
        --bg-light: #f8f9fa;
        --bg-card: #ffffff;
        --text-dark: #2c3e50;
        --text-muted: #6c757d;
        --border-color: #e9ecef;
        --success: #28a745;
        --info: #17a2b8;
    }

    /* ===== CONTAINER STYLES ===== */
    .courses-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* ===== PAGE HEADER STYLES ===== */
    .page-header {
        margin-bottom: 30px;
        position: relative;
    }

    .page-title {
        color: black;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        display: inline-block;
    }

    .page-title::after {
        content: "";
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 3px;
        background-color: var(--primary);
    }

    .page-subtitle {
        color: var(--text-muted);
        font-size: 16px;
        max-width: 700px;
    }

    /* ===== COURSE GRID STYLES ===== */
    .course-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(min(100%, 540px), 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    /* ===== COURSE CARD STYLES ===== */
    .course-card {
        background-color: var(--bg-card);
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        position: relative;
    }

    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    /* ===== COURSE HEADER STYLES ===== */
    .course-header {
        display: flex;
        align-items: center;
        padding: 20px;
        background-color: var(--bg-card);
        border-bottom: 1px solid var(--border-color);
        position: relative;
    }

    .course-thumbnail {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 15px;
        border: 2px solid var(--primary-light);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .course-title-wrapper {
        flex-grow: 1;
    }

    .course-title {
        color: var(--primary-dark);
        font-size: 20px;
        font-weight: 700;
        margin: 0 0 5px 0;
        line-height: 1.3;
    }

    .course-code {
        display: inline-block;
        background-color: rgba(128, 0, 0, 0.1);
        color: var(--primary);
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    /* ===== COURSE CONTENT STYLES ===== */
    .course-content {
        padding: 20px;
    }

    .description-text {
        margin-bottom: 20px;
        line-height: 1.7;
        color: var(--text-dark);
        font-size: 15px;
    }

    /* ===== COURSE DETAILS STYLES ===== */
    .course-details {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
        padding-top: 15px;
        border-top: 1px dashed var(--border-color);
    }

    .detail-item {
        margin-bottom: 8px;
    }

    .detail-label {
        font-weight: 600;
        color: var(--text-muted);
        font-size: 13px;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-value {
        color: var(--text-dark);
        font-size: 15px;
    }

    /* ===== STATUS BADGE STYLES ===== */
    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        background-color: green;
        color: white;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    /* ===== INSTRUCTOR INFO STYLES ===== */
    .instructor-info {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        background-color: rgba(248, 249, 250, 0.7);
        border-radius: 8px;
        margin-top: 15px;
    }

    .instructor-image {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 12px;
        border: 1px solid var(--border-color);
    }

    .instructor-name {
        font-size: 15px;
        font-weight: 600;
        color: var(--text-dark);
    }

    .instructor-title {
        font-size: 13px;
        color: var(--text-muted);
    }

    /* ===== COURSE FOOTER STYLES ===== */
    .course-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        background-color: rgba(248, 249, 250, 0.5);
        border-top: 1px solid var(--border-color);
        transition: background-color 0.3s ease;
    }

    .course-card:hover .course-footer {
        background-color: rgba(248, 249, 250, 0.9);
    }

    .last-accessed {
        font-size: 13px;
        color: var(--text-muted);
        display: flex;
        align-items: center;
    }

    .last-accessed:before {
        content: "🕒";
        margin-right: 5px;
        font-size: 14px;
    }

    /* ===== BUTTON STYLES ===== */
    .enroll-btn {
        background-color: var(--primary);
        color: white;
        border: none;
        padding: 8px 18px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        transition: background-color 0.3s, transform 0.2s;
        box-shadow: 0 2px 5px rgba(128, 0, 0, 0.2);
    }

    .enroll-btn:hover {
        background-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(128, 0, 0, 0.3);
    }

    .enrolled-badge {
        background-color: #e8f5e9;
        color: #2e7d32;
        padding: 8px 18px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        display: flex;
        align-items: center;
    }

    .enrolled-badge:before {
        content: "✓";
        margin-right: 5px;
        font-weight: bold;
    }

    /* ===== ALERT STYLES ===== */
    .alert {
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 25px;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.05);
    }

    .alert-success {
        background-color: #e8f5e9;
        border-left: 4px solid #4CAF50;
        color: #2e7d32;
    }

    .alert-info {
        background-color: #e3f2fd;
        border-left: 4px solid #2196F3;
        color: #0d47a1;
    }

    /* ===== COURSE STATS STYLES ===== */
    .course-stats {
        display: flex;
        margin-top: 15px;
        gap: 15px;
    }

    .stat-item {
        flex: 1;
        padding: 10px;
        background-color: rgba(248, 249, 250, 0.7);
        border-radius: 8px;
        text-align: center;
    }

    .stat-value {
        font-size: 18px;
        font-weight: 600;
        color: var(--primary);
    }

    .stat-label {
        font-size: 12px;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* ===== PAGINATION STYLES ===== */
    .pagination-container {
        display: flex;
        justify-content: center;
        margin: 40px 0 20px;
    }

    .pagination {
        display: flex;
        list-style-type: none;
        padding: 0;
        margin: 0;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .page-item {
        border-right: 1px solid var(--border-color);
    }

    .page-item:last-child {
        border-right: none;
    }

    .page-item.active .page-link {
        background-color: var(--primary);
        color: white;
        font-weight: 600;
    }

    .page-item.disabled .page-link {
        color: var(--text-muted);
        pointer-events: none;
        background-color: #f8f9fa;
        cursor: not-allowed;
    }

    .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px 15px;
        color: var(--text-dark);
        text-decoration: none;
        background-color: white;
        transition: background-color 0.3s, color 0.3s;
        min-width: 40px;
        height: 40px;
        text-align: center;
    }

    .page-link:hover {
        background-color: #f1f1f1;
        color: var(--primary-dark);
    }

    /* Pagination Info */
    .pagination-info {
        text-align: center;
        color: var(--text-muted);
        font-size: 14px;
        margin-bottom: 15px;
        padding: 8px;
        background-color: var(--bg-light);
        border-radius: 6px;
    }

    /* ===== RESPONSIVE STYLES ===== */
    @media (max-width: 768px) {
        .course-grid {
            grid-template-columns: 1fr;
        }

        .course-details {
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        }

        /* Simplified pagination for mobile */
        .pagination .page-item:not(.active):not(:first-child):not(:last-child):not(.prev):not(.next) {
            display: none;
        }

        .pagination .page-item.active,
        .pagination .page-item:first-child,
        .pagination .page-item:last-child,
        .pagination .page-item.prev,
        .pagination .page-item.next {
            display: block;
        }
    }
</style>

<div class="courses-container">
    <div class="page-header">
        <h1 class="page-title">Available Course Units</h1>
        <p class="page-subtitle">Browse through our selection of course units and enroll in the ones that match your
            academic goals.</p>
    </div>

    <!-- This would normally display success messages -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Pagination Info Display - with conditional check -->
    <div class="pagination-info">
        @if(method_exists($courseUnits, 'firstItem'))
        Showing {{ $courseUnits->firstItem() ?? 0 }} to {{ $courseUnits->lastItem() ?? 0 }} of {{ $courseUnits->total()
        }} courses
        @else
        Showing {{ count($courseUnits) }} courses
        @endif
    </div>

    <div class="course-grid">
        @foreach($courseUnits as $unit)
        <div class="course-card">
            <div class="course-header">
                <img class="course-thumbnail" src="{{ $unit->thumbnailUrl }}" alt="{{ $unit->name }} thumbnail">
                <div class="course-title-wrapper">
                    <h2 class="course-title">{{ $unit->name }}</h2>
                    <span class="course-code">{{ $unit->course_unit_code }}</span>
                </div>
            </div>

            <div class="course-content">
                <p class="description-text">{{ $unit->description }}</p>

                <!-- Course Stats -->
                <div class="course-stats">
                    <div class="stat-item">
                        <div class="stat-value">{{ $unit->credit_unit }}</div>
                        <div class="stat-label">Credits</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">{{ $unit->totalLessons }}</div>
                        <div class="stat-label">Lessons</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">{{ $unit->totalHours }}</div>
                        <div class="stat-label">Hours</div>
                    </div>
                </div>

                <div class="course-details">
                    <div class="detail-item">
                        <div class="detail-label">Semester</div>
                        <div class="detail-value">{{ $unit->semester->name }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Status</div>
                        <div class="detail-value"><span class="status-badge">{{ $unit->status }}</span></div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Duration</div>
                        <div class="detail-value">{{ $unit->duration }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Start Date</div>
                        <div class="detail-value">{{ $unit->startDate }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">End Date</div>
                        <div class="detail-value">{{ $unit->endDate }}</div>
                    </div>
                </div>

                <!-- Instructor Info -->
                <div class="instructor-info">
                    <img class="instructor-image" src="{{ $unit->lecturer_image }}" alt="{{ $unit->lecturer_name }}">
                    <div>
                        <div class="instructor-name">{{ $unit->lecturer_name }}</div>
                        <div class="instructor-title">Course Instructor</div>
                    </div>
                </div>
            </div>

            <div class="course-footer">
                <span class="last-accessed">Last Accessed: {{ \Carbon\Carbon::now()->diffForHumans() }}</span>

                @if(auth()->user()->courseUnits->contains($unit->id))
                <span class="enrolled-badge">Already Enrolled</span>
                @else
                <form method="POST" action="{{ route('student.enroll', $unit->id) }}">
                    @csrf
                    <input type="hidden" name="course_unit_id" value="{{ $unit->id }}">
                    <button type="submit" class="enroll-btn">Enroll Now</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination Navigation -->
    <div class="pagination-container">
        @if(method_exists($courseUnits, 'links'))
        {{ $courseUnits->links() }}
        @endif
    </div>
</div>
@endsection