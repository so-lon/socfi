<div class="header pb-8 pt-6 pt-lg-10 d-flex align-items-center" style="background-image: url({{ asset('argon') }}/img/bgs/gradient-1.jpg); background-size: cover; background-position: center top;">
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-md-12 {{ $class ?? '' }}">
                <h1 class="display-2 text-white">{{ $title }}</h1>
                @if (isset($description) && $description)
                    <p class="text-white mt-0 mb-5">{{ $description }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
