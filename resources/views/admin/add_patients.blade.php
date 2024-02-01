<div class="modal fade" id="add{{ $data->id }}" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
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
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control text-black"
                                placeholder="Write the middle name (optional)" value="{{ $data->name }} {{ $data->suffix }}" readonly>
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

                    @if ($doctorName)
                        <input type="text" value="{{ $doctorName->name }}" hidden name="doctor">
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
