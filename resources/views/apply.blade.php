{{-- @extends('layout')

@section('title', 'Contact Us - WITI Portal')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply - WITI Portal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <style>
        :root {
            --primary-color: maroon;
            --secondary-color: maroon;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: green;
            --border-radius: 15px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            padding: 20px 0;
        }

        .container {
            max-width: 1100px;
        }

        .form-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }

        .form-title {
            color: var(--primary-color);
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        .form-title::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--accent-color);
            border-radius: 10px;
        }

        .step-indicator {
            margin: 30px 0;
        }

        .step {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            position: relative;
        }

        .step-item {
            flex: 1;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 2px solid #dee2e6;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: 600;
            transition: var(--transition);
        }

        .step-text {
            font-size: 0.85rem;
            color: #6c757d;
            font-weight: 500;
        }

        .step-item.active .step-circle {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .step-item.active .step-text {
            color: var(--primary-color);
            font-weight: 600;
        }

        .step-item.completed .step-circle {
            background: var(--success-color);
            border-color: var(--success-color);
            color: white;
        }

        .step-line {
            position: absolute;
            top: 20px;
            height: 2px;
            background: #dee2e6;
            width: 66%;
            left: 17%;
            z-index: 0;
        }

        .step-line-progress {
            position: absolute;
            top: 20px;
            height: 2px;
            background: var(--primary-color);
            width: 33%;
            left: 17%;
            z-index: 0;
            transition: var(--transition);
        }

        .section-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 25px;
            border-left: 4px solid var(--primary-color);
            transition: var(--transition);
        }

        .section-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .section-title i {
            margin-right: 10px;
            background: var(--light-color);
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: var(--primary-color);
        }

        .form-floating {
            margin-bottom: 15px;
        }

        .form-floating>.form-control,
        .form-floating>.form-select {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            height: calc(3.5rem + 2px);
            padding: 1rem 0.75rem;
        }

        .form-floating>.form-control:focus,
        .form-floating>.form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
        }

        .form-floating>label {
            padding: 1rem 0.75rem;
        }

        .form-floating input::-webkit-calendar-picker-indicator {
            cursor: pointer;
        }

        .form-floating input[type="file"] {
            padding-top: 1.625rem;
        }

        .form-floating input[type="file"]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: var(--primary-color);
            padding: 6px 16px;
            border-radius: 50px;
            color: #fff;
            cursor: pointer;
            transition: var(--transition);
        }

        .form-floating input[type="file"]::file-selector-button:hover {
            background: var(--secondary-color);
        }

        .btn-submit {
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            border: none;
            color: white;
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
        }

        .btn-submit:active {
            transform: translateY(1px);
        }

        .required-field::after {
            content: "*";
            color: red;
            margin-left: 3px;
        }

        .file-upload-info {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 5px;
        }

        .alert {
            border-radius: var(--border-radius);
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 25px 15px;
            }

            .step-text {
                font-size: 0.7rem;
            }
        }

        /* Custom animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }

        .delay-4 {
            animation-delay: 0.4s;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="form-container fade-in">
            <h2 class="form-title text-center mb-2">Student Application Form</h2>
            <p class="text-center text-muted mb-4">Complete all required fields to apply for your WITI program</p>

            <!-- Step indicator -->
            <div class="step-indicator fade-in delay-1">
                <div class="step">
                    <div class="step-line"></div>
                    <div class="step-line-progress"></div>
                    <div class="step-item active">
                        <div class="step-circle">1</div>
                        <div class="step-text">Personal Information</div>
                    </div>
                    <div class="step-item">
                        <div class="step-circle">2</div>
                        <div class="step-text">Education & Documents</div>
                    </div>
                    <div class="step-item">
                        <div class="step-circle">3</div>
                        <div class="step-text">Program Selection</div>
                    </div>
                </div>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data">
                <!-- Personal Information Section -->
                <div class="section-container fade-in delay-2">
                    <h5 class="section-title"><i class="bi bi-person-circle"></i> Personal Information</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="firstname" name="firstname" class="form-control"
                                    placeholder="First Name" required>
                                <label for="firstname" class="required-field">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="lastname" name="lastname" class="form-control"
                                    placeholder="Last Name" required>
                                <label for="lastname" class="required-field">Last Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Email Address" required>
                                <label for="email" class="required-field">Email Address</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" id="phone_number" name="phone_number" class="form-control"
                                    placeholder="Phone Number" required>
                                <label for="phone_number" class="required-field">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" id="phone_number2" name="phone_number2" class="form-control"
                                    placeholder="Secondary Phone">
                                <label for="phone_number2">Secondary Phone (Optional)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select id="gender" name="gender" class="form-select" required>
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <label for="gender" class="required-field">Gender</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" id="date_of_birth" name="date_of_birth" class="form-control"
                                    required>
                                <label for="date_of_birth" class="required-field">Date of Birth</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="nationality" name="nationality" class="form-control"
                                    placeholder="Nationality" required>
                                <label for="nationality" class="required-field">Nationality</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" id="address" name="address" class="form-control"
                                    placeholder="Address" required>
                                <label for="address" class="required-field">Current Address</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Educational Background Section -->
                <div class="section-container fade-in delay-3">
                    <h5 class="section-title"><i class="bi bi-book"></i> Educational Background</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="secondary_school" name="secondary_school" class="form-control"
                                    placeholder="Secondary School" required>
                                <label for="secondary_school" class="required-field">Secondary School</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="combination" name="combination" class="form-control"
                                    placeholder="Combination" required>
                                <label for="combination" class="required-field">Combination/Subjects</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" id="points_scored" name="points_scored" class="form-control"
                                    placeholder="Points Scored">
                                <label for="points_scored">Points Scored</label>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endsection --}}


        {{-- @extends('layout')

        @section('title', 'Apply - WITI Portal')

        @section('content')

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mx-5 mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        @php
        use App\Models\Program;
        use App\Models\Cohorts;

        $programs = Program::all();
        $cohorts = Cohorts::all();
        @endphp

        <div class="container my-5">
            <h2 class="text-center mb-4">Student Application Form</h2>

            <form action="{{ route('student_applications.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Personal Information -->
                <div class="card mb-4">
                    <div class="card-header">Personal Information</div>
                    <div class="card-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number (Primary)</label>
                            <input type="text" name="phone_number" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number (Secondary)</label>
                            <input type="text" name="phone_number2" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nationality</label>
                            <input type="text" name="nationality" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Educational Background -->
                <div class="card mb-4">
                    <div class="card-header">Educational Background</div>
                    <div class="card-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Secondary School</label>
                            <input type="text" name="secondary_school" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Combination</label>
                            <input type="text" name="combination" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Points Scored</label>
                            <input type="number" name="points_scored" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">UACE Year of Completion</label>
                            <input type="number" name="uace_year_of_completion" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">UCE Certificate (PDF/Image)</label>
                            <input type="file" name="uce" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">UACE Certificate (PDF/Image)</label>
                            <input type="file" name="uace" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                        </div>
                    </div>
                </div>

                <!-- Guardian Information -->
                <div class="card mb-4">
                    <div class="card-header">Guardian Information</div>
                    <div class="card-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Guardian's Name</label>
                            <input type="text" name="guardian_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Guardian's Contact</label>
                            <input type="text" name="guardian_contact" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Program & Documents -->
                <div class="card mb-4">
                    <div class="card-header">Program & Documents</div>
                    <div class="card-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Program</label>
                            <select name="program_id" class="form-select" required>
                                <option value="">Select Program</option>
                                @foreach($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cohort</label>
                            <select name="cohort_id" class="form-select" required>
                                <option value="">Select Cohort</option>
                                @foreach($cohorts as $cohort)
                                <option value="{{ $cohort->id }}">{{ $cohort->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">National ID (PDF/Image)</label>
                            <input type="file" name="national_id" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Recommendation Letter</label>
                            <input type="file" name="recommendation_letter" class="form-control"
                                accept=".pdf,.jpg,.jpeg,.png">
                        </div>
                    </div>
                </div>

                <!-- Interview Details -->
                <div class="card mb-4">
                    <div class="card-header">Interview Details (Admin will fill)</div>
                    <div class="card-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Interview Date</label>
                            <input type="date" name="interview_date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Interview Result</label>
                            <input type="text" name="interview_result" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4">Submit Application</button>
                </div>

            </form>
        </div>

        @endsection --}}

        @extends('layout')

        @section('title', 'Apply - WITI Portal')
        
        @section('styles')
        <!-- Bootstrap 5 CSS (for layout compatibility) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Google Fonts (Roboto) -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <style>
            /* Fallback external styles for the application form */
            .witi-form-wrapper {
                font-family: 'Roboto', sans-serif !important;
                /* Debug: Brown border to match theme */
                border: 3px solid #b8a373 !important;
            }
        
            .witi-form-wrapper .form-container {
                max-width: 1100px !important;
                margin: 2rem auto !important;
                padding: 0 15px !important;
                background-color: #FFFFFF !important;
                animation: formFadeIn 0.8s ease-in !important;
            }
        
            .witi-form-wrapper .form-title {
                color: #A52A2A !important;
                font-weight: 600 !important;
                text-align: center !important;
                margin-bottom: 2rem !important;
                text-transform: uppercase !important;
                letter-spacing: 1px !important;
                font-size: 1.7rem !important;
            }
        
            .witi-form-wrapper .form-card {
                border: 1px solid #b8a373 !important;
                border-radius: 8px !important;
                background: #f8f9fa !important;
                margin-bottom: 1.5rem !important;
                box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08) !important;
                transition: box-shadow 0.3s ease !important;
            }
        
            .witi-form-wrapper .form-card:hover {
                box-shadow: 0 5px 18px rgba(0, 0, 0, 0.12) !important;
            }
        
            .witi-form-wrapper .form-card-header {
                background-color: #A52A2A !important;
                color: #FFFFFF !important;
                font-weight: 500 !important;
                padding: 0.9rem 1.5rem !important;
                border-radius: 8px 8px 0 0 !important;
                font-size: 1.25rem !important;
                text-align: center !important;
            }
        
            .witi-form-wrapper .form-card-body {
                padding: 1.5rem !important;
                background: #FFFFFF !important;
                border-radius: 0 0 8px 8px !important;
            }
        
            .witi-form-wrapper .form-label {
                color: #333333 !important;
                font-weight: 500 !important;
                margin-bottom: 0.4rem !important;
                font-size: 0.9rem !important;
                display: block !important;
            }
        
            .witi-form-wrapper .form-input,
            .witi-form-wrapper .form-select {
                border: 1px solid #b8a373 !important;
                border-radius: 6px !important;
                padding: 0.65rem !important;
                height: 38px !important;
                font-size: 0.9rem !important;
                width: 100% !important;
                box-sizing: border-box !important;
                transition: border-color 0.3s ease, box-shadow 0.3s ease !important;
                font-family: 'Roboto', sans-serif !important;
            }
        
            .witi-form-wrapper .form-input:focus,
            .witi-form-wrapper .form-select:focus {
                border-color: #A52A2A !important;
                box-shadow: 0 0 5px rgba(165, 42, 42, 0.15) !important;
                outline: none !important;
            }
        
            .witi-form-wrapper .form-input[type="file"] {
                height: 38px !important;
                padding: 0.5rem !important;
                line-height: 1.5 !important;
            }
        
            .witi-form-wrapper .form-btn {
                background-color: #A52A2A !important;
                border: none !important;
                padding: 0.75rem 2.5rem !important;
                border-radius: 6px !important;
                font-weight: 600 !important;
                font-size: 1rem !important;
                text-transform: uppercase !important;
                color: #FFFFFF !important;
                transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease !important;
                cursor: pointer !important;
                display: inline-block !important;
            }
        
            .witi-form-wrapper .form-btn:hover {
                background-color: #852121 !important;
                transform: scale(1.05) !important;
                box-shadow: 0 0 10px rgba(165, 42, 42, 0.5) !important;
            }
        
            .witi-form-wrapper .form-alert {
                background-color: #f8f9fa !important;
                color: #A52A2A !important;
                border: 1px solid #b8a373 !important;
                border-radius: 6px !important;
                padding: 0.8rem !important;
                margin: 1rem auto !important;
                max-width: 1100px !important;
                font-weight: 500 !important;
                position: relative !important;
            }
        
            .witi-form-wrapper .form-alert .form-alert-close {
                position: absolute !important;
                top: 0.5rem !important;
                right: 0.5rem !important;
                background: none !important;
                border: none !important;
                cursor: pointer !important;
                filter: brightness(0) saturate(100%) invert(30%) sepia(50%) saturate(2000%) hue-rotate(340deg) !important;
            }
        
            .witi-form-wrapper .form-row {
                margin-left: -8px !important;
                margin-right: -8px !important;
                display: flex !important;
                flex-wrap: wrap !important;
            }
        
            .witi-form-wrapper .form-col {
                padding-left: 8px !important;
                padding-right: 8px !important;
                flex: 0 0 50% !important;
                max-width: 50% !important;
                box-sizing: border-box !important;
                display: flex !important;
                flex-direction: column !important;
            }
        
            .witi-form-wrapper .form-col-full {
                flex: 0 0 100% !important;
                max-width: 100% !important;
            }
        
            .witi-form-wrapper .form-section .form-row {
                display: flex !important;
                flex-wrap: wrap !important;
                align-items: stretch !important;
            }
        
            .witi-form-wrapper .form-section .form-input,
            .witi-form-wrapper .form-section .form-select {
                flex-grow: 1 !important;
            }
        
            @media (max-width: 768px) {
                .witi-form-wrapper .form-container {
                    margin: 1rem 10px !important;
                }
        
                .witi-form-wrapper .form-card-body {
                    padding: 1rem !important;
                }
        
                .witi-form-wrapper .form-btn {
                    width: 100% !important;
                    padding: 0.75rem !important;
                }
        
                .witi-form-wrapper .form-title {
                    font-size: 1.4rem !important;
                }
        
                .witi-form-wrapper .form-card-header {
                    font-size: 1.15rem !important;
                }
        
                .witi-form-wrapper .form-row {
                    margin-left: -5px !important;
                    margin-right: -5px !important;
                }
        
                .witi-form-wrapper .form-col,
                .witi-form-wrapper .form-col-full {
                    padding-left: 5px !important;
                    padding-right: 5px !important;
                    flex: 0 0 100% !important;
                    max-width: 100% !important;
                }
            }
        
            @keyframes formFadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
        </style>
        @endsection
        
        @section('content')
        <div class="witi-form-wrapper" style="font-family: 'Roboto', sans-serif; border: 3px solid #b8a373;">
            @if(session('success'))
            <div class="form-alert" style="background-color: #f8f9fa; color: #A52A2A; border: 1px solid #b8a373; border-radius: 6px; padding: 0.8rem; margin: 1rem auto; max-width: 1100px; font-weight: 500; position: relative;">
                {{ session('success') }}
                <button type="button" class="form-alert-close" data-bs-dismiss="alert" aria-label="Close" style="position: absolute; top: 0.5rem; right: 0.5rem; background: none; border: none; cursor: pointer; filter: brightness(0) saturate(100%) invert(30%) sepia(50%) saturate(2000%) hue-rotate(340deg);">×</button>
            </div>
            @endif
        
            @php
            use App\Models\Program;
            use App\Models\Cohorts;
        
            $programs = Program::all();
            $cohorts = Cohorts::all();
            @endphp
        
            <div class="form-container" style="max-width: 1100px; margin: 2rem auto; padding: 0 15px; background-color: #FFFFFF; animation: formFadeIn 0.8s ease-in;">
                <h2 class="form-title" style="color: #A52A2A; font-weight: 600; text-align: center; margin-bottom: 2rem; text-transform: uppercase; letter-spacing: 1px; font-size: 1.7rem;">Student Application Form</h2>
        
                <form action="{{ route('student_applications.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
        
                    <!-- Personal Information -->
                    <div class="form-card form-section" style="border: 1px solid #b8a373; border-radius: 8px; background: #f8f9fa; margin-bottom: 1.5rem; box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);">
                        <div class="form-card-header" style="background-color: #A52A2A; color: #FFFFFF; font-weight: 500; padding: 0.9rem 1.5rem; border-radius: 8px 8px 0 0; font-size: 1.25rem; text-align: center;">Personal Information</div>
                        <div class="form-card-body" style="padding: 1.5rem; background: #FFFFFF; border-radius: 0 0 8px 8px;">
                            <div class="form-row" style="margin-left: -8px; margin-right: -8px; display: flex; flex-wrap: wrap;">
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">First Name</label>
                                    <input type="text" name="firstname" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Last Name</label>
                                    <input type="text" name="lastname" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Email</label>
                                    <input type="email" name="email" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Phone Number (Primary)</label>
                                    <input type="text" name="phone_number" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Phone Number (Secondary)</label>
                                    <input type="text" name="phone_number2" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;">
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Gender</label>
                                    <select name="gender" class="form-select" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Date of Birth</label>
                                    <input type="date" name="date_of_birth" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Nationality</label>
                                    <input type="text" name="nationality" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                </div>
                                <div class="form-col form-col-full" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Address</label>
                                    <input type="text" name="address" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                </div>
                                {{-- <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 50%; max-width: 50%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Address</label>
                                    <input type="text" name="nationality" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                </div> --}}
                            </div>
                        </div>
                    </div>
        
                    <!-- Educational Background -->
                    <div class="form-card form-section" style="border: 1px solid #b8a373; border-radius: 8px; background: #f8f9fa; margin-bottom: 1.5rem; box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);">
                        <div class="form-card-header" style="background-color: #A52A2A; color: #FFFFFF; font-weight: 500; padding: 0.9rem 1.5rem; border-radius: 8px 8px 0 0; font-size: 1.25rem; text-align: center;">Educational Background</div>
                        <div class="form-card-body" style="padding: 1.5rem; background: #FFFFFF; border-radius: 0 0 8px 8px;">
                            <div class="form-row" style="margin-left: -8px; margin-right: -8px; display: flex; flex-wrap: wrap;">
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px;flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Secondary School</label>
                                    <input type="text" name="secondary_school" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Combination</label>
                                    <input type="text" name="combination" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;">
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Points Scored</label>
                                    <input type="number" name="points_scored" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;">
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">UACE Year of Completion</label>
                                    <input type="number" name="uace_year_of_completion" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;">
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">UCE Certificate (PDF/Image)</label>
                                    <input type="file" name="uce" class="form-input" accept=".pdf,.jpg,.jpeg,.png" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.5rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;">
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">UACE Certificate (PDF/Image)</label>
                                    <input type="file" name="uace" class="form-input" accept=".pdf,.jpg,.jpeg,.png" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.5rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;">
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Guardian Information -->
                    <div class="form-card form-section" style="border: 1px solid #b8a373; border-radius: 8px; background: #f8f9fa; margin-bottom: 1.5rem; box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);">
                        <div class="form-card-header" style="background-color: #A52A2A; color: #FFFFFF; font-weight: 500; padding: 0.9rem 1.5rem; border-radius: 8px 8px 0 0; font-size: 1.25rem; text-align: center;">Guardian Information</div>
                        <div class="form-card-body" style="padding: 1.5rem; background: #FFFFFF; border-radius: 0 0 8px 8px;">
                            <div class="form-row" style="margin-left: -8px; margin-right: -8px; display: flex; flex-wrap: wrap;">
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Guardian's Name</label>
                                    <input type="text" name="guardian_name" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Guardian's Contact</label>
                                    <input type="text" name="guardian_contact" class="form-input" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Program & Documents -->
                    <div class="form-card form-section" style="border: 1px solid #b8a373; border-radius: 8px; background: #f8f9fa; margin-bottom: 1.5rem; box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);">
                        <div class="form-card-header" style="background-color: #A52A2A; color: #FFFFFF; font-weight: 500; padding: 0.9rem 1.5rem; border-radius: 8px 8px 0 0; font-size: 1.25rem; text-align: center;">Program & Documents</div>
                        <div class="form-card-body" style="padding: 1.5rem; background: #FFFFFF; border-radius: 0 0 8px 8px;">
                            <div class="form-row" style="margin-left: -8px; margin-right: -8px; display: flex; flex-wrap: wrap;">
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Program</label>
                                    <select name="program_id" class="form-select" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                        <option value="">Select Program</option>
                                        @foreach($programs as $program)
                                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Cohort</label>
                                    <select name="cohort_id" class="form-select" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;" required>
                                        <option value="">Select Cohort</option>
                                        @foreach($cohorts as $cohort)
                                        <option value="{{ $cohort->id }}">{{ $cohort->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">National ID (PDF/Image)</label>
                                    <input type="file" name="national_id" class="form-input" accept=".pdf,.jpg,.jpeg,.png" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.5rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;">
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Recommendation Letter</label>
                                    <input type="file" name="recommendation_letter" class="form-input" accept=".pdf,.jpg,.jpeg,.png" style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.5rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;">
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Interview Details -->
                    <div class="form-card form-section" style="border: 1px solid #b8a373; border-radius: 8px; background: #f8f9fa; margin-bottom: 1.5rem; box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);">
                        <div class="form-card-header" style="background-color: #A52A2A; color: #FFFFFF; font-weight: 500; padding: 0.9rem 1.5rem; border-radius: 8px 8px 0 0; font-size: 1.25rem; text-align: center;">Interview Details (Admin Use Only)</div>
                        <div class="form-card-body" style="padding: 1.5rem; background: #FFFFFF; border-radius: 0 0 8px 8px;">
                            <div class="form-row" style="margin-left: -8px; margin-right: -8px; display: flex; flex-wrap: wrap;">
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Interview Date</label>
                                    <input type="date" name="interview_date" class="form-input" readonly style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;">
                                </div>
                                <div class="form-col" style="padding-left: 8px; padding-right: 8px; flex: 0 0 95%; max-width: 95%; display: flex; flex-direction: column;">
                                    <label class="form-label" style="color: #333333; font-weight: 500; margin-bottom: 0.4rem; font-size: 0.9rem; display: block;">Interview Result</label>
                                    <input type="text" name="interview_result" class="form-input" readonly style="border: 1px solid #b8a373; border-radius: 6px; padding: 0.65rem; height: 38px; font-size: 0.9rem; width: 100%; font-family: 'Roboto', sans-serif;">
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Submit Button -->
                    <div class="text-center mt-3">
                        <button type="submit" class="form-btn" style="background-color: #A52A2A; border: none; padding: 0.75rem 2.5rem; border-radius: 6px; font-weight: 600; font-size: 1rem; text-transform: uppercase; color: #FFFFFF; cursor: pointer; display: inline-block;">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
        
        @endsection
        
        @section('scripts')
        <!-- Bootstrap 5 JS (for alert dismissal and layout compatibility) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Inline script to confirm template is loaded -->
        <script>
            console.log("WITI Application Form Template Loaded");
        </script>
        @endsection