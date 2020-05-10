<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container-fluid ml-1">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/white.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
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
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('home') }}">
                        <i class="ni ni-shop"></i>
                        <span class="nav-link-inner--text">{{ __('Accueil') }}</span>
                    </a>
                </li>
				<li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('profile.edit') }}">
                        <i class="ni ni-badge"></i>
                        <span class="nav-link-inner--text">{{ auth()->user()->name }}</span>
                    </a>
                </li>
                <li class="nav-item">
					<a href="{{ route('logout') }}" class="nav-link nav-link-icon" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Déconnexion') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>