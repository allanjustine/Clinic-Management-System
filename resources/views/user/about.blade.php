<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Espina Eye Care</title>

    <link rel="shortcut icon" href="{{ asset('../assets/img/custom-logo.jpg') }}" />

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <img src="{{ asset('../assets/img/custom-logo.jpg') }}" alt="Custom Logo"
                    style="border-radius: 50%; width: 90px; height: 70px;">



                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        @if (Route::has('login'))
                            @auth

                                <li class="nav-item">
                                    <a class="nav-link" style="background-color:greenyellow; color:blue;"
                                        href="{{ url('myappointment') }}">My Appointment</a>
                                </li>

                                <x-app-layout>
                                    <x-slot name="header">

                                    </x-slot>


                                </x-app-layout>
                            @else
                                <li class="nav-item active">
                                    <a class="nav-link" href="/about">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/send-feedback">Submit Feedback</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login/Register </a>
                                </li>

                            @endauth
                        @endif
                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>

    <div class="page-section">
        <div class="container">
            <h1 class="text-center mb-2" style="font-size: 30px;">About us</h1>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInUp">
                    <div class="text-lg mt-5">
                        <p>Welcome to <strong>Espina Eye Care</strong>, where your vision is our priority! At
                            <strong>Espina Eye Care</strong>, we are dedicated to providing exceptional eye care
                            services to our community. Our
                            team of experienced and compassionate eye care professionals is committed to ensuring the
                            health and well-being of your eyes.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="page-section">
        <div class="container">
            <h1 class="text-center mb-2" style="font-size: 30px;">Our Mission</h1>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInUp">
                    <div class="text-lg mt-5">
                        <p>At <strong>Espina Eye Care</strong>, our mission is to deliver personalized and comprehensive
                            eye care
                            to enhance and protect your vision. We strive to create a warm and welcoming environment
                            where patients feel comfortable and confident in the care they receive.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="page-section">
        <div class="container">
            <h1 class="text-center mb-2" style="font-size: 30px;">Expertise You Can Trust</h1>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInUp">
                    <div class="text-lg mt-5">
                        <p>With years of experience in the field of optometry, our skilled team of optometrists and
                            support staff is equipped to handle a wide range of eye care needs. From routine eye exams
                            to advanced diagnostic services, we utilize the latest technology and industry best
                            practices to deliver the highest standard of care.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="page-section">
        <div class="container">
            <h1 class="text-center mb-2" style="font-size: 30px;">Services We Offer</h1>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInUp">
                    <div class="text-lg mt-5">

                        <ul>
                            <li><strong>Comprehensive Eye Exams:</strong> Regular eye exams are essential for
                                maintaining good eye
                                health. Our comprehensive eye exams cover a range of tests to assess your vision and
                                detect any potential issues.</li>
                            <li><strong>Contact Lens Fitting:</strong> Our experts can help you find the perfect contact
                                lenses for your lifestyle, ensuring comfort and clarity.</li>
                            <li><strong>Eyeglasses Selection:</strong> Explore our collection of stylish eyeglasses and
                                find the perfect frames to suit your personality and vision needs.
                                health. Our comprehensive eye exams cover a range of tests to assess your vision and
                                detect any potential issues.</li>
                            <li><strong>Treatment of Eye Conditions:</strong> Whether you're dealing with dry eyes,
                                allergies, or other eye conditions, we provide effective treatments to alleviate
                                discomfort and promote eye health.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container mt-5">
            <h1 class="text-center mb-2" style="font-size: 30px;">Testimonials</h1>
            <hr>
        </div>
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="images/profile.png" alt="image" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-md-8">
                                    <blockquote class="blockquote mb-0">
                                        <p>"I am extremely satisfied with the service I received. The team was very
                                            professional and helpful throughout the process."</p>
                                        <footer class="blockquote-footer">Allan Justine Mascariñas</footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <h1 class="text-center mb-2" style="font-size: 30px;">Patient-Centered Care</h1>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInUp">
                    <div class="text-lg mt-5">
                        <p>Your comfort and satisfaction are our top priorities. We take the time to listen to your
                            concerns, answer your questions, and provide personalized recommendations based on your
                            unique eye care needs. We believe in building long-lasting relationships with our patients
                            and becoming your trusted partner in maintaining optimal eye health.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="page-section">
        <div class="container">
            <h1 class="text-center mb-2" style="font-size: 30px;">Schedule Your Visit</h1>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInUp">
                    <div class="text-lg mt-5">
                        <p>Discover the difference of quality eye care at [Your Eye Clinic Name]. Schedule your
                            appointment today and let us take care of your vision needs. We look forward to welcoming
                            you to our clinic!</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="page-section">
        <div class="container">
            <div class="text-center mb-2" style="font-size: 30px;">Our Location</div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInRight">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3914.399502571485!2d124.9916865046528!3d11.15802755132744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3307d886d9fe5d4f%3A0x299bb6b82c3700a4!2sF.%20Montejo%20St.%20%26%20Pio%20Pedrosa%20Ave%2C%20Palo%2C%20Leyte!5e0!3m2!1sen!2sph!4v1706615691450!5m2!1sen!2sph"
                        width="750" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
    </div>


    <footer class="page-footer">
        <div class="container">
            <div class="row px-md-3">
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Company</h5>
                    <ul class="footer-menu">
                        <li><a href="/home">Home</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>More</h5>
                    <ul class="footer-menu">
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Advertise</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Our partners</h5>
                    <ul class="footer-menu">
                        <li><a href="#">One-Fitness</a></li>
                        <li><a href="#">One-Drugs</a></li>
                        <li><a href="#">One-Live</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Contact</h5>
                    <p class="footer-link mt-2">Cor. Pio Pedrosa & Montejo Sts. Sta. Cruz, Palo Leyte</p>
                    <a href="#" class="footer-link">09177052937</a> <strong>/</strong>
                    <a href="#" class="footer-link">09171365675</a>
                    <a href="#" class="footer-link">espinaeyecareclinic@gmail.com</a>

                    <h5 class="mt-3">Social Media</h5>
                    <div class="footer-sosmed mt-3">
                        <a href="https://www.facebook.com/espinaeyecare" target="_blank"><span
                                class="mai-logo-facebook-f"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
                    </div>
                </div>
            </div>

            <hr>

            <p id="copyright">Copyright &copy; 2024 <a href="#" target="_blank">Espina Eye Care</p>
        </div>
    </footer>

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>

</body>

</html>
