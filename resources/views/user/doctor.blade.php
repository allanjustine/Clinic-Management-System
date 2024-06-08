<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-2 wow fadeInUp">Our Doctor</h1>
        <hr>
        <div class="owl-carousel wow fadeInUp d-flex justify-content-center" id="doctorSlideshow">
            @forelse ($doctor as $doctors)
                <div class="item">
                    <div class="card-doctor">
                        <div class="header">
                            <img style="height: 300px !important;" height="300 px" src="doctorimage/{{ $doctors->image }}"
                                alt="">
                            <div class="meta">
                                <a href="#"><span class="mai-call"></span></a>
                                <a href="#"><span class="mai-logo-whatsapp"></span></a>
                            </div>
                        </div>
                        <div class="body">
                            <p class="text-xl mb-0">{{ $doctors->name }}</p>
                            <span class="text-sm text-grey">{{ $doctors->speciality }} Specialist</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="item">
                    <h5 class="text-center mt-5">Loading please wait...</h5>
                </div>
            @endforelse

        </div>
    </div>
</div>
</div>
</div>
