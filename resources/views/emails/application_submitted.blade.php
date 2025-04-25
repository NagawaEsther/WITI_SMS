{{--
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
        }

        .info {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin: 15px 0;
            text-align: left;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: maroon;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 15px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Application Received</h2>
        <p>Dear <strong>{{ $name }}</strong>,</p>

        <p>We have successfully received your application. Our admissions team will review it and get back to you
            shortly.</p>



        <p>Thank you for applying! If you have any questions, feel free to <a href="mailto:support@witi.com"
                class="btn">Contact Support</a>.</p>

        <p class="footer">
            Best Regards,<br>
            <strong>WITI Admissions Team</strong><br>
            <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRncb9RlCLihSJZMWcuGRA7D6Mvn4j8cuX1yQ&s'
                alt="logo" width='150px' height="auto">
        </p>
    </div>

</body>

</html> --}}


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
            /* Changed from center to left */
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
            font-size: 18px;
            line-height: 1.6;
        }

        .info {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            margin: 15px 0;
            text-align: left;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        .btn {
            display: inline-block;
            padding: 5px 15px;
            background: maroon;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 15px;
        }

        /* .btn:hover {
            background: #0056b3;
        } */
    </style>
</head>

<body>

    <div class="container">
        <h2>Application Received</h2>
        <p>Dear <strong>{{ $name }}</strong>,</p>

        <p>We have successfully received your application. Our admissions team will review it and get back to you
            shortly.</p>

        {{-- <div class="info">
            <p><strong>Program:</strong> {{ $application->program->name }}</p>
            <p><strong>Cohort:</strong> {{ $application->cohort->name }}</p>
        </div> --}}

        <p>Thank you for applying! If you have any questions, feel free to <a href="mailto:support@witi.com"
                class="btn">Contact Support</a>.</p>

        <p class="footer">
            Best Regards,<br>
            <strong>WITI Admissions Team</strong><br>
            <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRncb9RlCLihSJZMWcuGRA7D6Mvn4j8cuX1yQ&s'
                alt="logo" width='60px' height="60px">
        </p>
    </div>

</body>

</html>