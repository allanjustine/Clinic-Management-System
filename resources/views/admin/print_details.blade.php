<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">

    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;

        }

    </style>

    @include('admin.css')
</head>

<body>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content" style="padding-top: 10px;">
            <div class="container-fluid">

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-md-6 d-flex">
                                        <div class="img-fluid">
                                            <img src="{{ asset('../assets/img/custom-logo.jpg') }}" class="rounded-circle" style="width:150px; height: 150px;">
                                        </div>
                                        <address class="mt-5">
                                            <h1 class="card-title"><strong>ESPINA EYE CARE CLINIC</strong></h1>
                                            <br>
                                            <br>
                                            Cor. Pio Pedrosa & Montejo Sts. Sta. Cruz<br>
                                            Palo Leyte, Philippines<br>
                                            Phone: 09177052937 / 09171365675<br>
                                            Email: espinaeyecareclinic@gmail.com
                                        </address>
                                    </div>
                                    <div class="col-md-6 pr-10">
                                        <div class="mt-5 " style="text-align: right ;margin-right: 40px;">

                                            <b>Invoice #<span id="inv-no">{{ rand(1000000, 9999999) }}</span></b><br><br>
                                            <b>Invoice To: </b><span id="customer">{{ $appoint->name }}
                                            </span><br>
                                            <b>Appointment ID: </b><span id="app-code">{{ $appoint->id }}</span><br>
                                            <b>Appointment Date: </b><span id="app-date">{{ $appoint->created_at->format('F d, Y') }}</span><br>
                                            <b>Appointment Time: </b><span id="app-date">{{ \Carbon\Carbon::parse($appoint->time)->format('h:i A') }}</span><br>

                                        </div>

                                    </div>
                                </div>

                                <div class="row mt-3 p-5">

                                    <h2 class="mt-5">Patient Details</h2>
                                    <table id="example1" class="table">
                                        <thead>
                                            <tr>
                                                <th>Patients Details</th>
                                                <th>Assigned Doctor</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-white">
                                                <td>
                                                    <p>{{ $appoint->name }}</p>
                                                    <p class="text-sm text-muted italic">({{ $appoint->appointment_for }})</p>
                                                    <p class="text-sm">{{ $appoint->phone }}</p>
                                                </td>
                                                <td>{{ $appoint->doctor->name }}</td>
                                                <td>{{ $appoint->email }}</td>
                                                <td>{{ $appoint->created_at->format('F d, Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($appoint->time)->format('h:i A') }}</td>
                                                <td>{{ $appoint->status }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h2 class="mt-5">Medical History</h2>
                                    <table class="table mt-1">
                                        <thead>
                                            <tr>
                                                <th>ID #</th>
                                                <th>PATIENTS NAME</th>
                                                <th>SPHERE</th>
                                                <th>CYLINDER</th>
                                                <th>AXIS</th>
                                                <th>VA</th>
                                                <th>ADD/VA</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse($histories as $history)
                                            <tr>
                                                <td>{{ $history ? $history->id : 'N/A' }}</td>
                                                <td>{{ $history ? $history->appointment->name : 'N/A' }}</td>
                                                <td>{{ $history ? $history->sphere : 'N/A' }}</td>
                                                <td>{{ $history ? $history->cylinder : 'N/A' }}</td>
                                                <td>{{ $history ? $history->axis : 'N/A' }}</td>
                                                <td>{{ $history ? $history->va : 'N/A' }}</td>
                                                <td>{{ $history ? $history->add_or_va : 'N/A' }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                                <td>N/A</td>
                                            </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                </div>
                                @forelse($histories as $history)
                                <u>
                                    <p><strong>Remarks: </strong>{{ $history ? $history->remarks : 'N/A' }}</p>
                                </u>
                                @empty
                                <u>N/A</u>
                                @endforelse

                            </div>
                            <div class="card-footer" id="hide-on-print" style="text-align: end;">
                                <h4><a href="/showappointment" onclick="window.print()" class="btn btn-warning text-dark"><span class="mdi mdi-eye"></span>
                                        PRINT</a></h4>
                            </div>

                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
    </div>
    <!--/. container-fluid -->
    </section>
    <!-- /.content -->
    </div>

    <style>
        @media print {
            #hide-on-print {
                display: none;
            }
        }

    </style>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
