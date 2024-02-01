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

            <div class="container" align="center" style="padding-top:100px;">
                <h1 class="mb-5" style="font-size: 30px;">Adding medical history to <u>{{ $appoint->first_name }}
                        @if ($appoint->middle_name)
                            <span class="uppercase">{{ $appoint->middle_name }}</span>.
                            @endif {{ $appoint->last_name }}@if ($appoint->extension)
                                , <span class="capitalize">{{ $appoint->extension }}</span>
                            @endif
                    </u>
                </h1>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            Cut
                        </button>

                        {{ session()->get('message') }}
                    </div>
                @endif
                <x-jet-validation-errors class="mb-4" />


                <form action="/add-medical-history" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="sphere" class="col-sm-3 col-form-label">SPHERE</label>
                        <div class="col-sm-9">
                            <input type="text" name="sphere" class="form-control"
                                placeholder="Write the sphere" value="{{ old('sphere') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cylinder" class="col-sm-3 col-form-label">CYLINDER</label>
                        <div class="col-sm-9">
                            <input type="text" name="cylinder" class="form-control"
                                placeholder="Write the cylinder" value="{{ old('cylinder') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="axis" class="col-sm-3 col-form-label">AXIS</label>
                        <div class="col-sm-9">
                            <input type="text" name="axis" class="form-control"
                                placeholder="Write the axis" value="{{ old('axis') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="va" class="col-sm-3 col-form-label">VA</label>
                        <div class="col-sm-9">
                            <input type="text" name="va" class="form-control" placeholder="Write the va"
                                value="{{ old('va') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="add_or_va" class="col-sm-3 col-form-label">ADD/VA</label>
                        <div class="col-sm-9">
                            <input type="text" name="add_or_va" class="form-control" placeholder="Write the ADD/VA"
                                value="{{ old('add_or_va') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="remarks" class="col-sm-3 col-form-label">REMARKS</label>
                        <div class="col-sm-9">
                            <input type="text" name="remarks" class="form-control" placeholder="Write the remarks"
                                value="{{ old('remarks') }}">
                        </div>
                    </div>
                    <input type="text" hidden value="{{ $appoint->id }}" name="appointment_id">
                    <input type="text" hidden value="{{ $appoint->user->id }}" name="user_id">


                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success w-100">Submit</button>
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
