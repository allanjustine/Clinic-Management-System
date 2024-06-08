<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>
<style>
    .box-button {
        padding: 10px 20px;
        /* Adjust padding for a boxy look */
        border-radius: 0;
        /* Remove border radius for sharp edges */
        font-size: 16px;
        /* Adjust font size if needed */
        font-weight: bold;
        /* Make the text bold */
        background-color: #007bff;
        /* Bootstrap primary color */
        color: white;
        /* Text color */
        border: none;
        /* Remove border */
        cursor: pointer;
        /* Pointer cursor on hover */
    }

    .box-button:hover {
        background-color: #0056b3;
        /* Darker shade on hover */
    }

</style>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
        @include('admin.add_doctor')
        <div class="table-responsive" style="margin-top:80px;">
            @if (session()->has('message'))
            <div class="alert alert-success mt-5">
                <button type="button" class="close" data-dismiss="alert">
                    Cut
                </button>

                <h6 class="text-center">{{ session()->get('message') }}</h6>
            </div>
            @endif
            <x-jet-validation-errors class="mb-4 text-center" />
            <div class="container">
                <!-- Add the 'box-button' class to the button -->
                <button type="button" class="btn btn-primary float-end mt-2 mb-3" data-bs-toggle="modal" data-bs-target="#add"><i class="mdi mdi-plus"></i> Add new doctor</button>

            </div>
            <div align="center">

                <table class="table">
                    <thead>
                        <tr style="background-color:black;" align="center">
                            <th style="padding:10px;">Doctor Name</th>
                            <th style="padding:10px;">Phone</th>
                            <th style="padding:10px;">Specialist</th>
                            <th style="padding:10px;">Image</th>
                            <th style="padding:10px;">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $doctor)
                        <tr align="center">
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->phone }}</td>
                            <td>{{ $doctor->speciality }}</td>
                            <td> <img src="doctorimage/{{ $doctor->image }}" style="width: 100px; height: 100px;" alt=""></td>
                            <td>
                                <form action="{{ url('deletedoctor', $doctor->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" href="">Delete</button>
                                    <a class="btn btn-primary" href="{{ url('updatedoctor', $doctor->id) }}">Update</a>
                                    <a class="btn btn-warning" href="#" data-bs-target="#details{{ $doctor->id }}" data-bs-toggle="modal">View patients</a>
                                </form>
                            </td>
                        </tr>

                        <div class="modal fade" id="details{{ $doctor->id }}" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3>{{ $doctor->name }} Patients</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">Patient Details</div>
                                            <div class="col">Email</div>
                                            <div class="col">Date</div>
                                            <div class="col">Time</div>
                                            <div class="col">Status</div>
                                        </div>
                                        @forelse($doctor->appointments as $appoint)

                                        <hr class="border bg-secondary my-1">
                                        <a href="/patients-details/{{ $appoint->user->id }}" style="text-decoration: none;">
                                            <div class="row">
                                                <div class="col">
                                                    <p><strong>{{ $appoint->name }}</strong></p>
                                                    <p class="text-sm text-muted italic">({{ $appoint->appointment_for }})</p>
                                                    <p class="text-sm">{{ $appoint->phone }}</p>
                                                </div>
                                                <div class="col">{{ $appoint->email }}</div>
                                                <div class="col">{{ \Carbon\Carbon::parse($appoint->date)->format('F d, Y') }}</div>
                                                <div class="col">{{ $appoint->time ? \Carbon\Carbon::parse($appoint->time)->format('h:i A') : 'N/A' }}
                                                </div>
                                                <div class="col">{{ $appoint->status }}</div>

                                            </div>
                                        </a>
                                        @empty
                                        <div class="col my-4">
                                            <p class="text-center">
                                                <strong>
                                                    <h6><u>{{ $doctor->name }}</u> has no patients at the moment.</h5>
                                                </strong>
                                            </p>
                                        </div>
                                        @endforelse
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No doctor added yet!</td>
                            </tr>
                            @endforelse
                    </tbody>
                </table>


            </div>


        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
