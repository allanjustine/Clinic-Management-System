<div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog">

        <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addLabel">Adding Doctor...</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Doctor Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" placeholder="Write the name"
                                value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="number" name="phone" class="form-control" placeholder="Write the phone no"
                                value="{{ old('phone') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="speciality" class="col-sm-3 col-form-label">Speciality</label>
                        <div class="col-sm-9">
                            <select name="speciality" class="form-control">
                                <option value="" disabled selected>-- Select --</option>
                                <option value="Eye">Eye</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file" class="col-sm-3 col-form-label">Doctor Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="file" class="form-control">
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
