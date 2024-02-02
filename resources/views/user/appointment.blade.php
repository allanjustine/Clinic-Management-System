<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <form class="main-form" action="{{ url('appointment') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Adding New Appointment...</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mt-5 ">
                        <div class="col-12 py-2 wow fadeInLeft">
                            <input type="text" name="name" class="form-control" placeholder="Full name"
                                value="{{ auth()->user()->name }} {{ auth()->user()->suffix }}" readonly>
                        </div>
                        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                            <input type="number" name="age" class="form-control" min="1" placeholder="Age"
                                value="{{ auth()->user()->age }}" readonly>
                        </div>
                        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                            <input type="text" name="gender" class="form-control" min="1"
                                placeholder="Gender" value="{{ auth()->user()->gender }}" readonly>
                        </div>
                        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                            <input type="email" name="email" class="form-control" placeholder="Email address.."
                                value="{{ auth()->user()->email }}" readonly>
                        </div>
                        {{-- <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
        <select name="doctor" id="departement" class="custom-select">
            <option value="">--select doctor--</option>

            @foreach ($doctor as $doctors)


          <option value=" {{$doctors->name }}"> {{$doctors->name }}--speciality-- {{$doctors->speciality}}</option>

          @endforeach
        </select>
        </div> --}}
                        <div class="col-12 col-sm-6 py-2 wow fadeInUp" data-wow-delay="300ms">
                            <input type="text" min="1" name="number" class="form-control"
                                placeholder="Phone number (Sample: 9XXXXXXXXX)" value="{{ auth()->user()->phone }}"
                                readonly>
                        </div>

                        <div class="col-12 py-2 wow fadeInLeft" data-wow-delay="300ms">
                            <label for="date">Select date of Appointment</label>
                            <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                            @error('date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    @if ($doctorName)
                        <input type="text" value="{{ $doctorName->name }}" hidden name="doctor">
                    @endif


                </div>
                <div class="modal-footer">
                    @php
                        $userAppointments = auth()->user()->appointments;
                        $pendingAppointments = $userAppointments->filter(function ($appointment) {
                            return $appointment->status == 'In progress';
                        });
                    @endphp

                    @if ($doctorName == null)
                        <span class="text-danger">You can't submit an appointment request if the doctor information
                            above in
                            this form is still loading, please wait. It
                            indicates that no doctor is currently available at this time. Kindly try again later, and
                            keep
                            refreshing the page until a doctor becomes available. Thank you for your
                            understanding!</span>

                        <br>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" disabled>Submit Request</button>
                    @elseif ($pendingAppointments->isNotEmpty())
                        <span class="text-danger">You have pending appointments, and you can't submit another
                            one.</span>
                        <br>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" disabled>Submit Request</button>
                    @else
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
                    @endif
                </div>
            </div>

        </form>
    </div>
</div>
