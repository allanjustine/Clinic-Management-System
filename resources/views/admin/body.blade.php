<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $totalAppointments }}</h3>
                                    {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-calendar-star icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Appointments</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $approvedAppointments }}</h3>
                                    {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> --}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <span class="mdi mdi-calendar-check icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Approved Appointments</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $canceledAppointments }}</h3>
                                    {{-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p> --}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-calendar-remove icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Canceled Appointments</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $pendingAppointments }}</h3>
                                    {{-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p> --}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-warning">
                                    <span class="mdi mdi-calendar-clock icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Pending Appointments</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $totalUsers }}</h3>
                                    {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-account-group icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Users</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $totalFeedbacks }}</h3>
                                    {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-account-clock icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Feedbacks</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Appointments</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr align="center">
                                        <th>Patients Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($approved as $appoint)
                                        <tr align="center">
                                            <td>{{ $appoint->first_name }} @if ($appoint->middle_name)
                                                    <span class="uppercase">{{ $appoint->middle_name }}</span>.
                                                    @endif {{ $appoint->last_name }}@if ($appoint->extension)
                                                        , <span class="capitalize">{{ $appoint->extension }}</span>
                                                    @endif
                                            </td>
                                            <td>{{ $appoint->phone }}</td>
                                            <td>{{ $appoint->email }}</td>
                                            <td>{{ $appoint->date }}</td>
                                            <td>
                                                <div class="badge badge-outline-success">{{ $appoint->status }}</div>
                                                <br>
                                                <br>
                                                <span
                                                    class="text-muted">{{ $appoint->created_at->diffForHumans() }}</span>
                                            </td>

                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No Recent Appointments yet!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>


    <script>
        function updateCurrentDateTime() {
            var currentDateTimeElement = document.getElementById("currentDateTime");
            var currentTime = new Date();

            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();

            var ampm = hours >= 12 ? 'PM' : 'AM';

            hours = hours % 12;
            hours = hours ? hours : 12;

            minutes = (minutes < 10) ? "0" + minutes : minutes;
            seconds = (seconds < 10) ? "0" + seconds : seconds;

            var timeString = hours + ":" + minutes + ":" + seconds + " " + ampm;

            var currentDate = currentTime.toDateString();

            var dateTimeString = "Current Date and Time: " + currentDate + " " + timeString;

            currentDateTimeElement.innerText = dateTimeString;
        }

        setInterval(updateCurrentDateTime, 1000);

        updateCurrentDateTime();
    </script>
