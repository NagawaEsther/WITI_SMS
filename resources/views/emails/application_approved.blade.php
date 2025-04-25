{{--
<!DOCTYPE html>
<html>

<head>
    <title>Application Approved</title>
</head>

<body>
    <p>Dear {{ $name }},</p>
    <p>Congratulations! Your application has been approved.</p>
    <p>We look forward to having you at Women Institute of Technology and Innovation.</p>
    <p>Best Regards,</p>
    <p>Women Institute of Technology and Innovation</p>
</body>

</html> --}}

<!DOCTYPE html>
<html>

<head>
    <title>Application Approved</title>
    <style>
        p {
            font-size: 18px;
            color: #555
        }
    </style>
</head>

<body>
    <h2>Congratulations, {{ $name }}!</h2>
    <p>Your application has been approved, and your student account has been created.</p>

    <p><strong>Login Details:</strong></p>
    <p>Email: {{ $email }}</p>
    <p>Temporary Password: {{ $password }}</p>

    <p>You can log in here: <a href="{{ $login_url }}">Login</a></p>

    <p>For security reasons, please change your password after logging in.</p>

    <p>Best regards,<br>

        Women's Institute of Technology and Innovation</p>
    <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRncb9RlCLihSJZMWcuGRA7D6Mvn4j8cuX1yQ&s' alt="logo"
        width='60px' height="60px">
</body>

</html>