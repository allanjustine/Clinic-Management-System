<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Espina Eye Care</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">

    <link rel="shortcut icon" href="{{ asset('../assets/img/custom-logo.jpg') }}" />
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand brand-logo-mini" href="/home"><img src="{{ asset('../assets/img/custom-logo.jpg') }}" alt="Custom Logo" style="border-radius: 50%; width: 50px; height: 50px;"></a>



                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link" style="background-color:greenyellow; color:blue;" href="{{ url('myappointment') }}">My Appointment</a>
                        </li>

                        <x-app-layout>
                            <x-slot name="header">

                            </x-slot>


                        </x-app-layout>
                        @else
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login </a>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}"> Register</a>
                        </li>

                        @endauth
                        @endif

                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>

    <div class="container">
        <h1 class="mt-5" style="font-size: 30px;">
            My Appointments
        </h1>
    </div>
    @include('user.appointment')
    <div class="container d-flex justify-content-end">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i> Add New Appointment</a>
    </div>
    <div align="center" style="padding:70px;">
        <x-jet-validation-errors class="mb-4 text-center" />
        <table class="table table-dark">
            <tr align="center">
                <th style="padding:10px; font-size:20px; color:white;">Patients Details</th>
                <th style="padding:10px; font-size:20px; color:white;">Time</th>
                <th style="padding:10px; font-size:20px; color:white;">My Doctor</th>
                <th style="padding:10px; font-size:20px; color:white;">Status</th>
                <th style="padding:10px; font-size:20px; color:white;">Action</th>
            </tr>

            @forelse ($appoint->sortByDesc('created_at') as $appoints)
            <tr align="center">
                <td style="padding:10px; color:white;">
                    <p>{{ \Carbon\Carbon::parse($appoints->date)->format('F d, Y') }}</p>
                    @if($appoints->appointment_for != 'My Self')
                    <p> <strong>{{ $appoints->name }}</strong> </p>
                    @endif
                    <p class="text-white italic text-sm">({{ $appoints->appointment_for }})</p>
                </td>
                <td style="padding:10px; color:white;">
                    @if ($appoints->status == 'Canceled')
                    N/A
                    @else
                    <span class="text-sm">{{ $appoints->time ? \Carbon\Carbon::parse($appoints->time)->format('h:i A') : 'Waiting for approval...' }}</span>
                    @endif
                </td>
                <td style="padding:10px; color:{{ $appoints->doctor_id == null ? 'red;' : 'white;' }}">{{ $appoints->doctor->name ?? 'No doctor selected yet' }}</td>
                <td style="padding:10px; color:
                    {{ $appoints->status == 'Canceled' ? 'red;' : '' }}
                    {{ $appoints->status == 'In progress' ? 'red;' : '' }}
                    {{ $appoints->status == 'Approved' ? 'green;' : '' }}">
                    {{ $appoints->status == 'Canceled' ? 'Rejected' : '' }}
                    {{ $appoints->status == 'In progress' ? 'Pending' : '' }}
                    {{ $appoints->status == 'Approved' ? 'Approved' : '' }}
                </td>
                <td>
                    @if ($appoints->status == 'Approved')
                    <div class="btn btn-outline-success">Confirmed</div>
                    @elseif($appoints->status == 'Canceled')
                    <div class="btn btn-outline-danger">Rejected</div>
                    <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#reason{{ $appoints->id }}">Show Reason</a>
                    @else
                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')" href="{{ url('cancel_appoint', $appoints->id) }}" class="btn btn-danger">Cancel</a>
                    @endif
                    <br>
                    <span class="text-muted">{{ $appoints->created_at->diffForHumans() }}</span>
                </td>

                <div class="modal fade" id="reason{{ $appoints->id }}" tabindex="-1" aria-labelledby="reasonLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="reasonLabel">Reason why rejected...</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $appoints->reason }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </tr>
            @empty
            <tr>
                <td style="padding:10px; color:white;" colspan="5" class="text-center">No appointments yet!
                </td>
            </tr>
            @endforelse
        </table>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>

</body>

</html>
