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
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->

        @include('admin.add_patients')

        <div class="col-md-12">

            <div class="table-responsive" style="margin-top:80px;">
                <x-jet-validation-errors class="mb-4 text-center" />
                <h2 style="font-size: 30px;">
                    @if ($searchTerm)
                    Result for {{ $searchTerm }}
                    @else
                    {{ $data->name }} details
                    @endif
                </h2>
                <div class="col-md-4 mt-5">
                    <form action="/patients-details/{{ $data->id }}">
                        <div class="d-flex"><input type="search" class="form-control" name="search" required placeholder="Search patient..." value="{{ $searchTerm }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
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

                <div class="container">
                    <button type="button" class="btn btn-primary mb-2 mt-5 float-end" data-bs-toggle="modal" data-bs-target="#addC{{ $data->id }}">
                        <span class="mdi mdi-plus"></span> Add New Consultation
                    </button>
                </div>
                <div align="center">
                    <table class="table">
                        <tr style="background-color:black;" align="center">
                            <th>Patients Details</th>
                            <th>Assigned Doctor</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        @forelse ($data->appointments->sortByDesc('created_at') as $appoint)
                        <tr align="center">
                            <td>
                                <p><strong>{{ $appoint->name }}</strong></p>
                                <p class="text-sm text-muted italic">({{ $appoint->appointment_for }})</p>
                                <p class="text-sm">{{ $appoint->phone }}</p>
                            </td>
                            <td class="{{ $appoint->doctor->name ?? 'text-danger' }}">{{ $appoint->doctor->name ?? 'No doctor selected yet.' }}</td>
                            <td>{{ $appoint->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($appoint->date)->format('F d, Y') }}</td>
                            <td>{{ $appoint->time ? \Carbon\Carbon::parse($appoint->time)->format('h:i A') : 'N/A' }}
                            </td>
                            <td>{{ $appoint->status }}</td>
                            <td>
                                @if(auth()->user()->usertype != 3)
                                @if ($appoint->status == 'In progress')
                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approved{{ $appoint->id }}">Approve</a>

                                <a href="#" data-bs-toggle="modal" data-bs-target="#reject{{ $appoint->id }}" class="btn btn-danger">Reject</a>
                                @elseif($appoint->status == 'Rejected')
                                <div class="badge badge-outline-danger">Canceled</div>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#reason{{ $appoint->id }}" class="btn btn-info">Show
                                    Reason</a>
                                @else
                                <div class="badge badge-outline-success">Approved</div>
                                <a href="/print-details/{{ $appoint->id }}" class="badge badge-warning" {{ auth()->user()->id == 3 ? 'hidden' : '' }}><span class="mdi mdi-printer"></span> Print</a>
                                {{-- @if ($appoint->medicalHistories->isEmpty())
                                            <a href="/add-medical-history/{{ $appoint->id }}"
                                class="badge badge-info">
                                <span class="mdi mdi-plus"></span> Add New Prescription
                                </a>
                                @endif --}}
                                {{-- @if (now()->isSameDay($appoint->date) && $appoint->sms_status == false)
                                            <form action="/sms/{{ $appoint->id }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-warning">Send SMS</button>
                                </form>
                                @endif --}}
                                @endif
                                @else
                                <div class="btn btn-info">{{ $appoint->status }}</div>
                                @endif

                                {{-- <a href="{{ url('emailview', $appoint->id) }}" class="btn btn-primary">Send
                                Mail</a> --}}
                                <br>
                                <br>
                                <span class="text-muted">{{ $appoint->created_at->diffForHumans() }}</span>
                            </td>

                            <div class="modal fade" id="approved{{ $appoint->id }}" tabindex="-1" aria-labelledby="approvedLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ url('approved', $appoint->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="approvedLabel">Approving Patients
                                                    Consultation...</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label for="doctor_id" class="col-sm-3 col-form-label">Select a Doctor</label>
                                                    <div class="col-sm-9">
                                                        <select name="doctor_id" id="" class="form-control">
                                                            <option value="" hidden selected>Select a Doctor</option>
                                                            <option disabled>Select a Doctor</option>
                                                            @forelse($doctors as $doctor)
                                                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                                            @empty
                                                                <option value="">No doctor available</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="time" class="col-sm-3 col-form-label">Time</label>
                                                    <div class="col-sm-9">
                                                        <input type="time" name="time" class="form-control text-black" value="{{ old('time') }}">
                                                        <input type="date" hidden name="date" class="form-control text-black" value="{{ $appoint->date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Approved</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal fade" id="reject{{ $appoint->id }}" tabindex="-1" aria-labelledby="rejectLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ url('canceled', $appoint->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="rejectLabel">Rejecting Patients
                                                    Consultation...</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label for="reason" class="col-sm-3 col-form-label">Reason
                                                        for rejecting appointment?</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="reason" name="reason" class="form-control text-black" value="{{ old('reason') }}" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Reject</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal fade" id="reason{{ $appoint->id }}" tabindex="-1" aria-labelledby="rejectLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="rejectLabel">Showing
                                                {{ $appoint->name }}'s rejected consultation...</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{ $appoint->reason }}</p>
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
                            <td colspan="7" class="text-center">No Appointments yet!</td>
                        </tr>
                        @endforelse

                    </table>
                </div>

            </div>
            <hr>
            @if(auth()->user()->id != 3)
            <h3 class="mt-5" style="font-size: 30px">Prescription</h3>
            <a href="/add-medical-history/{{ $data->id }}" class="float-end btn btn-info mb-3"><i class="mdi mdi-plus"></i> Add New Prescription </a>
            <div align="center">
                <table class="table mt-2">
                    <tr style="background-color:black;" align="center">
                        <th>ID #</th>
                        <th>SPHERE</th>
                        <th>CYLINDER</th>
                        <th>AXIS</th>
                        <th>VA</th>
                        <th>ADD/VA</th>
                        <th>REMARKS</th>
                        <th>ACTION</th>

                    </tr>

                    @forelse ($medicalHistories as $history)
                    <tr align="center">
                        <td>{{ $history->id }}</td>
                        </td>
                        <td>{{ $history->sphere }}</td>
                        <td>{{ $history->cylinder }}</td>
                        <td>{{ $history->axis }}</td>
                        <td>{{ $history->va }}</td>
                        <td>{{ $history->add_or_va }}</td>
                        <td title="{{ $history->remarks }}">
                            {{ \Illuminate\Support\Str::limit($history->remarks, 20) }}
                        </td>
                        <td>
                            <form action="/delete-medical-history/{{ $history->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">No prescription added yet!</td>
                    </tr>
                    @endforelse

                </table>
            </div>
            @endif

        </div>
    </div>


    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
