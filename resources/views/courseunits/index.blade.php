<?php
    // You can add session handling or database connection here if needed
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: maroon !important;
        }

        .btn-primary {
            background-color: brown !important;
            border: none;
        }

        .btn-primary:hover {
            background-color: #8b0000 !important;
        }

        header {
            background: linear-gradient(to right, maroon, brown);
            color: white;
            padding: 100px 0;
            text-align: center;
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center;
        }

        .card {
            background-color: #fff3e6;
            border: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        footer {
            background-color: maroon;
            color: white;
            padding: 20px 0;
        }

        .carousel-item img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#apply">Apply</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="slide1.jpg" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="slide2.jpg" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="slide3.jpg" class="d-block w-100" alt="Slide 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>

    <header>
        <h1>Welcome to the Student Management System</h1>
        <p class="lead">Manage students, courses, and records efficiently.</p>
        <a href="#apply" class="btn btn-primary">Apply Now</a>
    </header>

    <section id="features" class="container my-5">
        <h2 class="text-center">Features</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card p-3">
                    <h3>Student Registration</h3>
                    <p>Easy student enrollment and data management.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h3>Course Management</h3>
                    <p>Assign and track student courses with ease.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h3>Grades & Reports</h3>
                    <p>Generate reports and track student progress.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="apply" class="container my-5">
        <h2 class="text-center">Apply for Admission</h2>
        <form action="apply.php" method="POST" class="p-3">
            <div class="mb-3">
                <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>
            <div class="mb-3">
                <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
            </div>
            <div class="mb-3">
                <select name="course" class="form-control" required>
                    <option value="">Select Course</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Business Management">Business Management</option>
                    <option value="Engineering">Engineering</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
    </section>

    <footer class="text-center py-3">
        <p>&copy; 2024 Student Management System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

public function index()
// {
// $applications = StudentApplication::with(['program', 'user'])
// ->orderBy('created_at', 'desc') // Order by newest first
// ->get();
// return view('student_applications.index', compact('applications'));
// }