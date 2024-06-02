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



        <div class="container-fluid page-body-wrapper">



            <div class="container" align="center" style="padding:100px;">

                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        Cut
                    </button>

                    {{ session()->get('message') }}
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">
                        Cut
                    </button>

                    {{ session()->get('error') }}
                </div>
                @endif
                <form action="{{ url('edituser', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                        </div>
                    </div>

                    <div class="form-group row" hidden>
                        <label for="suffix" class="col-sm-3 col-form-label">Suffix:</label>
                        <div class="col-sm-9">
                            <select name="suffix" id="" class="form-control">
                                <option value="Jr" {{ $data->suffix == 'Jr' ? 'selected' : '' }}>Jr</option>
                                <option value="Sr" {{ $data->suffix == 'Sr' ? 'selected' : '' }}>Sr</option>
                                <option value="III" {{ $data->suffix == 'III' ? 'selected' : '' }}>III</option>
                                <option value="IV" {{ $data->suffix == 'IV' ? 'selected' : '' }}>III</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value="{{ $data->email }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Phone:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="phone" value="{{ $data->phone }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="age" class="col-sm-3 col-form-label">Age:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="age" value="{{ $data->age }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-3 col-form-label">Select Gender:</label>
                        <div class="col-sm-9">
                            <select name="gender" id="" class="form-control">
                                <option selected hidden>Select Gender</option>
                                <option disabled>Select Gender</option>
                                <option value="Male" {{ $data->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $data->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ $data->gender == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label">Address:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" value="{{ $data->address }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="usertype" class="col-sm-3 col-form-label">Select Role:</label>
                        <div class="col-sm-9">
                            <select name="usertype" id="" class="form-control">
                                <option selected hidden>Select Role</option>
                                <option disabled>Select Role</option>
                                <option value="0" {{ $data->usertype == 0 ? 'selected' : '' }}>Patient</option>
                                <option value="1" {{ $data->usertype == 1 ? 'selected' : '' }}>Admin</option>
                                <option value="2" {{ $data->usertype == 2 ? 'selected' : '' }}>Doctor</option>
                                <option value="3" {{ $data->usertype == 3 ? 'selected' : '' }}>Secretary</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="current_password" class="col-sm-3 col-form-label">Current Password:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="curr" name="current_password" value="{{ $data->current_password }}">
                            <div class="float-left">
                                <input type="checkbox" id="showPasswordCurr" type="checkbox" class="form-checkbox text-gray-400"> <span class="text-gray text-sm">Show Password</span>
                            </div>
                            <script>
                                document.getElementById('showPasswordCurr').addEventListener('change', function() {
                                    var passwordInputCurr = document.getElementById('curr');
                                    var type = this.checked ? 'text' : 'password';
                                    passwordInputCurr.setAttribute('type', type);
                                });

                            </script>
                            @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="new_password" class="col-sm-3 col-form-label">New Password:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="new_password" value="{{ $data->new_password }}">
                            <div class="float-left"><input type="checkbox" id="showPassword" type="checkbox" class="form-checkbox text-gray-400"> <span class="text-gray text-sm">Show Password</span></div>
                            <script>
                                document.getElementById('showPassword').addEventListener('change', function() {
                                    var passwordInput = document.getElementById('password');
                                    var type = this.checked ? 'text' : 'password';
                                    passwordInput.setAttribute('type', type);
                                });

                            </script>
                            @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="new_password_confirmation" class="col-sm-3 col-form-label">Confirm Password:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password2" name="new_password_confirmation" value="{{ $data->new_password_confirmation }}">
                            <div class="float-left"><input type="checkbox" id="showPassword2" type="checkbox" class="form-checkbox text-gray-400"> <span class="text-gray text-sm">Show Password</span></div>
                            <script>
                                document.getElementById('showPassword2').addEventListener('change', function() {
                                    var passwordInput2 = document.getElementById('password2');
                                    var type = this.checked ? 'text' : 'password';
                                    passwordInput2.setAttribute('type', type);
                                });

                            </script>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="oldImage" class="col-sm-3 col-form-label">Old Image:</label>
                        <div class="col-sm-9">
                            <img height="100" width="100" @if ($data->profile_photo_path == null) src="userimage/temp-user.jpg"
                            @else
                            src="userimage/{{ $data->profile_photo_path }}" @endif
                            alt="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="changeImage" class="col-sm-3 col-form-label">Change Image:</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="file">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </div>
                </form>



            </div>

        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
