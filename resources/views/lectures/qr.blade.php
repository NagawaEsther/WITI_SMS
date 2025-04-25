<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture QR Code</title>
</head>

<body>
    <h1>QR Code for Lecture {{ $lectureId }}</h1>

    <!-- Generate the QR code -->
    <div>
        {!! QrCode::size(250)->generate(route('attendance.register', ['lectureId' => $lectureId, 'token' =>
        md5($lectureId . now()->timestamp)])) !!}
    </div>
</body>

</html>