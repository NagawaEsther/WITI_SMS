{{-- @extends('layouts.app')
@section('content')
<div class="container">
    <h2>Identity Cards</h2>
    <a href="{{ route('identity_cards.create') }}" class="btn btn-success mb-3">Add New Card</a>
    <div class="row">
        @foreach($cards as $card)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('storage/' . $card->photo) }}" class="card-img-top"
                    style="height: 200px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5>{{ $card->name }}</h5>
                    <p>ID: {{ $card->reg_number }}</p>
                    <p>Class: {{ $card->class }}</p>
                    <p>DOB: {{ $card->dob }}</p>
                    <img src="{{ asset('storage/' . $card->qr_code) }}" style="width: 150px;">
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection --}}

{{-- @extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Identity Cards</h2>
        <a href="{{ route('identity_cards.create') }}" class="btn btn-success">Add New Card</a>
    </div>

    <div class="row">
        @foreach($cards as $card)
        <div class="col-md-4 mb-4">
            <div class="card-container">
                <div class="id-card">
                    <!-- Front of ID Card -->
                    <div class="front">
                        <div class="header">
                            <img src="https://www.witi.ac.ug/wp-content/uploads/2024/08/WITI_logo.png" alt="WITI Logo"
                                height="50px" width="60px" class="logo">
                        </div>

                        <div class="photo-container">
                            <img src="{{ asset('storage/' . $card->photo) }}" alt="Student Photo" class="photo">
                        </div>

                        <div class="details">
                            <div class="title">STUDENT IDENTITY CARD</div>

                            <div class="info">
                                <div class="label">Name:</div>
                                <div class="value">{{ $card->name }}</div>
                            </div>

                            <div class="info">
                                <div class="label">Program:</div>
                                <div class="value">{{ $card->course }}</div>
                            </div>

                            <div class="info">
                                <div class="label">REG NO.:</div>
                                <div class="value">{{ $card->reg_number }}</div>
                            </div>

                            <div class="info">
                                <div class="label">Class:</div>
                                <div class="value">{{ $card->class }}</div>
                            </div>

                            <div class="info">
                                <div class="label">Issue date:</div>
                                <div class="value">{{ $card->issue_date }}</div>
                            </div>
                        </div>

                        <div class="footer">
                            Valid until: {{ $card->expiry_date ?? 'December 31, 2025' }}
                        </div>
                    </div>

                    <!-- Back of ID Card -->
                    <div class="back">
                        <div class="back-header">
                            WEST INSTITUTE OF TECHNOLOGY AND INNOVATION
                        </div>

                        <div class="instructions">
                            <p>1. This card must be carried at all times while on campus.</p>
                            <p>2. This card is non-transferable.</p>
                            <p>3. Report lost or stolen cards immediately.</p>
                            <p>4. Return this card upon completion or withdrawal.</p>
                        </div>

                        <div class="signature">
                            <div class="line"></div>
                            <p>Student's Signature</p>
                        </div>

                        <div class="signature">
                            <div class="line"></div>
                            <p>Director's Signature</p>
                        </div>

                        <div class="footer">
                            If found, please return to WITI Campus
                            <br>P.O. Box 123, Kampala, Uganda
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2 d-flex justify-content-center">
                <a href="{{ route('identity_cards.edit', $card->id) }}" class="btn btn-sm btn-primary mx-1">Edit</a>
                <a href="{{ route('identity_cards.show', $card->id) }}" class="btn btn-sm btn-info mx-1">View</a>
                <form action="{{ route('identity_cards.destroy', $card->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger mx-1"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    /* ID Card Styles */
    .card-container {
        perspective: 1000px;
        height: 400px;
        /* Reduced the height */
        width: 300px;
        /* Reduced the width */
    }

    .id-card {
        width: 100%;
        height: 100%;
        background-color: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        position: relative;
        transition: transform 0.8s;
        transform-style: preserve-3d;
    }

    .card-container:hover .id-card {
        transform: rotateY(180deg);
    }

    .front,
    .back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
    }

    .back {
        transform: rotateY(180deg);
        background-color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 15px;
    }

    .header {
        height: 60px;
        /* Reduced height */
        background: whitesmoke;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    .logo {
        height: 50px;
        width: 200px;
        /* Reduced logo size */
    }

    .photo-container {
        width: 120px;
        /* Reduced photo container size */
        height: 120px;
        /* Reduced photo container size */
        border-radius: 50%;
        overflow: hidden;
        margin: 15px auto;
        border: 4px solid #f5f5f5;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .details {
        padding: 10px 20px;
        /* Reduced padding */
    }

    .title {
        color: rgb(54, 49, 49);
        font-size: 12px;
        /* Reduced font size */
        font-weight: bold;
        text-align: center;
        margin-bottom: 5px;
    }

    .info {
        display: flex;
        margin-bottom: 5px;
    }

    .label {
        width: 70px;
        /* Reduced label width */
        font-weight: bold;
        color: #555;
        font-size: 12px;
        /* Reduced font size */
    }

    .value {
        flex-grow: 1;
        color: maroon;
        font-size: 12px;
        /* Reduced font size */
    }

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        text-align: center;
        padding: 10px;
        background-color: rgb(185, 113, 113);
        color: white;
        font-size: 12px;
    }

    .back-header {
        text-align: center;
        color: #283593;
        font-weight: bold;
        margin-top: 20px;
    }

    .instructions {
        font-size: 12px;
        text-align: left;
        line-height: 1.5;
    }

    .signature {
        text-align: center;
        margin: 20px 0;
    }

    .line {
        width: 80%;
        margin: 10px auto;
        border-bottom: 1px solid #555;
    }
</style>
@endsection --}}

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Identity Cards</h2>
        <a href="{{ route('identity_cards.create') }}" class="btn btn-success">Add New Card</a>
    </div>

    <div class="row">
        @foreach($cards as $card)
        <div class="col-md-4 mb-4">
            <div class="card-container" id="card-{{ $card->id }}">
                <div class="id-card">
                    <!-- FRONT OF CARD -->
                    <div class="front card-face">
                        <div class="header">
                            <img src="https://www.witi.ac.ug/wp-content/uploads/2024/08/WITI_logo.png" alt="WITI Logo"
                                height="50px" width="60px" class="logo">
                        </div>

                        <div class="photo-container">
                            <img src="{{ asset('storage/' . $card->photo) }}" alt="Student Photo" class="photo">
                        </div>

                        <div class="details">
                            <div class="title">STUDENT IDENTITY CARD</div>
                            <div class="info"><span class="label">Name:</span><span class="value">{{ $card->name
                                    }}</span></div>
                            <div class="info"><span class="label">Program:</span><span class="value">{{ $card->course
                                    }}</span></div>
                            <div class="info"><span class="label">REG NO.:</span><span class="value">{{
                                    $card->reg_number }}</span></div>
                            <div class="info"><span class="label">Class:</span><span class="value">{{ $card->class
                                    }}</span></div>
                            <div class="info"><span class="label">Issue date:</span><span class="value">{{
                                    $card->issue_date }}</span></div>
                        </div>

                        <div class="footer">Valid until: {{ $card->expiry_date ?? 'December 31, 2025' }}</div>
                    </div>

                    <!-- BACK OF CARD -->
                    <div class="back card-face">
                        <div class="back-header">WOMEN'S INSTITUTE OF TECHNOLOGY AND INNOVATION</div>

                        <div class="instructions mt-2">
                            <p>1. This card must be carried at all times while on campus.</p>
                            <p>2. This card is non-transferable.</p>
                            <p>3. Report lost or stolen cards immediately.</p>
                            <p>4. Return this card upon completion or withdrawal.</p>
                        </div>

                        <div class="signature">
                            <div class="line"></div>
                            <p>Student's Signature</p>
                        </div>
                        <div class="signature">
                            <div class="line"></div>
                            <p>Director's Signature</p>
                        </div>

                        <div class="footer mt-2">
                            If found, please return to WITI Campus <br> P.O. Box 123, Kampala, Uganda
                        </div>
                    </div>
                </div>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="mt-2 d-flex justify-content-center">
                <a href="{{ route('identity_cards.edit', $card->id) }}"> <i class="fa fa-edit"></i></a>
                <a href="{{ route('identity_cards.show', $card->id) }}"> <i class="fa fa-eye"></i></a>
                <form action="{{ route('identity_cards.destroy', $card->id) }}" method="POST" class="d-inline mx-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"> <i
                            class="fa fa-trash"></i></a></button>
                </form>
                <a href="{{ route('identity_cards.download', $card->id) }}"
                    class="btn btn-sm btn-secondary mx-1">Download PDF</a>
                <button onclick="printCard({{ $card->id }})" class="btn btn-sm btn-dark mx-1">Print</button>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- JS -->
<script>
    function printCard(cardId) {
        const printContents = document.getElementById(`card-${cardId}`).innerHTML;
        const originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>

<!-- STYLE -->
<style>
    .card-container {
        perspective: 1000px;
        width: 100%;
        max-width: 300px;
        height: 400px;
        margin: auto;
    }

    .id-card {
        width: 100%;
        height: 100%;
        position: relative;
        transform-style: preserve-3d;
        transition: transform 0.8s ease;
    }

    .card-container:hover .id-card {
        transform: rotateY(180deg);
    }

    .card-face {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        padding: 15px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .front {
        z-index: 2;
    }

    .back {
        transform: rotateY(180deg);
    }

    .header {
        text-align: center;
    }

    .logo {
        height: 40px;
        width: 200px;
    }

    .photo-container {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        margin: 10px auto;
        border: 4px solid #ddd;
    }

    .photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .details {
        text-align: left;
    }

    .title {
        text-align: center;
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .info {
        display: flex;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .label {
        width: 70px;
        font-weight: bold;
        color: #333;
    }

    .value {
        flex: 1;
        color: #800000;
    }

    .footer {
        background: maroon;
        color: white;
        text-align: center;
        padding: 5px;
        font-size: 11px;
        border-radius: 0 0 15px 15px;
    }

    .back-header {
        text-align: center;
        font-weight: bold;
        color: maroon;
        font-size: 14px;
    }

    .instructions {
        font-size: 12px;
        margin-top: 10px;
        line-height: 3;
    }

    .signature {
        text-align: center;
        margin-top: 10px;
    }

    .signature .line {
        border-bottom: 1px solid #333;
        width: 80%;
        margin: auto;
        margin-bottom: 5px;
    }
</style>
@endsection