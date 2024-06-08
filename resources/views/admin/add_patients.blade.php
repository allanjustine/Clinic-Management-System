<div class="modal fade" id="addC{{ $data->id }}" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog">

        <form action="{{ url('appointment/admin', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addLabel">Adding Consultation...</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden name="user_id" value="{{ $data->id }}">
                    <div class="form-group row">
                        <label for="doctor_id" class="col-sm-3 col-form-label">Select a doctor</label>
                        <div class="col-sm-9">
                            <select name="doctor_id" id="" class="form-control">
                                <option value="" selected hidden>Select a doctor</option>
                                <option disabled>Select a doctor</option>
                                @forelse($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @empty
                                    <option value="" selected>No doctors yet.</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <input type="date" value="{{ now() }}" name="date" hidden>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control text-black"
                                placeholder="Write the middle name (optional)" value="{{ $data->name }}" readonly>
                                <input type="text" name="appointment_for" hidden class="form-control text-black" placeholder="Write the email"
                                value="Walk-in Applicant">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input readonly type="email" name="email" class="form-control text-black" placeholder="Write the email"
                                value="{{ $data->email }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="age" class="col-sm-3 col-form-label">Age</label>
                        <div class="col-sm-9">
                            <input readonly type="number" name="age" class="form-control text-black" placeholder="Write the age"
                                value="{{ $data->age }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                        <div class="col-sm-9">
                            <input readonly type="text" name="gender" class="form-control text-black" placeholder="Write the gender"
                                value="{{ $data->gender }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input readonly type="text" name="phone" class="form-control text-black"
                                placeholder="Write the phone no (Sample: 9XXXXXXXXX)" value="{{ $data->phone }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="time" class="col-sm-3 col-form-label">Time</label>
                        <div class="col-sm-9">
                            <input type="time" name="time" class="form-control text-black" value="{{ old('time') }}">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
