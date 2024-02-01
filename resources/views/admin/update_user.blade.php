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
                <form action="{{ url('edituser', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
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
                        <label for="address" class="col-sm-3 col-form-label">Address:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" value="{{ $data->address }}">
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="oldImage" class="col-sm-3 col-form-label">Old Image:</label>
                        <div class="col-sm-9">
                            <img height="100" width="100"
                                @if ($data->profile_photo_path == null) src="userimage/temp-user.jpg"
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
