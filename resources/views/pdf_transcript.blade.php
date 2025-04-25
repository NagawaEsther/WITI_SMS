<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Transcript</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            color: #333;
            margin: 20px;
        }
        h1, h2, h3 {
            color: #800000;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .student-info {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #800000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #800000;
            color: white;
        }
        .cgpa-section {
            margin-top: 20px;
        }
        .cgpa-section ul {
            list-style: none;
            padding: 0;
        }
        .cgpa-section li {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Official Transcript</h1>
        <h3>{{ $student->name }} (ID: {{ $student->id }})</h3>
    </div>

    <div class="student-info">
        {{-- <p><strong>Program:</strong> {{ $student->program->name ?? 'N/A' }}</p> --}}
        <p><strong>Date Issued:</strong> {{ now()->format('F j, Y') }}</p>
    </div>

    <h2>Grades</h2>
    <table>
        <thead>
            <tr>
                <th>Course Unit</th>
                <th>Assessment Type</th>
                <th>Total Marks</th>
                <th>Grade</th>
                <th>Semester</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assessments as $assessment)
                <tr>
                    <td>{{ $assessment->courseUnit->name }}</td>
                    <td>{{ $assessment->assessment_type }}</td>
                    <td>{{ $assessment->total_marks }}</td>
                    <td>{{ $assessment->grade }}</td>
                    <td>{{ $assessment->semester->name }}</td>
                    <td>{{ $assessment->year->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="cgpa-section">
        <h2>Transcript Summary</h2>
        <p><strong>Overall CGPA:</strong> {{ $cgpaData['overall'] }}</p>
        <h3>CGPA by Year and Semester</h3>
        <ul>
            @foreach ($cgpaData['by_year_semester'] as $key => $cgpa)
                <li>{{ $key }}: {{ $cgpa }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>