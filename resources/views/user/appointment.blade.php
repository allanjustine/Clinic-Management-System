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
                            <input type="text" name="name" class="form-control" placeholder="Full name" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                            <input type="number" name="age" class="form-control" min="1" placeholder="Age" value="{{ auth()->user()->age }}">
                        </div>
                        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                            {{-- <input type="text" name="gender" class="form-control" min="1" placeholder="Gender" value="{{ auth()->user()->gender }}"> --}}
                            <select name="gender" id="" class="form-control">
                                <option value="" selected hidden>Select Gender</option>
                                <option disabled>Select Gender</option>
                                <option value="Male" {{ auth()->user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ auth()->user()->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ auth()->user()->gender == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                            <input type="email" name="email" class="form-control" placeholder="Email address.." value="{{ auth()->user()->email }}">
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
                        <input type="text" min="1" name="number" class="form-control" placeholder="Phone number (Sample: 9XXXXXXXXX)" value="{{ auth()->user()->phone }}">
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <select name="appointment_for" id="" class="form-control">
                            <option value="" selected hidden>Appointment For?</option>
                            <option disabled>Appointment For?</option>
                            <option value="My Self">My Self</option>
                            <option value="My Self">My Spouse</option>
                            <option value="My Child">My Child</option>
                            <option value="My Sister">My Sister</option>
                            <option value="My Brother">My Brother</option>
                            <option value="My Cousin">My Cousin</option>
                            <option value="My Mother">My Mother</option>
                            <option value="My Father">My Father</option>
                            <option value="My Uncle">My Uncle</option>
                            <option value="My Auntie">My Auntie</option>
                            <option value="My Friend">My Friend</option>
                        </select>
                        @error('appointment_for')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-12 py-2 wow fadeInLeft" data-wow-delay="300ms">
                        <label for="date">Select date of Appointment</label>
                        <input type="date" id="date-input" name="date" class="form-control" value="{{ old('date') }}">
                        @error('date')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-12 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <label for="doctor">Select Doctor</label>
                    <select name="doctor" id="" class="form-control">
                        <option value="" selected hidden>Select Doctor</option>
                        <option disabled>Select Doctor</option>
                        @forelse($doctorName as $doctor)
                        <option value="{{ $doctor->name }}">{{ $doctor->name }}</option>
                        @empty
                        <option>No Doctors Available</option>
                        @endforelse
                    </select>
                    @error('doctor')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                </div> --}}


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
                <button type="submit" class="btn btn-primary wow zoomIn">Submit Request</button>
                @endif
            </div>
    </div>

    </form>
</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date().toISOString().split('T')[0];
        var dateInput = document.getElementById('date-input');
        var datetimeInput = document.getElementById('datetime-input');

        dateInput.setAttribute('min', today);
        datetimeInput.setAttribute('min', today);
    });
</script>
