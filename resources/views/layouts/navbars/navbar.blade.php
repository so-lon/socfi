@auth()
    @can('isAdminOrFieldOwner')
        @include('layouts.navbars.navs.dashboard')
    @else
        @include('layouts.navbars.navs.auth')
    @endcan
@endauth

@guest()
    @include('layouts.navbars.navs.guest')
@endguest
