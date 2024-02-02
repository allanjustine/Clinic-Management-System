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
                                <li class="nav-item">
                                    <a class="nav-link" href="/about">About Us</a>
                                </li>
                                <li class="nav-item active">
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

    <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Send feedback to us!</h1>
            {{-- <span class="text-center mt-3 text-danger"><x-jet-validation-errors class="mb-4" /></span> --}}
            <form class="contact-form mt-5" action="{{ url('contact') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-6 py-2 wow fadeInLeft">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name"
                            value="{{ auth()->check() ? auth()->user()->name : '' }}" class="form-control"
                            placeholder="Full name..">

                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-sm-6 py-2 wow fadeInRight">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"
                            value="{{ auth()->check() ? auth()->user()->email : '' }}" class="form-control"
                            placeholder="Email address..">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 py-2 wow fadeInUp">
                        <label for="subject">Type</label>
                        <select name="type" id="" class="form-control">
                            <option value="">-- Select Type --</option>
                            <option value="Bugs">Bugs</option>
                            <option value="Post-Appointment Follow-up">Post-Appointment Follow-up</option>
                            <option value="Staff Interaction">Staff Interaction</option>
                            <option value="Wait Times">Wait Times</option>
                            <option value="Cleanliness and Comfort">Cleanliness and Comfort</option>
                            <option value="Effectiveness of Examinations">Effectiveness of Examinations</option>
                            <option value="Billing and Administrative Processes">Billing and Administrative Processes
                            </option>
                            <option value="About the System">About the System</option>
                            <option value="About the Doctor">About the Doctor</option>
                            <option value="Content Accuracy and Relevance">Content Accuracy and Relevance</option>
                            <option value="Appointment Booking Process">Appointment Booking Process</option>
                            <option value="Appointment Scheduling Process">Appointment Scheduling Process</option>
                        </select>
                        @error('type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12 py-2 wow fadeInUp">
                        <label for="message">Message</label>
                        <textarea id="message" class="form-control" name="message" rows="8" placeholder="Enter Message.."></textarea>
                        @error('message')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary wow zoomIn">Send Message</button>
            </form>
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

    <script src="../assets/js/google-maps.js"></script>

    <script src="../assets/js/theme.js"></script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>


    <style>
        ul {
            list-style-type: none;
        }
    </style>
</body>

</html>
