<nav id="navbar-main" class="navbar navbar-horizontal navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand mr-lg-5" href="{{ route('index') }}">
            <img src="{{ asset('argon') }}/img/brand/logo.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a class="navbar-brand mr-lg-5" href="{{ route('index') }}">
                            <img src="{{ asset('argon') }}/img/brand/logo.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar items -->
            <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                        <i class="ni ni-collection d-lg-none"></i>
                        <span class="nav-link-inner--text">Dropdown</span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="./examples/landing.html" class="dropdown-item">Landing</a>
                        <a href="./examples/profile.html" class="dropdown-item">Profile</a>
                        <a href="./examples/login.html" class="dropdown-item">Login</a>
                        <a href="./examples/register.html" class="dropdown-item">Register</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                        <i class="ni ni-collection d-lg-none"></i>
                        <span class="nav-link-inner--text">Dropdown</span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="./examples/landing.html" class="dropdown-item">Landing</a>
                        <a href="./examples/profile.html" class="dropdown-item">Profile</a>
                        <a href="./examples/login.html" class="dropdown-item">Login</a>
                        <a href="./examples/register.html" class="dropdown-item">Register</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                        <i class="ni ni-collection d-lg-none"></i>
                        <span class="nav-link-inner--text">Dropdown</span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="./examples/landing.html" class="dropdown-item">Landing</a>
                        <a href="./examples/profile.html" class="dropdown-item">Profile</a>
                        <a href="./examples/login.html" class="dropdown-item">Login</a>
                        <a href="./examples/register.html" class="dropdown-item">Register</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                        <i class="ni ni-ui-04 d-lg-none"></i>
                        <span class="nav-link-inner--text">Dropdown</span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="./examples/landing.html" class="dropdown-item">Landing</a>
                        <a href="./examples/profile.html" class="dropdown-item">Profile</a>
                        <a href="./examples/login.html" class="dropdown-item">Login</a>
                        <a href="./examples/register.html" class="dropdown-item">Register</a>
                    </div>
                </li>
            </ul>
            {{-- User --}}
            <ul class="navbar-nav align-items-center d-none d-md-flex d-lg-inline-block ml-lg-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link py-0 pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="avatar" src="{{ auth()->user()->avatar }}">
                            </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">{{ __('home.welcome', ['name' => auth()->user()->name]) }}</h6>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>{{ __('My profile') }}</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
