<div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog">

        <form action="{{ url('upload_user') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addLabel">Adding User...</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="suffix" class="col-sm-3 col-form-label">Suffix (Optional):</label>
                        <div class="col-sm-9">
                            <select id="suffix" class="block mt-1 form-control" type="text"
                                name="suffix"autofocus autocomplete="suffix">
                                <option value="">-- Select Suffix (Optional) --</option>
                                <option value="Jr">Jr</option>
                                <option value="Sr">Sr</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Phone:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-sm-3 col-form-label">Age:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="age" value="{{ old('age') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-3 col-form-label">Gender:</label>
                        <div class="col-sm-9">
                            <select name="gender" id="" class="form-control">
                                <option value="">-- Select gender --</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">Address:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-sm-3 col-form-label">Password
                            confirmation:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password_confirmation"
                                value="{{ old('password_confirmation') }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="uploadImage" class="col-sm-3 col-form-label">Upload Image:</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="file">
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
