<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-3 wow fadeInUp">Make an Appointment</h1>
        <hr>

        <span class="text-center mt-3"><x-jet-validation-errors class="mb-4" /></span>

        @auth
            <form class="main-form" action="{{ url('appointment') }}" method="POST">
                @csrf

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
                        <input type="text" name="gender" class="form-control" min="1" placeholder="Gender"
                            value="{{ auth()->user()->gender }}" readonly>
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
                            placeholder="Phone number (Sample: 9XXXXXXXXX)" value="{{ auth()->user()->phone }}" readonly>
                    </div>

                    <div class="col-12 py-2 wow fadeInLeft" data-wow-delay="300ms">
                        <label for="date">Select date of Appointment</label>
                        <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                    </div>
                </div>

                @if ($doctorName)
                    <input type="text" value="{{ $doctorName->name }}" hidden name="doctor">
                @endif

                @php
                    $userAppointments = auth()->user()->appointments;
                    $pendingAppointments = $userAppointments->filter(function ($appointment) {
                        return $appointment->status == 'In progress';
                    });
                @endphp

                @if ($doctorName == null)
                    <span class="text-danger">You can't submit an appointment request if the doctor information above in
                        this form is still loading, please wait. It
                        indicates that no doctor is currently available at this time. Kindly try again later, and keep
                        refreshing the page until a doctor becomes available. Thank you for your understanding!</span>

                    <br>
                    <button class="btn btn-success" disabled>Submit Request</button>
                @elseif ($pendingAppointments->isNotEmpty())
                    <span class="text-danger">You have pending appointments, and you can't submit another one.</span>
                    <br>
                    <button class="btn btn-success" disabled>Submit Request</button>
                @else
                    <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
                @endif
            </form>
        @else
            <h5 class="text-center mt-5">Please Login/Register first to make an appointment. <a href="/login">Click
                    here</a></h5>
        @endauth
    </div>
</div>
