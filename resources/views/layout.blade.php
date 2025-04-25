<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WITI Portal')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        /* Navbar Styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            /* background-color: white; */
            padding: 10px;
        }

        .navbar .logo-section {
            flex: 1;
        }

        .logo-container img {
            height: 40px;
            width: auto;
        }

        .navbar ul {
            display: flex;
            list-style: none;
            gap: 15px;
            margin: 0;
        }

        .navbar li {
            transform: skew(-20deg);
            color: #800000;
        }

        .navbar a {
            display: block;
            padding: 10px 25px;
            color: maroon;
            text-decoration: none;
            font-weight: bold;
            transform: skew(20deg);
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: maroon;
        }

        /* Apply Button Styling */
        .apply-button {
            background-color: #800000;
            /* Red background */
            border-radius: 5px;
            padding: 10px 20px;
            color: white !important
        }

        .apply-button:hover {
            background-color: #B00000;
            /* Darker red on hover */
        }

        /* Mobile and Tablet Responsiveness */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: center;
            }

            .navbar ul {
                flex-direction: column;
                align-items: center;
            }

            .navbar a {
                padding: 10px 15px;
                font-size: 16px;
            }
        }

        .footer {



            background-color: #800000;
            color: white;
            padding: 40px 0;
            width: 100%;
            /* margin-top: 250px; */
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: auto;
            font-size: 40px;
            /* Adjust this if you want a larger size */
            font-family: 'Roboto', sans-serif;
            gap: 60px;
        }

        .footer-section {
            width: 25%;
            padding: 10px;
        }

        .footer-section h4 {
            font-size: 18px;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .footer-section p,
        .footer-section ul {
            font-size: 18px;
            color: #ddd;
            font-family: 'Roboto', sans-serif;
            /* padding: 20px; */
            border-top: 1px solid #ddd;
            line-height: 1.5
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 8px;
        }

        .footer-section ul li a {
            color: #ddd;
            text-decoration: none;
        }

        .footer-section ul li a:hover {
            text-decoration: underline;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #ddd;

        }

        .footer-bottom a {
            color: #ddd;
            text-decoration: none;
            font-family: Arial, Helvetica, sans-serif
        }

        .footer-bottom a:hover {
            text-decoration: underline;
        }
    </style>

    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="logo-section">
            <!-- Left section with logo -->
            <div class="logo-container">
                <img src="{{ asset('storage/images/try.png') }}" alt="WITI Logo" class="logo">
            </div>
        </div>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('courses') }}">Courses</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('apply') }}" class="apply-button">Apply</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>



    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>About Us</h4>
                <p>To create employment opportunities in STEM professions for brilliant young women from underserved
                    communities.</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('courses') }}">Courses</a></li>
                    <li><a href="{{ route('apply') }}">Apply</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contact Us</h4>
                <ul>
                    <li>Email: info@witi.ac.ug</li>
                    <li>Phone: +256 392 177 980</li>
                    <li>Address: Corporation Rise, City, Country</li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <ul>
                    <li><a href="https://www.facebook.com/WITI">Facebook</a></li>
                    <li><a href="https://twitter.com/WITI">Twitter</a></li>
                    <li><a href="https://www.instagram.com/WITI">Instagram</a></li>
                </ul>
            </div>
        </div>
        <p style='text-align:center'>&copy; 2024 WITI Portal. All Rights Reserved.</p>
    </footer>


    <!-- Footer (optional) -->

</body>

</html>