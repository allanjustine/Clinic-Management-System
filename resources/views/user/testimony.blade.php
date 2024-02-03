<div class="container mt-2">
    <div class="row">
        @forelse ($testimonies as $testimony)
            <div class="col-6">
                <div class="row">
                    <div class="col-md-3">
                        <img @if ($testimony->user->profile_photo_path == null) src="userimage/temp-user.jpg"
                                            @else
                                            src="userimage/{{ $testimony->user->profile_photo_path }}" @endif
                            alt="image" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-md-9">
                        <blockquote class="blockquote mb-0">
                            <p>"{{ $testimony->content }}."</p>
                            <footer class="blockquote-footer">{{ $testimony->user->name }}</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        @empty
            <div class="container">
                <h5 class="text-center mt-5">
                    No testimony posted yet!
                </h5>
            </div>
        @endforelse
    </div>
</div>
