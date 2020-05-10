@auth()
    @include('layouts.navbars.mynavbar')
@endauth
    
@guest()
    @include('layouts.navbars.navs.guest')
@endguest