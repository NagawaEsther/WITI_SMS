{{-- attendance/register --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Attendance</title>
    <style>
        /* Basic styling for body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Styling for the form container */
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Styling for form elements */
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        select,
        input,
        button {
            padding: 10px;
            margin: 5px 0;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Button styling */
        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Responsive styling for smaller screens */
        @media (max-width: 600px) {
            .form-container {
                padding: 15px;
                width: 90%;
            }

            select,
            input,
            button {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <div class="form-container">
        <form action="{{ route('attendance.register', ['lectureId' => $lectureId]) }}" method="POST">
            @csrf
            <select name="lecture_id">
                @foreach ($lectures as $lecture)
                <option value="{{ $lecture->id }}">{{ $lecture->title }}</option>
                @endforeach
            </select>
            <input type="hidden" name="token" value="{{ md5(now()->timestamp) }}">
            <button type="submit">Register Attendance</button>
        </form>
    </div>

</body>

</html>



{{-- <form action="{{ route('attendance.register', ['lectureId' => $lectureId]) }}" method="POST">
    @csrf
    <input type="hidden" name="lecture_id" value="{{ $lectureId }}">
    <input type="hidden" name="token" value="{{ md5(now()->timestamp) }}">
    <button type="submit">Register Attendance</button>
</form> --}}