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
        @include('admin.add_user_view')
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
                <button type="button" class="btn btn-primary mb-2 mt-5 float-end" data-bs-toggle="modal" data-bs-target="#add">
                    <span class="mdi mdi-plus"></span> Add User
                </button>
            </div>
            <div align="center">

                <table class="table">
                    <tr style="background-color:black;" align="center">
                        <th style="padding:10px;">Image</th>
                        <th style="padding:10px;">Name</th>
                        <th style="padding:10px;">Email</th>
                        <th style="padding:10px;">Phone</th>
                        <th style="padding:10px;">Address</th>
                        <th style="padding:10px;">Role</th>
                        <th style="padding:10px;">Status</th>
                        <th style="padding:10px;">Action</th>

                    </tr>
                    @forelse ($data as $user)
                    <tr align="center">
                        <td> <img @if ($user->profile_photo_path == null) src="userimage/temp-user.jpg"
                            @else
                            src="userimage/{{ $user->profile_photo_path }}" @endif
                            style="width: 100px; height: 80px;" alt=""></td>
                        <td>{{ $user->name }} @if ($user->suffix)
                            {{ $user->suffix }}
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            @if ($user->usertype == 0)
                            <span class="badge rounded-pill badge-warning text-bg-primary text-dark">Patients</span>
                            @elseif($user->usertype == 2)
                            <span class="badge rounded-pill badge-info text-bg-success">Doctor</span>
                            @elseif($user->usertype == 3)
                            <span class="badge rounded-pill badge-secondary text-bg-dark text-dark">Secretary</span>
                            @else
                            <span class="badge rounded-pill badge-primary text-bg-info">Admin</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->email_verified_at == null)
                            <span class="badge rounded-pill badge-danger text-bg-primary">Unverified</span>
                            @else
                            <span class="badge rounded-pill badge-success text-bg-primary">Verified</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ url('deleteuser', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" href="">Delete</button>

                                <a class="btn btn-primary" href="{{ url('updateuser', $user->id) }}">Update</a>
                                @if ($user->email_verified_at == null)
                                <a class="btn btn-success" href="{{ url('verified', $user->id) }}">Direct
                                    verified</a>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No users yet!</td>
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
