<nav id="navbar-main" class="navbar navbar-horizontal navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand mr-lg-5" href="{{ route('index') }}">
            <div class="fa-3x ml-4"><img src="{{ asset('argon') }}/img/brand/favicon.png">SFMS</div>
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
                            <div class="fa-3x ml-4">
                                <img src="{{ asset('argon') }}/img/brand/favicon.png">
                                SFMS
                            </div>
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
            <ul class="navbar-nav align-items-lg-center ml-lg-4">
                <li class="nav-item d-none d-lg-block">
                    <a href="{{ route('login') }}" class="btn btn-danger btn-round text-uppercase">
                        <span class="btn-inner--icon">
                            <i class="fas fa-sign-in-alt"></i>
                        </span>
                        <span class="nav-link-inner--text">&nbsp;&nbsp;Login&nbsp;&nbsp;</span>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a href="{{ route('register') }}" class="btn btn-neutral btn-icon text-uppercase">
                        <span class="btn-inner--icon">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        <span class="nav-link-inner--text">Register</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
