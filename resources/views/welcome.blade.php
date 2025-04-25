{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WITI Student Management System</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .header {
            background-color: black;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header img {
            height: 50px;
            margin-left: 20px;
        }

        .search-bar {
            position: relative;
            margin-left: 60rem;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 40px 10px 15px;
            border: none;
            border-radius: 5px;
            outline: none;
        }

        .search-bar i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #800000;
            /* Maroon */
        }

        .main {
            text-align: center;
            padding: 50px 20px;
            background-color: #f7f7f7;
        }

        .main h1 {
            font-size: 3rem;
            color: #800000;
            /* Maroon */
            font-weight: bold;
            margin-bottom: 20px;
        }

        .main button {
            padding: 15px 30px;
            background-color: #800000;

            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .main button:hover {
            background-color: #5e0000;

        }

        .footer {
            background-color: #b3995d;
            padding: 20px 0;
            text-align: center;
            color: white;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .col-md-6 {
            flex: 1 1 45%;
            padding: 10px;
        }

        .col-md-6 p {
            line-height: 40px;
        }

        p {
            font-size: 1rem;
            color: white;
            text-align: left;
            margin-left: 120px;
        }

        .social-icons a {
            font-size: 20px;
            color: maroon;
            margin: 0 10px;
            text-decoration: none;
        }

        .social-icons a:hover {
            color: maroon;
        }

        .main {
            position: relative;
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            overflow: hidden;
            color: black;
        }

        .main {
            background-size: cover;
            background-position: center;
            animation: slideBackground 15s infinite;
            opacity: 100px;
            color: black;
        }

        @keyframes slideBackground {
            0% {
                background-image: url('https://witi.ac.ug/wp-content/uploads/2023/09/CLF_9627-scaled.jpg');
            }

            33% {
                background-image: url('https://pbs.twimg.com/media/Ga0M-33bwAAMWb2?format=jpg&name=4096x4096');
            }

            66% {
                background-image: url('https://studenthub.africa/app/uploads/news/5yyk8ji02Bf7sDdTFb2u9mpTpr5vPdBv.jpeg');
            }

            100% {
                background-image: url('https://media.licdn.com/dms/image/v2/D4D22AQG8qL-DfU9cRQ/feedshare-shrink_800/feedshare-shrink_800/0/1698225478715?e=2147483647&v=beta&t=hHM75VSmTROAlhwK_d2gz0lhNJGneSZ3Jol9fE5V5Q8');
            }
        }

        .main .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .main h1,
        .main button {
            position: relative;
            z-index: 2;
        }

        .main h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .main button {
            padding: 10px 20px;
            font-size: 18px;
            color: #fff;
            background-color: maroon;
            border: none;
            border-radius: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .main button:hover {
            background-color: darkred;
            transform: scale(1.1);
        }

        h5 {
            color: white;
            margin-left: 20px;
        }

        .footer h4 {
            color: white;
            margin-bottom: 20px;
        }

        h6 {
            color: maroon;
        }
    </style>
</head>

<body>


    <div class="header">
        <img src="{{ asset('storage/images/try.png') }}" alt="logo">
        <p>Home</p>
        <p>About us</p>
        <p>Contact</p>
        <p>Apply</p>


        <div class="search-bar">
            <form action="index.php" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for courses"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


    <div class="main">
        <h1>Welcome to WITI Student Management System</h1>
        <button onclick="window.location.href='{{ route('login') }}'">Login</button>
    </div>


    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>WITI Student Management System 2024</h4>
                    <p>
                        Plot 19 Bukoto street, Kamyokya road<br>
                        P.O Box 73307 Kampala Uganda<br>
                        Tel: +256-706-988-875, +256-708-809-4298<br>
                        Email: <a href="mailto:info@witi.ac.ug">info@witi.ac.ug</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <h4>Quick links</h4>
                    <div class="social-icons">
                        <a href="https://www.linkedin.com/company/witu/posts"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://x.com/witi_ug"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html> --}}






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WITI Portal</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add Font Awesome link for the search icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-repeat: no-repeat;
            background-image: url('https://pbs.twimg.com/media/Ga0M-33bwAAMWb2?format=jpg&name=4096x4096');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        body::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #800000;
            opacity: 10%;
            z-index: -1;
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 1400px;
            flex-grow: 1;
            margin: auto;
            padding: 20px;
        }

        /* Logo and Background Image Section */
        .logo-section {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        .logo-container {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 20px 20px;
        }

        .logo {
            width: 90px;
            margin-bottom: 5px;
            margin-left: -160px;
        }

        .logo-text {
            font-size: 14px;
            color: #800000;
            font-weight: bold;
        }

        /* Right Section Content */
        .content {
            flex: 2;
            padding: 30px;
            text-align: left;
        }

        .navbar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .navbar ul {
            display: flex;
            list-style: none;
            gap: 15px;
        }

        .navbar li {
            transform: skew(-20deg);
            color: #800000;
        }

        /* Navbar link styling (common for all links) */
        .navbar a {
            display: block;
            padding: 10px 25px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transform: skew(20deg);
            font-size: 18px
        }

        .navbar a:hover {
            color: #800000
        }

        /* Specific styling for Apply button */
        .apply-button {
            background-color: #800000;
            font-weight: normal !important;

            color: white !important;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 23px;

        }

        .apply-button:hover {
            background-color: #800000;
        }

        /* Style for the search bar */
        .search-bar-container {
            position: relative;
        }

        .search-bar {
            transform: skew(20deg);
            border: 2px solid #800000;
            border-radius: 5px;
            padding: 5px 15px;
            background-color: white;
            font-size: 14px;
            width: 200px;
            padding-left: 30px;
            margin-top: 5px
        }

        .search-bar-icon {
            position: absolute;
            left: 180px;
            top: 43%;
            transform: translateY(-50%);
            font-size: 16px;
            color: #800000;
            cursor: pointer;
        }

        .welcome-text h1 {
            font-size: 3rem;
            line-height: 1.2;
            color: white;
            margin-top: 100px;
            font-weight: 100 letter-spacing: 5px;
            word-spacing: 15px;
        }

        button {
            background-color: #800000;
            color: white;
            padding: 12px 35px;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            margin-top: 20px;
            margin-left: 250px;
            font-weight: bold;
        }


        /* Style for the typing effect */
        .typing-effect {
            margin-right: 135px;
            font-size: 3rem;
            letter-spacing: 3px;
            word-spacing: 10px;
            text-align: center;
            color: #800000;
            font-weight: bold;
            text-transform: uppercase;
            overflow: hidden;
            border-right: 4px solid #800000;
            white-space: nowrap;
            width: 0;
            animation: typing 4s steps(30) 1s infinite, blink 0.75s step-end infinite;
        }

        /* Animation for the typing effect */
        @keyframes typing {
            0% {
                width: 0;
            }

            100% {
                width: 100%;
            }
        }

        /* Animation for the blinking cursor */
        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }


        .footer {



            background-color: #800000;
            color: white;
            padding: 40px 0;
            width: 100%;
            margin-top: 260px;
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
</head>

<body>
    <div class="container">
        <!-- Left section with logo and background image -->
        <div class="logo-section">
            <div class="logo-container">
                <img src="{{ asset('storage/images/try.png') }}" alt="WITI Logo" class="logo">
            </div>
        </div>

        <!-- Right section with navbar and text -->
        <div class="content">
            <nav class="navbar">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>

                    {{-- <li><a href="#">About</a></li> --}}
                    <li><a href="{{ route('courses')}}">Courses</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    {{-- <li><a href="#">Contact</a></li> --}}
                    <li><a href="{{ route('login')}}" class="apply-button">Login</a></li>
                    <!-- Apply Button with specific styling -->
                    <li class="search-bar-container">
                        <!-- Search Bar with Font Awesome Icon -->
                        <input type="text" class="search-bar" id="searchInput" placeholder="Search courses">
                        <i class="fas fa-search search-bar-icon" onclick="performSearch()"></i> <!-- Search Icon -->
                    </li>
                </ul>
            </nav>
            <div class="welcome-text">
                <h1 class="typing-effect">WELCOME TO THE WITI SMS</h1>
                <button onclick="window.location.href='{{ route('apply') }}'">Apply</button>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    {{-- <footer class="footer">
        <div class="footer-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Contact</a>
        </div>
        <p>&copy; 2024 WITI Portal. All Rights Reserved.</p>
    </footer> --}}

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>About Us</h4>
                <p>To create employment opportunities in STEM professions for brilliant young women from underserved
                    communities..</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Apply</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contact Us</h4>
                <ul>
                    <li>Email: Email: info@witi.ac.ug</li>
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
        <div class="footer-bottom">
            <p>&copy; 2024 WITI SMS. All Rights Reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of
                    Service</a></p>
        </div>
    </footer>

    <script>
        // Function to handle search functionality
        function performSearch() {
            var searchTerm = document.getElementById('searchInput').value.trim();

            if (searchTerm !== "") {
                // For now, just logging the search term to the console
                console.log("Searching for:", searchTerm);
                
                // You can replace this with actual logic for searching (e.g., filtering content or sending a request to the server)
                alert("Searching for: " + searchTerm); // Display an alert for demonstration
            } else {
                alert("Please enter a search term.");
            }
        }

        // Optional: You can also trigger the search when pressing the "Enter" key
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
    </script>
</body>

</html>