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
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
            <div class="modal-dialog">

                <form action="{{ url('testimonies-add') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addLabel">Adding a Testimony...</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="user_id" class="col-sm-3 col-form-label">Select Patient:</label>
                                <div class="col-sm-9">
                                    <select name="patient" id="" class="form-control">
                                        @forelse ($patients as $patient)
                                            <option value="{{ $patient->id }}">{{ $patient->name }}
                                                {{ $patient->suffix }}</option>
                                        @empty
                                            <option value="">No patients found.</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content" class="col-sm-3 col-form-label">Content:</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" name="content">{{ old('content') }}</textarea>
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

        <div class="table-responsive" style="margin-top:80px;">
            @if (session()->has('message'))
                <div class="alert alert-success mt-5">
                    <button type="button" class="close" data-dismiss="alert">
                        Cut
                    </button>

                    <h6 class="text-center">{{ session()->get('message') }}</h6>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger mt-5">
                    <button type="button" class="close" data-dismiss="alert">
                        Cut
                    </button>

                    <h6 class="text-center">{{ session()->get('error') }}</h6>
                </div>
            @endif
            <x-jet-validation-errors class="mb-4 text-center" />
            <div class="container">
                <button type="button" class="btn btn-primary mb-2 mt-5 float-end" data-bs-toggle="modal"
                    data-bs-target="#add">
                    <span class="mdi mdi-plus"></span> Add Testimony
                </button>
            </div>
            <div align="center">

                <table class="table">
                    <tr style="background-color:black;" align="center">
                        <th style="padding:10px;">Image</th>
                        <th style="padding:10px;">Name</th>
                        <th style="padding:10px;">Content</th>
                        <th style="padding:10px;">Action</th>

                    </tr>
                    @forelse ($testimonies as $testimony)
                        <tr align="center">
                            <td> <img
                                    @if ($testimony->user->profile_photo_path == null) src="userimage/temp-user.jpg"
                                @else
                                src="userimage/{{ $testimony->user->profile_photo_path }}" @endif
                                    style="width: 100px; height: 80px;" alt=""></td>
                            <td>{{ $testimony->user->name }} @if ($testimony->user->suffix)
                                    {{ $testimony->user->suffix }}
                                @endif
                            </td>
                            <td class="text-wrap">{{ $testimony->content }}</td>
                            <td>
                                <form action="{{ url('testimonies-delete', $testimony->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" href="">Delete</button>

                                    <a class="btn btn-primary"
                                        href="#" data-bs-toggle="modal"
                                        data-bs-target="#update{{ $testimony->id }}">Update</a>
                                </form>
                            </td>
                            <div class="modal fade" id="update{{ $testimony->id }}" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
                                <div class="modal-dialog">

                                    <form action="{{ url('testimonies-edit', $testimony->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="updateLabel">Editing a Testimony...</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label for="user_id" class="col-sm-3 col-form-label">Select Patient:</label>
                                                    <div class="col-sm-9">
                                                        <select name="patient" id="" class="form-control">
                                                            @forelse ($patients as $patient)
                                                                <option value="{{ $patient->id }}" {{ $patient->id == $testimony->user_id ? 'selected' : '' }}>{{ $patient->name }}
                                                                    {{ $patient->suffix }}</option>
                                                            @empty
                                                                <option value="">No patients found.</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="content" class="col-sm-3 col-form-label">Content:</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="text" class="form-control" name="content">{{ $testimony->content }}</textarea>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No testimonies yet!</td>
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
