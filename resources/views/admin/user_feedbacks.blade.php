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
        <div class="table-responsive mt-5">
            @if (session()->has('message'))
                <div class="alert alert-success mt-5">
                    <button type="button" class="close" data-dismiss="alert">
                        Cut
                    </button>

                    {{ session()->get('message') }}
                </div>
            @endif
            <div align="center" style="padding-top:50px;">
                <table class="table">
                    <tr style="background-color:black;" align="center">
                        <th style="padding:10px;">Name</th>
                        <th style="padding:10px;">Email</th>
                        <th style="padding:10px;">Type</th>
                        <th style="padding:10px;">Message</th>
                        <th style="padding:10px;">Feedback At</th>

                    </tr>
                    @forelse ($data as $feedback)
                        <tr align="center">
                            <td>{{ $feedback->name }}</td>
                            <td>{{ $feedback->email }}</td>
                            <td>{{ $feedback->subject }}</td>
                            <td>{{ $feedback->message }}</td>
                            <td>{{ $feedback->created_at->format('Y d M') }} - {{ $feedback->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No feedbacks yet!</td>
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
