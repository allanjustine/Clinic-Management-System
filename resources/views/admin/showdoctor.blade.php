<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
        @include('admin.add_doctor')
        <div class="table-responsive" style="margin-top:80px;">
            @if (session()->has('message'))
                <div class="alert alert-success mt-5">
                    <button type="button" class="close" data-dismiss="alert">
                        Cut
                    </button>

                    <h6 class="text-center">{{ session()->get('message') }}</h6>
                </div>
            @endif
            <x-jet-validation-errors class="mb-4 text-center" />
            <div class="container">
                <button {{ $data->isEmpty() ? '' : 'hidden' }} type="button" class="btn btn-primary mb-2 mt-5 float-end" data-bs-toggle="modal" data-bs-target="#add">
                    <span class="mdi mdi-plus"></span> Add Doctor
                </button>
            </div>
            <div align="center">

                <table class="table">
                    <tr style="background-color:black;" align="center">
                        <th style="padding:10px;">Doctor Name</th>
                        <th style="padding:10px;">Phone</th>
                        <th style="padding:10px;">Speciality</th>
                        <th style="padding:10px;">Image</th>
                        <th style="padding:10px;">Action</th>

                    </tr>
                    @forelse ($data as $doctor)
                        <tr align="center">
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->phone }}</td>
                            <td>{{ $doctor->speciality }}</td>
                            <td> <img src="doctorimage/{{ $doctor->image }}" style="width: 100px; height: 100px;"
                                    alt=""></td>
                            <td>
                                <form action="{{ url('deletedoctor', $doctor->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" href="">Delete</button>
                                    <a class="btn btn-primary" href="{{ url('updatedoctor', $doctor->id) }}">Update</a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No doctors added yet!</td>
                        </tr>
                    @endforelse
                </table>


            </div>


        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
