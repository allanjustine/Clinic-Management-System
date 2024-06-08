<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <title>Espina Eye Care</title>

    <link rel="shortcut icon" href="{{ asset('../assets/img/custom-logo.jpg') }}" />

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
                        <li class="nav-item active">
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
                                <li class="nav-item">
                                    <a class="nav-link" href="/about">About Us</a>
                                </li>
                                {{-- <li class="nav-item">
                            <a class="nav-link" href="/doctors">Doctors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/blog">News</a>
                            </li> --}}
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

    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                Cut
            </button>

            {{ session()->get('message') }}
        </div>
    @endif


    <div class="page-hero bg-image">
        <div id="carouselExampleAutoplaying" class="carousel slide carousel-fade" data-bs-ride="carousel"
            data-bs-interval="5000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="4"
                    aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/img/bg_image_1.jpg" class="d-block w-100" style="height: 550px;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/bg2.jpg" class="d-block w-100" style="height: 550px;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/bg3.jpg" class="d-block w-100" style="height: 550px;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/bg4.png" class="d-block w-100" style="height: 550px;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/bg5.jpg" class="d-block w-100" style="height: 550px;" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>

    <div class="bg-light">
        {{-- <div class="page-section py-3 mt-md-n5 custom-index">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-secondary text-white">
                                <span class="mai-thumbs-up"></span>
                            </div>
                            <p><span>Request</span> an appointments</p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-primary text-white">
                                <span class="mai-eye"></span>
                            </div>
                            <p><span>Good</span> eyesight</p>
                        </div>
                    </div>
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="mai-location"></span>
                            </div>
                            <p><span>Espina</span> Eye Care Clinic</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .page-section --> --}}

        <div class="page-section pb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <h1>Welcome to Espina Eye Care Clinic</h1>
                        <p class="text-grey mb-4">At Espina Eye Care Clinic, we are delighted to welcome you to our
                            online home! Your journey to optimal eye health and clear vision begins here.</p>
                        <a href="/about" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                        <div class="img-place custom-img-1">
                            <img src="../assets/img/bg-doctor.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .bg-light -->
    </div> <!-- .bg-light -->

    <!-- doctor part cut out -->
    @include('user.doctor')


    <!-- .page-section -->
    {{-- @include('user.latest') --}}
    <!-- appointment part -->
    <!-- .page-section -->
    <!-- banner part delete korbo -->
    <!-- .banner-home -->

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>

    <style>
        .carousel-control-next {
            background-color: transparent;
            border: none;
        }

        .carousel-control-prev {
            background-color: transparent;
            border: none;
        }
    </style>
</body>

</html>
