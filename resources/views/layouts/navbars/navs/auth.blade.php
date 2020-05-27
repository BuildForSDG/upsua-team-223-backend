<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
        <!-- User -->

        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                    <!-- Dropdown header -->
                    <div class="px-3 py-3">
                        <h6 class="text-sm text-muted m-0">
                            You have
                            <strong class="text-primary">{{ auth()->user()->notifications->count() }}</strong>
                            notifications.
                        </h6>
                    </div>
                    <!-- List group -->
                    <div class="list-group list-group-flush">

                        @foreach (auth()->user()->notifications as $notification)
                            <a href="{{ route('notifications') }}" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">

                                    @php
                                        $data = $notification->data;
                                    @endphp

                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="ni ni-bell-55"></i>
                                        </div>

                                    </div>

                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">

                                            <div>
                                                <h4 class="mb-0 text-sm">{{ $data['subject'] }}</h4>
                                            </div>

                                            <div class="text-right text-muted">
                                                <small>
                                                    {{ $notification->created_at->diffForHumans() }}
                                                </small>
                                            </div>
                                        </div>

                                        <p class="text-sm mb-0">
                                            {{ $data['message'] }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>
                    <!-- View all -->
                    <a href="{{ route('notifications') }}" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
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
</nav>
