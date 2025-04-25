{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Identity Card</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
        }

        .card-container {
            width: 350px;
            height: 550px;
            border: 1px solid #000;
            margin: 0 auto;
            padding: 15px;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo {
            height: 60px;
        }

        .photo-container {
            width: 120px;
            height: 120px;
            margin: 0 auto 10px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #000;
        }

        .photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .details {
            font-size: 13px;
            line-height: 1.5;
        }

        .details .label {
            font-weight: bold;
        }

        .details .info {
            margin-bottom: 5px;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            left: 15px;
            right: 15px;
            font-size: 12px;
            text-align: center;
            color: #555;
        }

        .back-card {
            margin-top: 40px;
            padding-top: 15px;
            border-top: 1px dashed #333;
        }

        .back-card h4 {
            text-align: center;
            margin-bottom: 10px;
        }

        .instructions {
            font-size: 12px;
            line-height: 1.6;
        }

        .signature {
            margin-top: 20px;
            font-size: 12px;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #000;
            width: 60%;
            margin: 5px auto 0;
        }
    </style>
</head>

<body>

    <div class="card-container">
        <div class="header">
            <img src="https://www.witi.ac.ug/wp-content/uploads/2024/08/WITI_logo.png" alt="WITI Logo" class="logo">
            <h3>STUDENT IDENTITY CARD</h3>
        </div>

        <div class="photo-container">
            <img src="{{ public_path('storage/' . $card->photo) }}" alt="Student Photo" class="photo">
        </div>

        <div class="details">
            <div class="info"><span class="label">Name:</span> {{ $card->name }}</div>
            <div class="info"><span class="label">Program:</span> {{ $card->course }}</div>
            <div class="info"><span class="label">Reg No.:</span> {{ $card->reg_number }}</div>
            <div class="info"><span class="label">Class:</span> {{ $card->class }}</div>
            <div class="info"><span class="label">Issue Date:</span> {{ $card->issue_date }}</div>
            <div class="info"><span class="label">Valid Until:</span> {{ $card->expiry_date ?? 'December 31, 2025' }}
            </div>
        </div>

        <div class="back-card">
            <h4>WEST INSTITUTE OF TECHNOLOGY AND INNOVATION</h4>
            <div class="instructions">
                <p>1. This card must be carried at all times while on campus.</p>
                <p>2. This card is non-transferable.</p>
                <p>3. Report lost or stolen cards immediately.</p>
                <p>4. Return this card upon completion or withdrawal.</p>
            </div>

            <div class="signature">
                <div class="signature-line"></div>
                <p>Student's Signature</p>
            </div>

            <div class="signature">
                <div class="signature-line"></div>
                <p>Director's Signature</p>
            </div>
        </div>

        <div class="footer">
            If found, please return to: WITI Campus, P.O. Box 123, Kampala, Uganda
        </div>
    </div>

</body>

</html> --}}

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ID Card PDF</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
            margin: 20px;
        }

        .page {
            page-break-after: always;
        }

        .photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }

        .header,
        .footer {
            background-color: maroon;
            color: white;
            text-align: center;
            padding: 5px;
            margin-bottom: 10px;
        }

        .content {
            padding: 10px;
            border: 1px solid #ddd;
        }

        ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>

    <div class="page">
        <div class="header">STUDENT IDENTITY CARD - FRONT</div>
        <div class="content">
            <div style="text-align:center;">
                <img src="{{ public_path('storage/' . $card->photo) }}" class="photo" alt="Photo">
            </div>
            <p><strong>Name:</strong> {{ $card->name }}</p>
            <p><strong>Program:</strong> {{ $card->course }}</p>
            <p><strong>Reg No:</strong> {{ $card->reg_number }}</p>
            <p><strong>Class:</strong> {{ $card->class }}</p>
            <p><strong>Issue Date:</strong> {{ $card->issue_date }}</p>
            <p><strong>Valid Until:</strong> {{ $card->expiry_date ?? 'December 31, 2025' }}</p>
        </div>
    </div>

    <div class="page">
        <div class="header">STUDENT IDENTITY CARD - BACK</div>
        <div class="content">
            <p><strong>WEST INSTITUTE OF TECHNOLOGY AND INNOVATION</strong></p>
            <ul>
                <li>This card must be carried at all times while on campus.</li>
                <li>This card is non-transferable.</li>
                <li>Report lost or stolen cards immediately.</li>
                <li>Return this card upon completion or withdrawal.</li>
            </ul>
            <br>
            <p><strong>Signatures:</strong></p>
            <p>_____________________ (Student)</p>
            <p>_____________________ (Director)</p>
            <br>
            <p>If found, return to WITI Campus, P.O. Box 123, Kampala.</p>
        </div>
    </div>

</body>

</html>