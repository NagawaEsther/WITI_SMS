{{--
<!DOCTYPE html>
<html>

<head>
    <title>Password Changed</title>
</head>

<body>
    <p>Dear {{ $name }},</p>
    <p>Your password has been changed successfully.</p>
    <p>If you did not make this change, please contact support immediately.</p>
    <p>Best Regards,<br>Pals' Food Court Team</p>
</body>

</html> --}}

{{-- <p>Hello {{ $user->first_name }},</p>
<p>Your password has been successfully changed.</p>
<p>If you did not request this change, please contact our support team immediately.</p>
<p>Best regards,<br>WITI</p> --}}

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Change Notification</title>
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
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: maroon;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 10px;
        }

        /* .btn:hover {
            background: #0056b3;
        } */
    </style>
</head>

<body>

    <div class="container">
        <h2>Password Changed Successfully</h2>
        <p>Hello <strong>{{ $user->first_name }}</strong>,</p>

        <p>Your password has been successfully changed. If you made this change, no further action is required.</p>

        <p>If you did not request this change, please contact our support team immediately to secure your account.</p>

        <p><a href="mailto:support@witi.com" class="btn">Contact Support</a></p>

        <p class="footer">
            Best regards,<br>
            <strong>WITI Support Team</strong>

            <br>
            <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRncb9RlCLihSJZMWcuGRA7D6Mvn4j8cuX1yQ&s'
                alt="logo" width='150px' height="auto">
        </p>
    </div>

</body>

</html>