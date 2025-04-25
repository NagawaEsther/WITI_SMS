@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary: #800000;
        --primary-light: rgba(128, 0, 0, 0.1);
        --secondary: #333333;
        --accent: #4a8747;
        --light-bg: #f8f9fa;
        --card-bg: #ffffff;
        --text-dark: #333333;
        --text-muted: #6c757d;
        --border-radius-lg: 12px;
        --border-radius-md: 8px;
        --border-radius-sm: 5px;
        --shadow: 0 4px 10px rgba(0, 0, 0, 0.07);
    }

    body {
        /* font-family: 'Segoe UI', 'Roboto', sans-serif;
            background: var(--light-bg); */
        /* color: var(--text-dark); */
        /* line-height: 1.6; */
    }

    .card {
        border: none;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow);
        background: var(--card-bg);
        transition: transform 0.2s, box-shadow 0.2s;
        margin-bottom: 20px;
    }

    .card:hover {
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .btn-primary:hover {
        background-color: #660000;
        border-color: #660000;
    }

    .btn-outline-primary {
        color: var(--primary);
        border-color: var(--primary);
    }

    .btn-outline-primary:hover {
        background-color: var(--primary);
        color: white;
    }

    .nav-link {
        color: var(--text-dark);
        padding: 0.75rem 1rem;
        border-radius: var(--border-radius-sm);
    }

    .nav-link:hover,
    .nav-link.active {
        background-color: var(--primary-light);
        color: var(--primary);
    }

    .course-banner {
        height: 220px;
        /* border-radius: var(--border-radius-lg) var(--border-radius-lg) 0 0; */
        position: relative;
        overflow: hidden;
        background-color: maroon;
    }

    .banner-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* background: linear-gradient(rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.6)); */
        background: linear-gradient(rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.9));
        display: flex;
        align-items: flex-end;
        padding: 1.5rem;
    }

    .progress {
        height: 8px;
        border-radius: 4px;
        background-color: #e9ecef;
    }

    .progress-bar {
        background-color: var(--accent);
    }

    .module-item {
        border-radius: var(--border-radius-md);
        padding: 1rem;
        margin-bottom: 0.75rem;
        transition: background-color 0.2s;
        border-left: 3px solid transparent;
    }

    .module-item:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .module-item.active {
        background-color: var(--primary-light);
        border-left-color: var(--primary);
    }

    .resource-item {
        display: flex;
        align-items: center;
        padding: 0.75rem;
        border-radius: var(--border-radius-sm);
        margin-bottom: 0.5rem;
        transition: background-color 0.2s;
    }

    .resource-item:hover {
        background-color: rgba(0, 0, 0, 0.03);
    }

    .video-container {
        position: relative;
        border-radius: var(--border-radius-md);
        overflow: hidden;
        padding-top: 56.25%;
        /* 16:9 aspect ratio */
        background-color: #000;
    }

    .video-thumbnail {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .play-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 60px;
        background-color: rgba(128, 0, 0, 0.8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .play-button:hover {
        transform: translate(-50%, -50%) scale(1.1);
    }

    .code-block {
        background-color: #f8f9fa;
        color: #333;
        border-radius: var(--border-radius-md);
        padding: 1rem;
        overflow-x: auto;
        border-left: 4px solid var(--accent);
    }

    .code-block pre {
        margin-bottom: 0;
        font-size: 0.9rem;
    }

    .code-comment {
        color: #228B22;
    }

    .stats-item {
        background: var(--card-bg);
        border-radius: var(--border-radius-md);
        padding: 1rem;
        text-align: center;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .comment {
        margin-bottom: 1.5rem;
    }

    .comment-reply {
        margin-left: 3rem;
        margin-top: 1rem;
    }

    .avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
    }

    .avatar-sm {
        width: 35px;
        height: 35px;
    }

    .badge-primary {
        background-color: var(--primary);
        color: white;
    }

    .badge-secondary {
        background-color: #e9ecef;
        color: var(--text-dark);
    }

    .sticky-sidebar {
        position: sticky;
        top: 20px;
    }

    .instructor-badge {
        border: 1px solid var(--primary);
        border-radius: 20px;
        padding: 2px 10px;
        color: var(--primary) !important;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .module-icon {
        color: var(--primary);
    }

    .resource-icon {
        color: var(--primary);
    }

    .stats-icon {
        color: var(--primary);
        opacity: 0.9;
    }

    .task-badge {
        background-color: var(--primary);
        color: white;
        font-size: 0.75rem;
        padding: 0.25rem 0.75rem;
    }

    .key-concepts {
        border-left: 4px solid var(--primary);
        background-color: rgba(128, 0, 0, 0.03);
    }

    .lesson-nav-btn {
        border-radius: 30px;
        padding: 0.5rem 1.2rem;
    }

    /* Exam tabs and items styles */
    .exam-tab {
        cursor: pointer;
        padding: 0.5rem 1rem;
        border-radius: var(--border-radius-sm);
        transition: background-color 0.2s;
    }

    .exam-tab:hover {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .exam-tab.active {
        background-color: var(--primary-light);
        color: var(--primary);
        font-weight: 500;
    }

    .exam-item {
        padding: 1rem;
        border-radius: var(--border-radius-md);
        background-color: rgba(0, 0, 0, 0.02);
        margin-bottom: 1rem;
    }

    .collapsed-content {
        display: none;
    }
</style>

<div class="container-fluid py-4">
    <div class="row g-4">
        <!-- Course Header -->
        <div class="col-12">
            <div class="card mb-4">
                <div class="course-banner">
                    <img src="{{ $courseUnit->thumbnailUrl }}" alt="Course Banner" class="w-100 h-100 object-fit-cover">
                    <div class="banner-overlay">
                        <div class="container-fluid">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-light text-dark px-3 py-2 rounded-pill">{{
                                    $courseUnit->course_unit_code }}</span>
                                <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                                    <i class="far fa-calendar-alt me-1"></i> {{ $courseUnit->duration }}
                                </span>
                            </div>
                            <h2 class="text-dark fw-bold mb-2">{{ $courseUnit->name }}</h2>
                            <h6 class="text-dark mb-2">{{ $courseUnit->description }}</h6>
                            <div class="d-flex align-items-center">
                                <img src="{{ $courseUnit->lecturer_image }}" alt="lecturer_image" class="avatar-sm me-2"
                                    style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                                <span class="instructor-badge" style='margin-left:25px;'>{{ $courseUnit->lecturer_name
                                    }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Left Sidebar - Course Navigation -->
        <div class="col-lg-3">
            <div class="sticky-sidebar">
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">Your Progress</h5>
                        <div class="d-flex align-items-center mb-2">
                            <div class="progress flex-grow-1 me-3">
                                <div class="progress-bar" role="progressbar" style="width: 35%;" aria-valuenow="35"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="fw-semibold text-success">35%</span>
                        </div>
                        <div class="d-flex justify-content-between small mt-2">
                            <span class="text-muted">4 of 12 modules complete</span>
                            <span class="text-primary fw-semibold">8 remaining</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">Course Modules</h5>
                            <button type="button" class="btn btn-sm btn-primary" onclick="openModulesModal() ">
                                See All
                            </button>
                        </div>
                        <div class="nav flex-column">
                            @forelse ($modules as $module)
                            <div class="module-item {{ $module->status === 'current' ? 'active' : '' }}">
                                <div class="d-flex align-items-center" style='gap:10px;'>
                                    <i class="fas {{ $module->icon ?? 'fa-play-circle' }} me-3 module-icon"></i>
                                    <div>
                                        <div class="fw-semibold">{{ $module->title }}</div>
                                        <div class="text-muted small">
                                            {{ $module->lesson_count }} lessons • {{ $module->duration }}
                                        </div>
                                    </div>
                                    @if ($module->status === 'completed')
                                    <i class="fas fa-check-circle text-success ms-auto"></i>
                                    @elseif ($module->status === 'current')
                                    <span class="badge bg-warning text-dark rounded-pill px-2 ms-auto">Current</span>
                                    @elseif ($module->status === 'locked')
                                    <span class="badge bg-light text-muted rounded-pill px-2 ms-auto">Locked</span>
                                    @endif
                                </div>
                            </div>
                            @empty
                            <div class="text-muted">No modules available for this course unit.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for All Modules -->
        <div class="modal fade" id="allModulesModal" tabindex="-1" aria-labelledby="allModulesModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="allModulesModalLabel">All Course Modules</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="nav flex-column">
                            @forelse ($modules as $module)
                            <div class="module-item {{ $module->status === 'current' ? 'active' : '' }} mb-3">
                                <div class="d-flex align-items-center" style='gap:10px;'>
                                    <i class="fas {{ $module->icon ?? 'fa-play-circle' }} me-3 module-icon"></i>
                                    <div>
                                        <div class="fw-semibold">{{ $module->title }}</div>
                                        <div class="text-muted small">
                                            {{ $module->lesson_count }} lessons • {{ $module->duration }}
                                        </div>
                                    </div>
                                    @if ($module->status === 'completed')
                                    <i class="fas fa-check-circle text-success ms-auto"></i>
                                    @elseif ($module->status === 'current')
                                    <span class="badge bg-warning text-dark rounded-pill px-2 ms-auto">Current</span>
                                    @elseif ($module->status === 'locked')
                                    <span class="badge bg-light text-muted rounded-pill px-2 ms-auto">Locked</span>
                                    @endif
                                </div>
                            </div>
                            @empty
                            <div class="text-muted">No modules available for this course unit.</div>
                            @endforelse
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Center Content Area - Current Lesson -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold">Module 5: Advanced OOP</h4>
                        <div>
                            <button class="btn btn-sm btn-outline-primary rounded-circle me-2" title="Bookmark">
                                <i class="far fa-bookmark"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-primary rounded-circle" title="Download">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    </div>

                    <div class="video-container mb-4 position-relative"
                        style="padding-bottom: 56.25%; height: 0; overflow: hidden;">
                        <iframe src="https://www.youtube.com/embed/k7LSFYyBZUs" frameborder="0" allowfullscreen
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                        </iframe>
                    </div>

                    <!-- Lesson Content -->
                    <div>
                        <h5 class="fw-bold mb-3">Lesson 1: Polymorphism in Practice</h5>

                        <p class="mb-4" style='line-height:1.6;'>
                            Polymorphism is one of the core principles of object-oriented programming that allows
                            objects of different classes to be treated as objects of a common superclass. The word
                            "poly" means many and
                            "morph" means forms, so polymorphism refers to the ability of an object to take on many
                            forms.
                        </p>

                        <div class="card mb-4 key-concepts">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3 text-primary">Key Concepts</h6>
                                <ul class="mb-0 ps-3">
                                    <li class="mb-2">Method overriding vs method overloading</li>
                                    <li class="mb-2">Runtime polymorphism using virtual methods</li>
                                    <li class="mb-2">Abstract classes and interfaces</li>
                                    <li>Implementing polymorphic behavior in real applications</li>
                                </ul>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-3">Code Example</h6>
                        <div class="code-block mb-4">
                            <pre><span class="code-comment">// Example of polymorphism</span>
abstract class Shape {
    protected $color;
    
    public function __construct($color) {
        $this->color = $color;
    }
    
    <span class="code-comment">// Abstract method to be implemented by subclasses</span>
    abstract public function calculateArea();
    
    public function getColor() {
        return $this->color;
    }
}

class Circle extends Shape {
    private $radius;
    
    public function __construct($color, $radius) {
        parent::__construct($color);
        $this->radius = $radius;
    }
    
    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    private $width;
    private $height;
    
    public function __construct($color, $width, $height) {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }
    
    public function calculateArea() {
        return $this->width * $this->height;
    }
}

<span class="code-comment">// Using polymorphism</span>
$shapes = [
    new Circle('red', 5),
    new Rectangle('blue', 4, 6)
];

foreach ($shapes as $shape) {
    echo "Shape color: " . $shape->getColor() . "\n";
    echo "Shape area: " . $shape->calculateArea() . "\n\n";
}</pre>
                        </div>

                        <h6 class="fw-bold mb-3">Learning Outcomes</h6>
                        <div class="d-flex flex-column gap-2 mb-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle me-2 text-success"></i>
                                <span>Understand how polymorphism enables code reusability</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle me-2 text-success"></i>
                                <span>Implement polymorphic behavior in your own code</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="far fa-circle me-2 text-muted"></i>
                                <span>Apply polymorphism to solve complex programming problems</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="far fa-circle me-2 text-muted"></i>
                                <span>Design flexible and maintainable object hierarchies</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lesson Navigation -->
                    <div class="d-flex justify-content-between mt-5">
                        <button class="btn btn-light lesson-nav-btn">
                            <i class="fas fa-arrow-left me-2"></i> Previous Lesson
                        </button>
                        <button class="btn btn-primary lesson-nav-btn">
                            Next Lesson <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tests and Exams Section -->
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Tests and Exams</h5>

                    <!-- Exam Section Tabs -->
                    <div class="d-flex mb-4">
                        <div class="exam-tab active me-3" data-target="upcoming">
                            <i class="fas fa-calendar-alt me-2"></i> Upcoming
                        </div>
                        <div class="exam-tab me-3" data-target="current">
                            <i class="fas fa-edit me-2"></i> Current
                        </div>
                        <div class="exam-tab" data-target="past-papers">
                            <i class="fas fa-history me-2"></i> Past Papers
                        </div>
                    </div>

                    <!-- Upcoming Exams -->
                    <div id="upcoming-exams" class="mb-4">
                        <div class="exam-item">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fw-bold mb-0">Mid-Term Examination</h6>
                                <span class="badge bg-warning text-dark">April 20, 2025</span>
                            </div>
                            <p class="text-muted mb-2 small">Topics: Modules 1-5 (OOP Principles, Data Structures,
                                Algorithms)</p>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-light text-dark me-2">Duration: 2 hours</span>
                                <span class="badge bg-light text-dark">Weight: 30%</span>
                            </div>
                        </div>

                        <div class="exam-item">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fw-bold mb-0">Weekly Quiz #5</h6>
                                <span class="badge bg-danger text-white">April 17, 2025</span>
                            </div>
                            <p class="text-muted mb-2 small">Topics: Polymorphism, Abstract Classes, Interfaces</p>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-light text-dark me-2">Duration: 30 minutes</span>
                                <span class="badge bg-light text-dark">Weight: 5%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Current Exams (Initially Hidden) -->
                    <div id="current-exams" class="mb-4 collapsed-content">
                        <div class="exam-item">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fw-bold mb-0">Module 5 Assessment</h6>
                                <span class="badge bg-success text-white">Available Now</span>
                            </div>
                            <p class="text-muted mb-2 small">Topics: Advanced OOP Concepts</p>
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-light text-dark me-2">Duration: 60 minutes</span>
                                <span class="badge bg-light text-dark me-2">Attempts: 1/2</span>
                                <span class="badge bg-light text-dark">Due: Today, 11:59 PM</span>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">Start Exam</button>
                            </div>
                        </div>
                    </div>

                    <!-- Past Papers (Initially Hidden) -->
                    <div id="past-papers" class="mb-4 collapsed-content">
                        <div class="exam-item">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fw-bold mb-0">2024 Final Examination</h6>
                                <div>
                                    <a href="#" class="btn btn-sm btn-outline-primary"><i
                                            class="fas fa-download me-1"></i> Questions</a>
                                    <a href="#" class="btn btn-sm btn-outline-primary ms-2"><i
                                            class="fas fa-download me-1"></i> Solutions</a>
                                </div>
                            </div>
                            <p class="text-muted mb-0 small">Topics: All modules, comprehensive assessment</p>
                        </div>

                        <div class="exam-item">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fw-bold mb-0">2024 Mid-Term Examination</h6>
                                <div>
                                    <a href="#" class="btn btn-sm btn-outline-primary"><i
                                            class="fas fa-download me-1"></i> Questions</a>
                                    <a href="#" class="btn btn-sm btn-outline-primary ms-2"><i
                                            class="fas fa-download me-1"></i> Solutions</a>
                                </div>
                            </div>
                            <p class="text-muted mb-0 small">Topics: Modules 1-5</p>
                        </div>

                        <div class="exam-item">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fw-bold mb-0">2023 Final Examination</h6>
                                <div>
                                    <a href="#" class="btn btn-sm btn-outline-primary"><i
                                            class="fas fa-download me-1"></i> Questions</a>
                                    <a href="#" class="btn btn-sm btn-outline-primary ms-2"><i
                                            class="fas fa-download me-1"></i> Solutions</a>
                                </div>
                            </div>
                            <p class="text-muted mb-0 small">Topics: All modules, comprehensive assessment</p>
                        </div>

                        <div class="exam-item">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="fw-bold mb-0">Practice Quiz Bundle</h6>
                                <div>
                                    <a href="#" class="btn btn-sm btn-outline-primary"><i
                                            class="fas fa-download me-1"></i> Download</a>
                                </div>
                            </div>
                            <p class="text-muted mb-0 small">Collection of practice quizzes for exam preparation</p>
                        </div>
                    </div>

                    <!-- Show Discussion section button -->
                    <div class="text-center mt-4">
                        <button class="btn btn-outline-primary" id="show-discussion">
                            <i class="fas fa-comments me-2"></i> Continue to Discussion
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar - Resources & Activities -->
        <div class="col-lg-3">
            <div class="sticky-sidebar">
                <div class="container-fluid px-0" style="width: 100%; max-width: 1400px;">
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Assignments</h5>
                            <div class="d-flex flex-column gap-3">
                                @foreach($courseUnit->assignments as $assignment)
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-3">
                                    <div class="flex-grow-1 me-3">
                                        <h6 class="mb-1 fw-semibold">{{ $assignment->title }}</h6>
                                        <span class="text-muted small" style='color:orange !important;'>Due: {{
                                            \Carbon\Carbon::parse($assignment->due_date)->format('F d, Y') }}</span>
                                    </div>
                                    <a href="{{ Storage::url($assignment->file_url) }}"
                                        class="btn btn-sm btn-outline-primary" target="_blank">
                                        <i class="fas fa-download me-1"></i> Download
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resources -->
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">Resources</h5>
                        <div class="d-flex flex-column gap-2">
                            <a href="#" class="resource-item text-decoration-none">
                                <i class="fas fa-file-pdf me-3 resource-icon"></i>
                                <div class="flex-grow-1">
                                    <div class="fw-medium text-dark">Polymorphism Cheatsheet</div>
                                    <div class="text-muted small">PDF • 2.4MB</div>
                                </div>
                                <i class="fas fa-download text-muted"></i>
                            </a>
                            <a href="#" class="resource-item text-decoration-none">
                                <i class="fas fa-file-powerpoint me-3 resource-icon"></i>
                                <div class="flex-grow-1">
                                    <div class="fw-medium text-dark">Lecture Slides</div>
                                    <div class="text-muted small">PPT • 5.8MB</div>
                                </div>
                                <i class="fas fa-download text-muted"></i>
                            </a>
                            <a href="#" class="resource-item text-decoration-none">
                                <i class="fas fa-file-code me-3 resource-icon"></i>
                                <div class="flex-grow-1">
                                    <div class="fw-medium text-dark">Code Examples</div>
                                    <div class="text-muted small">ZIP • 1.1MB</div>
                                </div>
                                <i class="fas fa-download text-muted"></i>
                            </a>
                            <a href="#" class="resource-item text-decoration-none">
                                <i class="fas fa-link me-3 resource-icon"></i>
                                <div class="flex-grow-1">
                                    <div class="fw-medium text-dark">Additional Reading</div>
                                    <div class="text-muted small">External Link</div>
                                </div>
                                <i class="fas fa-external-link-alt text-muted"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{--
                <!-- Quick Stats -->
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">Your Stats</h5>
                        <div class="d-flex flex-column gap-3">
                            <div class="stats-item">
                                <i class="fas fa-clock stats-icon mb-2" style="font-size: 1.5rem;"></i>
                                <div class="fw-medium">12.5 Hours</div>
                                <div class="text-muted small">Time Spent</div>
                            </div>
                            <div class="stats-item">
                                <i class="fas fa-check-circle stats-icon mb-2" style="font-size: 1.5rem;"></i>
                                <div class="fw-medium">24/48</div>
                                <div class="text-muted small">Tasks Completed</div>
                            </div>
                            <div class="stats-item">
                                <i class="fas fa-trophy stats-icon mb-2" style="font-size: 1.5rem;"></i>
                                <div class="fw-medium">85%</div>
                                <div class="text-muted small">Average Score</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}









<!-- Upcoming Tasks Card -->
<div class="card mb-3">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-3">Upcoming Tasks</h5>

        <div class="task-item">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="task-label assignment-label">Assignment</span>
                <span class="text-muted small">Due in 5 days</span>
            </div>
            <div class="fw-medium">Implement a Class Hierarchy</div>
        </div>

        <div class="task-item">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="task-label quiz-label">Quiz</span>
                <span class="text-muted small">Due in 2 days</span>
            </div>
            <div class="fw-medium">OOP Concepts Review</div>
        </div>

        <div class="task-item">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="task-label project-label">Project</span>
                <span class="text-muted small">Due in 2 weeks</span>
            </div>
            <div class="fw-medium">Design Patterns Implementation</div>
        </div>
    </div>
</div>

<!-- Need Help Card -->
<div class="card">
    <div class="card-body p-4 text-center">
        <i class="fas fa-question-circle help-icon"></i>
        <h5 class="fw-bold">Need Help?</h5>
        <p class="text-muted mb-3">Having trouble with this lesson? Reach out for assistance.</p>
        <button class="btn btn-outline-danger">Contact Instructor</button>
    </div>
</div>
</div>
</div>


<!-- Discussion section (hidden by default) -->
<div class="container-fluid py-4 d-none" id="discussion-section">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card mb-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">Discussion</h4>

                    <!-- Comment form -->
                    <div class="mb-4">
                        <div class="d-flex">
                            <img src="https://via.placeholder.com/45" alt="User" class="avatar me-3">
                            <div class="flex-grow-1">
                                <textarea class="form-control" rows="3"
                                    placeholder="Ask a question or share your thoughts..."></textarea>
                                <div class="d-flex justify-content-end mt-2">
                                    <button class="btn btn-primary">Post Comment</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comments list -->
                    <div class="comments-list">
                        <!-- Comment 1 -->
                        <div class="comment">
                            <div class="d-flex">
                                <img src="https://via.placeholder.com/45" alt="User" class="avatar me-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div>
                                            <span class="fw-semibold me-2">James Wilson</span>
                                            <span class="instructor-badge">Instructor</span>
                                        </div>
                                        <span class="text-muted small">2 days ago</span>
                                    </div>
                                    <p>Great question about polymorphism! Remember that the key advantage is the
                                        ability
                                        to process objects differently depending on their data type or class. Feel
                                        free
                                        to share your code examples if you'd like feedback.</p>
                                    <div class="d-flex align-items-center gap-3 mt-2">
                                        <button class="btn btn-sm btn-link text-muted p-0"><i
                                                class="far fa-thumbs-up me-1"></i> 12</button>
                                        <button class="btn btn-sm btn-link text-muted p-0"><i
                                                class="far fa-comment me-1"></i> Reply</button>
                                    </div>

                                    <!-- Nested reply -->
                                    <div class="comment-reply">
                                        <div class="d-flex">
                                            <img src="https://via.placeholder.com/35" alt="User" class="avatar-sm me-2">
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <span class="fw-semibold">Sarah Johnson</span>
                                                    <span class="text-muted small">1 day ago</span>
                                                </div>
                                                <p>Thanks for clarifying! I'm still working on understanding the
                                                    difference between overloading and overriding. Could you
                                                    elaborate a
                                                    bit more?</p>
                                                <div class="d-flex align-items-center gap-3 mt-2">
                                                    <button class="btn btn-sm btn-link text-muted p-0"><i
                                                            class="far fa-thumbs-up me-1"></i> 5</button>
                                                    <button class="btn btn-sm btn-link text-muted p-0"><i
                                                            class="far fa-comment me-1"></i> Reply</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comment 2 -->
                        <div class="comment">
                            <div class="d-flex">
                                <img src="https://via.placeholder.com/45" alt="User" class="avatar me-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="fw-semibold">Michael Chen</span>
                                        <span class="text-muted small">3 days ago</span>
                                    </div>
                                    <p>I've been trying to implement the shape example from the video but getting
                                        some
                                        errors with the abstract method implementation. Has anyone else run into
                                        this
                                        issue?</p>
                                    <div class="d-flex align-items-center gap-3 mt-2">
                                        <button class="btn btn-sm btn-link text-muted p-0"><i
                                                class="far fa-thumbs-up me-1"></i> 3</button>
                                        <button class="btn btn-sm btn-link text-muted p-0"><i
                                                class="far fa-comment me-1"></i> Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to open modules modal
function openModulesModal() {
    const modulesModal = new bootstrap.Modal(document.getElementById('allModulesModal'));
    modulesModal.show();
}

// Exam tabs functionality
document.addEventListener('DOMContentLoaded', function() {
    // Handle exam tab switching
    const examTabs = document.querySelectorAll('.exam-tab');
    examTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            examTabs.forEach(t => t.classList.remove('active'));
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Hide all exam sections
            document.getElementById('upcoming-exams').classList.add('collapsed-content');
            document.getElementById('current-exams').classList.add('collapsed-content');
            document.getElementById('past-papers').classList.add('collapsed-content');
            
            // Show selected section
            const targetId = this.getAttribute('data-target') + '-exams';
            if (this.getAttribute('data-target') === 'past-papers') {
                document.getElementById('past-papers').classList.remove('collapsed-content');
            } else {
                document.getElementById(targetId).classList.remove('collapsed-content');
            }
        });
    });
    
    // Show discussion section
    document.getElementById('show-discussion').addEventListener('click', function() {
        document.getElementById('discussion-section').classList.remove('d-none');
        // Scroll to discussion section
        document.getElementById('discussion-section').scrollIntoView({ behavior: 'smooth' });
    });
});
</script>
@endsection