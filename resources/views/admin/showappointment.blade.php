<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        @include('admin.add_user_view')
        @include('admin.add_walkin_patients')
        <!-- partial -->
        <div class="mt-5 col-md-12">
            <div class="table-responsive">
                <div class="col-md-4 mt-5">
                    <form action="/showappointment" method="GET">
                        <div class="d-flex">
                            <input type="text" name="search" class="form-control" id="search" placeholder="Search user..." value="{{ $searchQ }}">

                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                <div align="center" style="padding-top:50px;">
                    <x-jet-validation-errors class="mb-4 text-center" />
                    @if (session()->has('message'))
                    <div class="alert alert-success mt-3">
                        <button type="button" class="close" data-dismiss="alert">
                            Cut
                        </button>

                        {{ session()->get('message') }}
                    </div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-danger mt-3">
                        <button type="button" class="close" data-dismiss="alert">
                            Cut
                        </button>

                        {{ session()->get('error') }}
                    </div>
                    @endif
                    @if(auth()->user()->id == 3)
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-info float-end mb-3" data-bs-toggle="modal" data-bs-target="#add"><i class="mdi mdi-plus"></i> Add Patient Information</a>
                        <a href="#" class="btn btn-primary float-end mb-3" data-bs-toggle="modal" data-bs-target="#addW"><i class="mdi mdi-plus"></i> Add Consultation for Walk-in Patient</a>
                    </div>
                    @endif
                    <table class="table">
                        <tr style="background-color:black;" align="center">
                            <th>Profile</th>
                            <th>Patients Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>
                        @forelse ($usersWithAppointments as $appoint)
                        <tr align="center">
                            <td> <img @if ($appoint->profile_photo_path == null) src="userimage/temp-user.jpg"
                                @else
                                src="userimage/{{ $appoint->profile_photo_path }}" @endif
                                style="width: 100px; height: 100px;" alt=""></td>
                            <td>{{ $appoint->name }}</td>
                            <td>{{ $appoint->phone }}</td>
                            <td>{{ $appoint->email }}</td>
                            <td>{{ $appoint->address }}</td>
                            <td>{{ $appoint->created_at->format('Y d M') }}</td>
                            <td>

                                <a href="{{ url('patients-details', $appoint->id) }}" class="btn btn-info"><span class="mdi mdi-eye"></span> View</a>

                                {{-- <a href="{{ url('emailview', $appoint->id) }}" class="btn btn-primary">Send
                                Mail</a> --}}
                                <br>
                                <br>
                                {{-- <span class="text-muted">{{ $appoint->created_at->diffForHumans() }}</span> --}}
                            </td>

                        </tr>
                        @empty
                        <tr>
                            @if ($searchQ)
                            <td colspan="7" class="text-center">No {{ $searchQ }} founded!</td>
                            @else
                            <td colspan="7" class="text-center">No Appointments yet!</td>
                            @endif
                        </tr>
                        @endforelse

                    </table>
                </div>

            </div>

        </div>


        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
