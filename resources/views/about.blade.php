{{-- @extends('layout')

@section('title', 'About Us | Pals\' Food Court')

@section('content')

@extends('layout')

@section('content')
<!-- Hero Section -->
<section class="relative bg-cover bg-center"
    style="background-image: url('https://pbs.twimg.com/media/Ga0M-33bwAAMWb2?format=jpg&name=4096x4096'); height: 500px; background-size:cover; background-repeat:no-repeat">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="container mx-auto text-center relative z-10 py-20">
        <h1 class="text-white text-5xl font-bold mb-4">Welcome to Pals' Food Court</h1>
        <p class="text-white text-xl mb-8">The Best Place for Delicious Meals and Great Company</p>
        <a href="#about" class="bg-green-700 text-white px-6 py-3 rounded-lg text-lg">Learn More</a>
    </div>
</section>

<!-- About Us Section -->
<section class="py-10 bg-white sm:px-4 lg:px-4 md:px-4" id="about">
    <div class="mx-auto px-10">
        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 p-4">
                <h2 class="text-2xl font-bold text-green-700 mb-8">About Us</h2>
                <p class="text-gray-600 text-2xl mb-4">We aim to provide a wonderful dining experience, combining great
                    food with excellent service.</p>
                <p class="text-gray-600 text-xl">Pals' Food Court is more than just a restaurant; it's a place to
                    gather, enjoy, and experience flavors from around the world. Our chefs bring creativity, passion,
                    and expertise to each dish, ensuring a memorable experience for every guest.</p>
            </div>
            <div class="w-full md:w-1/2 p-4">
                <img src="https://via.placeholder.com/500x500?text=Our+Restaurant" alt="About Us Image"
                    class="rounded-lg">
            </div>
        </div>
    </div>
</section>

<!-- Our Mission Section -->
<section class="py-20 bg-gray-100">
    <div class="mx-auto px-10">
        <h2 class="text-2xl font-bold text-center mb-8">Our Mission</h2>
        <p class="text-gray-600 text-2xl text-center mb-8">Our mission is to provide the best dining experience with
            great food, ambiance, and customer service.</p>
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/3 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4 text-green-700">
                        <i class="fas fa-award fa-3x"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Quality Service</h3>
                    <p class="text-gray-600 text-lg">Our experienced professionals provide top-notch services tailored
                        to your individual needs.</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4 text-green-700">
                        <i class="fas fa-leaf fa-3x"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Eco-Friendly Products</h3>
                    <p class="text-gray-600 text-xl">We use products that are kind to your skin and the environment.</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4 text-green-700">
                        <i class="fas fa-heart fa-3x"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Customer Satisfaction</h3>
                    <p class="text-gray-600 text-xl">Your satisfaction is our priority. We strive to make every visit
                        enjoyable and relaxing.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Vision Section -->
<section class="py-20 bg-gray-100">
    <div class="mx-auto px-10">
        <h2 class="text-2xl font-bold text-center mb-8">Our Vision</h2>
        <p class="text-gray-600 text-center mb-8">We envision being the leading food court, known for excellence and
            innovation in the food industry.</p>
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/3 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4 text-green-700">
                        <i class="fas fa-handshake fa-3x"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Partnerships</h3>
                    <p class="text-gray-600">Building strong partnerships to expand our reach and impact.</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4 text-green-700">
                        <i class="fas fa-lightbulb fa-3x"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Innovation</h3>
                    <p class="text-gray-600">Driving innovation to meet future challenges and opportunities.</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="mb-4 text-green-700">
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Community</h3>
                    <p class="text-gray-600">Empowering our community through education and support.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Team Section -->
<section class="py-20 bg-gray-100">
    <div class="mx-auto px-10">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Our Team</h2>
        <div class="flex flex-wrap justify-center">
            <!-- Team Member 1 -->
            <div class="w-full md:w-1/4 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://via.placeholder.com/150?text=Team+Member+1" alt="Team Member 1"
                        class="rounded-full mb-4 mx-auto">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">John Doe</h3>
                    <p class="text-gray-600">Head Chef</p>
                </div>
            </div>
            <!-- Team Member 2 -->
            <div class="w-full md:w-1/4 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://via.placeholder.com/150?text=Team+Member+2" alt="Team Member 2"
                        class="rounded-full mb-4 mx-auto">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Jane Smith</h3>
                    <p class="text-gray-600">Restaurant Manager</p>
                </div>
            </div>
            <!-- Team Member 3 -->
            <div class="w-full md:w-1/4 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://via.placeholder.com/150?text=Team+Member+3" alt="Team Member 3"
                        class="rounded-full mb-4 mx-auto">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Sarah Lee</h3>
                    <p class="text-gray-600">Customer Support</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@endsection --}}

@extends('layout')

@section('title', 'About Us')

@section('content')

<style>
    /* Global Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        color: black;

    }

    /* About Us Section */
    .about-us {
        /* max-width: 1200px; */
        margin: 0 auto;
        /* padding: 40px; */
    }

    /* Introduction Section */
    /* .introduction-section {
        text-align: center;
        margin-bottom: 40px;
        box-shadow: #f5f5f5;
        padding: 20px;
        border-radius: 5px;
    } */

    .introduction-section {
        background: white;
        padding: 30px;
        border-radius: 15px;
        margin-bottom: 40px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        color: #2c3e50;
        text-align: center;
        padding: 40px;
    }

    .introduction-section .title {
        font-size: 28px;
        color: maroon;
        font-family: "Times New Roman", Times, serif;
        margin-bottom: 20px;
    }

    .introduction-section .content-container {
        display: flex;
        /* flex-direction: column; */
        align-items: center;
        gap: 30px;
    }

    .introduction-section .intro-image {
        max-width: 100%;
        height: 400px;
        border-radius: 10px;
    }

    /* .introduction-section .empowering-message {
        font-size: 16px;
        line-height: 2;
        text-align: justify;
        font-family: "Roboto", sans-serif;
        margin-top: 20px;
    } */
    .empowering-message {
        font-family: "Roboto", sans-serif;
        /* Modern, clean font */
        line-height: 1.8;
        /* Improves readability */
        color: #333333;
        /* Dark gray text for readability */
        /* background: linear-gradient(
    to right,
    #ecb163,
    #7ba767
  );  */
        padding: 30px;
        /* Spacious padding around the text */
        border-radius: 10px;
        /* Rounded corners for a smooth look */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Subtle shadow for depth */
        max-width: 800px;
        /* Limit the width of the paragraph */
        margin: 0 auto;
        /* Center the content */
        text-align: justify;
        /* Justified text for a professional look */
        font-size: 18px;
        /* Slightly larger font size for better readability */
        transition: transform 0.3s ease-in-out;
        /* Smooth hover effect */
    }

    .empowering-message:hover {
        transform: translateY(-5px);
        /* Slight lift on hover */
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        /* Enhance shadow on hover */
    }

    .empowering-message a {
        color: #ff5a5f;
        /* Soft red color for links */
        text-decoration: none;
        /* Remove underline from links */
        font-weight: bold;
    }

    .empowering-message a:hover {
        text-decoration: underline;
        /* Underline links on hover */
    }


    /* Goals Section */
    .goals-section {
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 40px;
        border-radius: 10px;
        width: 1000px;
        margin-left: 200px
    }

    .goals-section .goals-wrapper {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .goals-section .goals-image {
        width: 100%;
        /* max-height: 400px; */
        max-height: 257px;
        object-fit: cover;
        border-radius: 10px;
    }

    .goals-section .goals-content {
        flex: 1;
    }

    .goals-section .goals-content .title {
        font-size: 28px;
        color: maroon;
        font-family: "Times New Roman", Times, serif;
        margin-bottom: 20px;
    }

    .goals-section .goals-content ul {
        list-style-type: none;
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        line-height: 1.8
    }

    .goals-section .goals-content ul li {
        position: relative;
        padding-left: 25px;
        margin-bottom: 10px;
        font-family: "Roboto", sans-serif;

    }

    .goals-section .goals-content ul li:before {
        content: "✔";
        position: absolute;
        left: 0;
        color: maroon;
    }

    /* Core Values Section
    .core-values-section {
        margin-top: 50px;
    }

    .core-values-section .title {
        text-align: center;
        font-size: 28px;
        color: maroon;
        font-family: "Times New Roman", Times, serif;
        margin-bottom: 40px;
    }

    .core-values-section .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 30px;
    }

    .core-values-section .value-card {
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .core-values-section .value-card h3 {
        font-size: 20px;
        color: maroon;
        margin-bottom: 10px;
    }

    .core-values-section .value-card p {
        font-size: 16px;
        color: black;
        line-height: 1.6;
    } */



    /* Core Values Section */
    .core-values-section {
        background: linear-gradient(135deg, #f7f9fa, #ffffff);
        padding: 40px 20px;
        border-radius: 15px;
        margin-top: 52px;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 36px;
    }

    .value-card {
        background: #ffffff;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: left;
    }

    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 16px 40px rgba(255, 165, 0, 0.4);
    }

    .title {
        text-align: center;
        color: maroon;
    }


    .value-card h3 {
        font-size: 14px;
        text-align: center;
        color: #40a161;
        font-weight: 500px;
        margin-bottom: 10px;
    }

    .value-card p {
        font-size: 16px;
        font-family: "Roboto", sans-serif;
        color: black;
        line-height: 2;
    }


    /* Programs Section */
    /* .programs-section {
        background-color: #fff;
        padding: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
        border-radius: 10px;
    }

    .programs-section .programs-title {
        font-size: 28px;
        text-align: center;
        color: maroon;
        margin-bottom: 20px;
    }

    .programs-section .programs-list {
        list-style-type: none;
        padding-left: 0;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;
        line-height: 1.6;
    }

    .programs-section .programs-list .programs-item {
        margin-bottom: 15px;
    }

    .programs-section .programs-list .highlight {
        font-weight: bold;
        color: #f09226;
    } */

    .programs-title {
        text-align: center;
        font-size: 22px;
        font-weight: bold;
        color: maroon;
        margin-bottom: 2rem;
        margin-top: 40px;
    }

    .programs-list {
        list-style: none;
        padding: 0;
        margin: 0 auto;
        max-width: 800px;
    }

    .programs-item {
        font-size: 16px;
        line-height: 1.8;
        color: black;
        margin-bottom: 1.5rem;
        padding: 0.5rem;
        background: #fff;
        border-left: 5px solid maroon;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .highlight {
        color: maroon;
    }

    /* Team Section */
    .team-section {
        background-color: #f5f5f5;
        padding: 50px 0;
    }

    .team-section .team-background {
        background-image: url('https://pbs.twimg.com/media/F68toznWMAAfV1K?format=jpg&name=4096x4096');
        background-size: cover;
        background-position: center;
        padding: 100px 20px;
    }

    .team-section .team-overlay {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 40px;
        text-align: center;
        border-radius: 8px;
    }

    .team-section .team-title {
        font-size: 32px;
        color: #fff;
        font-family: "Times New Roman", Times, serif;
        margin-bottom: 20px;
    }

    .team-section .team-description {
        font-size: 18px;
        color: #fff;
        line-height: 1.6;
    }

    /* Responsive Styles */
    @media screen and (max-width: 768px) {
        .goals-section .goals-wrapper {
            flex-direction: column;
            align-items: center;
        }

        .core-values-section .values-grid {
            grid-template-columns: 1fr;
        }
    }

    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 16px 40px rgba(255, 165, 0, 0.4);
    }

    .video-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        /* space between videos */
        max-width: 100%;
        /* optional: limit width if needed */
    }

    .intro-video {
        width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
</style>


<body>

    <div class="about-us">

        <!-- Introduction and Mission Statement -->
        <section class="introduction-section">
            <h2 class="title">Who we are</h2>
            <div class="content-container">
                <div class="video-container">
                    <video width="100%" controls autoplay muted loop class="intro-video">
                        <source
                            src="https://dm0qx8t0i9gc9.cloudfront.net/watermarks/video/rKqc8upnUkb8ehmf4/videoblocks-june7_sfx7zd0k9__4b4399baccfa9810121ec3046ce043e6__P360.mp4"
                            type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <video width="100%" controls autoplay muted loop class="intro-video">
                        <source
                            src="https://dm0qx8t0i9gc9.cloudfront.net/watermarks/video/rKqc8upnUkb8ehmf4/videoblocks-july49_szwpgxr99__a26b493bc04482babc0e1ed007e0c453__P360.mp4"
                            type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                {{-- <img src="https://pbs.twimg.com/media/GNCzzE7XcAAxdfS?format=jpg&name=4096x4096"
                    alt="Image representing women in tech" class="intro-image"> --}}
                <p class="empowering-message">
                    Welcome to the Women’s Institute of Technology and Innovation (WITI) community!
                    This is a space where we come together to empower, educate, and inspire women and girls to thrive in
                    the world of technology and innovation. At WITI, our mission is to equip women with the skills,
                    knowledge, and confidence they need to become leaders and change-makers in the tech ecosystem.

                    We focus on creating opportunities through training, mentorship, innovation programs, and
                    partnerships that foster digital literacy, entrepreneurship, and career growth in technology.
                    Whether you’re a student, aspiring tech professional, innovator, or entrepreneur, WITI is here to
                    support your journey.

                    Our vision is to build an inclusive and diverse tech landscape where women are not only participants
                    but pioneers in shaping the future of technology. Through workshops, community engagements, and
                    hands-on learning, we strive to bridge the gender gap in tech and promote sustainable development
                    through innovation.

                    {{-- Join us in breaking barriers, unlocking potential, and driving meaningful impact. Together, we
                    are
                    building a future where women lead, innovate, and transform society through the power of technology.

                    Our mission is to bridge the gender gap in the tech industry by providing access to quality
                    education, digital skills training, leadership development, mentorship, and innovation-driven
                    programs. --}}
                </p>
            </div>
        </section>

        <!-- Goals Section -->
        <section class="goals-section">
            <div class="goals-wrapper">
                <div class="image-container">
                    <img src="https://pbs.twimg.com/media/GYT2xVXXwAA6I3I?format=jpg&name=4096x4096"
                        alt="Empowered women in tech" class="goals-image">
                </div>
                <div class="goals-content">
                    <h2 class="title">Our Goals</h2>
                    <ul>
                        <li> Create Equal Access to Opportunities</li>

                        <li>Foster Women-Led Innovation and Entrepreneurship</li>
                        <li>Increase the number of women participating in technology.</li>
                        <li>Build a Strong Network of Mentorship and Leadership</li>
                        <li>Provide mentorship and training programs.</li>
                        {{-- <li>Support women-led tech startups.</li>
                        <li>Create a thriving network for women in tech to connect, collaborate, and grow.</li> --}}
                    </ul>
                </div>
            </div>
        </section>

        <!-- Core Values Section -->
        <section class="core-values-section">
            <h2 class="title">Values We Stand By</h2>
            <div class="values-grid">
                <div class="value-card">
                    <h3>Openness</h3>
                    <p>We strive to ensure easy accessibility, be very accommodative, value everyone's opinion and allow
                        everyone to freely express themselves.</p>
                </div>
                <div class="value-card">
                    <h3>Simplicity</h3>
                    <p>We value being straightforward, plain, and being able to be easily understood.</p>
                </div>
                <div class="value-card">
                    <h3>Integrity</h3>
                    <p>Encompasses honesty, truthfulness, reliability, and honor.</p>
                </div>
                <div class="value-card">
                    <h3>Exceptional Quality</h3>
                    <p>We strive to be a 'world-class' company that sets a new quality standard without being limited to
                        what others think or say.</p>
                </div>
                <div class="value-card">
                    <h3>Innovation</h3>
                    <p>Goes to the core of providing the best possible solutions always—produce new technology.</p>
                </div>
                <div class="value-card">
                    <h3>Agility</h3>
                    <p>Our responsiveness to internal and external factors is with speed and efficiency.</p>
                </div>
            </div>
        </section>

        <!-- Programs and Services Section -->
        <section class="programs-section">
            <div class="container">
                <h2 class="programs-title">PROGRAMS AND SERVICES</h2>
                <ul class="programs-list">
                    <li class="programs-item">
                        <span class="highlight">Coding bootcamps</span>, hackathons, and workshops.
                    </li>
                    <li class="programs-item">
                        <span class="highlight">Mentorship programs</span> connecting experienced professionals with
                        emerging talent.
                    </li>
                    <li class="programs-item">
                        <span class="highlight">Networking opportunities</span> through meetups, conferences, and
                        webinars.
                    </li>
                </ul>
            </div>
        </section>

        <!-- Team Section -->
        <section class="team-section">
            <div class="team-background">
                <div class="team-overlay">
                    <h2 class="team-title">Meet The Community</h2>
                    <p class="team-description">
                        Our dedicated team, supported by Africa is Talking, is committed to driving change and
                        empowering women in technology.
                    </p>
                </div>
            </div>
        </section>

    </div>

</body>

</html>
@endsection