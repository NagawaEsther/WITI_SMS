{{-- <div class="card">
    <div class="card-header">
        <h4>Recent Activity</h4>
    </div>
    <div class="card-body">
        <ul class="list-group">
            @foreach($activities as $activity)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $activity->title }}
                <form action="{{ route('recent-activities.destroy', $activity->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- Add New Activity Form -->
<div class="card mt-3">
    <div class="card-header">
        <h4>Add New Activity</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('recent-activities.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Activity Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Activity</button>
        </form>
    </div>
</div> --}}

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

        /* body {
            font-family: Arial, sans-serif;
            background-color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-repeat: no-repeat;
            background-image: url('https://pbs.twimg.com/media/Ga0M-33bwAAMWb2?format=jpg&name=4096x4096');
            background-size: cover;
        } */

        body {
            font-family: Arial, sans-serif;
            background-color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-repeat: no-repeat;
            background-image: url('https://pbs.twimg.com/media/Ga0M-33bwAAMWb2?format=jpg&name=4096x4096');
            background-size: cover;
            position: relative;
            /* To allow positioning of the overlay */
        }

        /* Add a semi-transparent overlay on top of the background image */
        body::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background-color: rgba(255, 255, 255, 0.5); */
            /* White color with transparency */
            z-index: -1;
            background-color: #800000;
            opacity: 30%;
            /* Make sure the overlay is below the content */
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
            /* Reduced padding to move logo up */
        }

        .logo {
            width: 90px;
            margin-bottom: 5px;
            margin-left: -160px;
            /* Adjusted spacing */
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
            /* Reduced padding to move content up */
            text-align: left;
        }

        .navbar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
            /* Reduced margin to move navbar up */
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
            /* color: maroon; */
            color: white;
            /* Default text color for navbar links */
            text-decoration: none;
            font-weight: bold;
            transform: skew(20deg);
        }

        /* Specific styling for Apply button */
        .apply-button {
            background-color: #800000;
            color: white !important;
            /* Force white text specifically for Apply button */
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
            /* To create space for the icon */
        }

        .search-bar-icon {
            position: absolute;
            left: 180px;
            top: 43%;
            transform: translateY(-50%);
            font-size: 16px;
            color: #800000;
            cursor: pointer;
            /* Make the icon clickable */
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
            padding: 15px 40px;
            padding: 12px 35px;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            margin-top: 20px;
            margin-left: 250px
        }

        /* Footer Section */
        .footer {
            background-color: #800000;
            color: white;
            text-align: center;
            padding: 15px 0;
            width: 100%;
            position: relative;
            margin-top: auto;
        }

        .welcome-text {
            font-size: 2.5rem
        }

        .witi-text {
            font-size: 3rem;
            margin-right: 20px;

        }


        /* Style for the typing effect */
        .typing-effect {
            margin-right: 135px;
            font-size: 3rem;
            /* Adjust font size */
            letter-spacing: 3px;
            /* Space between letters */
            word-spacing: 10px;
            /* Space between words */
            text-align: center;
            /* Center the text */
            color: #800000;
            /* Maroon color */
            font-weight: bold;
            text-transform: uppercase;
            /* Ensure all letters are uppercase */
            overflow: hidden;
            /* Hide the content that overflows */
            border-right: 4px solid #800000;
            /* Cursor effect */
            white-space: nowrap;
            /* Prevent the text from wrapping */
            width: 0;
            animation: typing 4s steps(30) 1s infinite, blink 0.75s step-end infinite;
            /* Make the animation loop infinitely */
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#" class="apply-button">Apply</a></li> <!-- Apply Button with specific styling -->
                    <li class="search-bar-container">
                        <!-- Search Bar with Font Awesome Icon -->
                        <input type="text" class="search-bar" id="searchInput" placeholder="Search courses">
                        <i class="fas fa-search search-bar-icon" onclick="performSearch()"></i> <!-- Search Icon -->
                    </li>
                </ul>
            </nav>
            <div class="welcome-text">
                {{-- <h1>
                    <span class="welcome-text">WELCOME TO THE</span> <br>
                    <span class="witi-text">WITI SMS</span>
                </h1> --}}

                {{-- <h1>WELCOME TO THE WITI SMS</h1> --}}
                <h1 class="typing-effect">WELCOME TO THE WITI SMS</h1>

                {{-- <button class="login-btn">LOGIN</button> --}}
                <button onclick="window.location.href='{{ route('login') }}'">Login</button>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        <p>&copy; 2024 WITI Portal. All Rights Reserved.</p>
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