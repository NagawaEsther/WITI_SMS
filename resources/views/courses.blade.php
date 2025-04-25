{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Portal Dashboard</title>
    <link rel="stylesheet" href="student-dashboard.css">
    <style>
        /* student-dashboard.css */

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 999;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .topnav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .sidebar {
            width: 220px;
            background-color: #34495e;
            color: white;
            position: fixed;
            top: 60px;
            left: 0;
            height: 100%;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            cursor: pointer;
        }

        .sidebar ul li:hover {
            background-color: #3d566e;
        }

        .sidebar ul li.active {
            background-color: #1abc9c;
            font-weight: bold;
        }

        .main-content {
            margin-left: 240px;
            padding: 100px 30px 30px;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin: 0 0 10px;
            font-size: 1.2rem;
            color: #2c3e50;
        }

        .card p {
            font-size: 1rem;
            color: #555;
        }

        .timetable,
        .assignments {
            margin-top: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table thead {
            background-color: #2c3e50;
            color: white;
        }

        table th,
        table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        footer {
            margin-top: 40px;
            padding: 20px;
            background-color: #2c3e50;
            color: white;
            text-align: center;
            border-top: 1px solid #444;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">My Student Portal</div>
        <div class="topnav">
            <span>Welcome, Student</span>
            <button class="logout-btn">Logout</button>
        </div>
    </header>

    <div class="sidebar">
        <ul>
            <li class="active">Dashboard</li>
            <li>My Courses</li>
            <li>Assignments</li>
            <li>Timetable</li>
            <li>Results</li>
            <li>Messages</li>
            <li>Settings</li>
        </ul>
    </div>

    <div class="main-content">
        <h2>Dashboard Overview</h2>
        <div class="card-grid">
            <div class="card">
                <h3>Enrolled Courses</h3>
                <p>5 Courses</p>
            </div>
            <div class="card">
                <h3>Upcoming Assignments</h3>
                <p>3 Pending</p>
            </div>
            <div class="card">
                <h3>Notifications</h3>
                <p>2 New</p>
            </div>
            <div class="card">
                <h3>Profile Completion</h3>
                <p>80%</p>
            </div>
        </div>

        <div class="timetable">
            <h2>Timetable</h2>
            <table>
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Course</th>
                        <th>Lecturer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Monday</td>
                        <td>9:00 AM - 11:00 AM</td>
                        <td>Mathematics</td>
                        <td>Mr. Andrew</td>
                    </tr>
                    <tr>
                        <td>Tuesday</td>
                        <td>10:00 AM - 12:00 PM</td>
                        <td>Physics</td>
                        <td>Ms. Stella</td>
                    </tr>
                    <tr>
                        <td>Wednesday</td>
                        <td>2:00 PM - 4:00 PM</td>
                        <td>Computer Science</td>
                        <td>Dr. John</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="assignments">
            <h2>Recent Assignments</h2>
            <table>
                <thead>
                    <tr>
                        <th>Assignment</th>
                        <th>Course</th>
                        <th>Due Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Essay on Quantum Physics</td>
                        <td>Physics</td>
                        <td>March 18, 2025</td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <td>Math Problem Set</td>
                        <td>Mathematics</td>
                        <td>March 15, 2025</td>
                        <td>Submitted</td>
                    </tr>
                    <tr>
                        <td>Java Programming Task</td>
                        <td>Computer Science</td>
                        <td>March 20, 2025</td>
                        <td>In Progress</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 My Student Portal. All Rights Reserved.</p>
    </footer>

</body>

</html> --}}