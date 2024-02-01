<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="/home"><img src="{{ asset('../assets/img/custom-logo.jpg') }}"
                alt="Custom Logo" style="border-radius: 50%; width: 50px; height: 50px;"></a>
        <a class="sidebar-brand brand-logo-mini" href="/home"><img src="{{ asset('../assets/img/custom-logo.jpg') }}"
                alt="Custom Logo" style="border-radius: 50%; width: 50px; height: 50px;"></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle "
                            @if (auth()->user()->profile_photo_path == null) src="admin/assets/images/faces/face15.jpg"
                            @else
                            {{ Storage::url(auth()->user()->profile_photo_path) }} @endif
                            alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ auth()->user()->name }}</h5>
                        <span>{{ auth()->user()->email }}</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="/profile" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="http://127.0.0.1:8000/logout">
                        @csrf
                        <a href="/logout" class="dropdown-item preview-item"
                            onclick="event.preventDefault();
                        this.closest('form').submit();" >
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-logout text-danger"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Logout</p>
                            </div>
                        </a>
                    </form>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('home') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-view-dashboard"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('add_doctor_view') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-plus"></i>
                </span>
                <span class="menu-title">Add Doctors</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('add_user_view') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-plus"></i>
                </span>
                <span class="menu-title">Add Users</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('add_patients_view') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-plus"></i>
                </span>
                <span class="menu-title">Add Patients</span>
            </a>
        </li> --}}

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('showappointment') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-medical-bag"></i>
                </span>
                <span class="menu-title">Patients Consultation</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('showdoctor') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-doctor"></i>
                </span>
                <span class="menu-title">All Doctors</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('users') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-group"></i>
                </span>
                <span class="menu-title">All Users</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ url('feedbacks') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-clock"></i>
                </span>
                <span class="menu-title">Users Feedbacks</span>
            </a>
        </li>


    </ul>
</nav>
