<nav id="navbar-main" class="navbar navbar-horizontal navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand mr-lg-5" href="{{ route('index') }}">
            <img src="{{ asset('argon') }}/img/brand/logo-dark.png">
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
                            <img src="{{ asset('argon') }}/img/brand/logo-dark.png">
                        </a>
                    </div>
                </div>
            </div>
            {{-- Login & Register --}}
            <ul class="navbar-nav align-items-center ml-lg-auto">
                <li class="nav-item d-none d-lg-block">
                    <a href="{{ route('login') }}" class="btn btn-danger btn-round text-uppercase">
                        <i class="fas fa-sign-in-alt"></i>
                        <span class="nav-link-inner--text">Đăng nhập</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
