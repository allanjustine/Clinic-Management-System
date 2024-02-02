<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha384-dTUE3FhOeMoSZKzmg3MXrDRs/DHfN9tZxKip7l9pDRlVprH5QZZJTN7x/ghwUK8i" crossorigin="anonymous">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <title>Espina Eye Care</title>

    <link rel="shortcut icon" href="{{ asset('../assets/img/custom-logo.jpg') }}" />

    <link rel="stylesheet" href="../assets/css/theme.css">

</head>

<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">Espina Eye Care</a>



        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
            aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
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
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login/Register </a>
                </li>

            </ul>
        </div> <!-- .navbar-collapse -->
    </div> <!-- .container -->
</nav>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    <style>
        ul {
            list-style-type: none !important;
        }
    </style>
</body>

</html>
