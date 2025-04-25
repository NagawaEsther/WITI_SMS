@extends('layout')

@section('title', 'Contact Us - WITI Portal')

@section('content')

<div class="contact-container">
    <!-- Welcome Section -->
    <div class="welcome-text">
        <h1>Contact Us</h1>
        <p>If you have any questions or would like more information, feel free to reach out to us. We are here to help!
        </p>
    </div>

    <!-- Contact Information and Form Section -->
    <div class="contact-grid">
        <!-- Contact Information -->
        <div class="contact-info">
            <h3>Get in Touch:</h3>
            <ul>
                <li><strong>Email:</strong> info@witi.ac.ug</li>
                <li><strong>Phone:</strong> +256 392 177 980</li>
                <li><strong>Address:</strong> Corporation Rise, City, Country</li>
            </ul>
        </div>

        <!-- Contact Form -->
        <div class="contact-form">
            <h3>Send Us a Message</h3>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" placeholder="Write your message here..." rows="5"
                        required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Style -->
<style>
    body {
        /* background-repeat: no-repeat;
        background-size: cover;


        background-image: url('https://pbs.twimg.com/media/Ga0M-33bwAAMWb2?format=jpg&name=4096x4096') */
    }

    .contact-container {

        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        font-family: Arial, sans-serif;
        background-image: url('https://pbs.twimg.com/media/Ga0M-33bwAAMWb2?format=jpg&name=4096x4096');
        background-repeat: no-repeat;
        background-size: cover;

    }

    .welcome-text h1 {
        font-size: 36px;
        color: #333;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-top: 40px;
    }

    .contact-info {
        background: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .contact-info h3 {
        font-size: 28px;
        color: #333;
        margin-bottom: 20px;
    }

    .contact-info ul {
        list-style-type: none;
        padding: 0;
    }

    .contact-info li {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .contact-form {
        background: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .contact-form h3 {
        font-size: 28px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 16px;
        color: #555;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .form-group button {
        padding: 12px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #45a049;
    }

    .footer {
        background-color: maroon;
        color: white;
        padding: 40px 0;
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-section {
        width: 24%;
    }

    .footer-section h4 {
        font-size: 20px;
        color: #fff;
        margin-bottom: 15px;
    }

    .footer-section ul {
        list-style-type: none;
        padding: 0;
    }

    .footer-section ul li {
        font-size: 16px;
    }

    .footer-section ul li a {
        color: #fff;
        text-decoration: none;
    }

    .footer-section ul li a:hover {
        text-decoration: underline;
    }

    /* Responsive for smaller screens */
    @media (max-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr;
            /* Single column layout on smaller screens */
        }
    }
</style>

<!-- Script -->
<script>
    // Function to handle form submission
    document.querySelector('.contact-form form').addEventListener('submit', function(e) {
        e.preventDefault();
        alert("Thank you for reaching out to us. We will get back to you soon!");
        // Here you can add actual form submission logic
    });
</script>


@endsection