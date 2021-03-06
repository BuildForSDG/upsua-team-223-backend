<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            @if(!empty(auth()->user()->cni_img))
                                <img alt="Image {{ auth()->user()->name }}" src="{{asset('/assets/img/profiles/'.auth()->user()->cni_img)}}">
                            @else
                                <img alt="Image {{ auth()->user()->name }}" src="{{ asset('argon') }}/img/brand/favicon.png">
                            @endif
                        </span>
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
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-single-02 text-puple" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #d6683c;">{{ __('User') }}</span>
                    </a>

                    <div class="collapse" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    {{ __('My profile') }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('notifications') }}">
                                    {{ __('Notifications') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#navbar-messages" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-messages">
                        <i class="ni ni-send text-puple" style="color: #ac5ff4;"></i>
                        <span class="nav-link-text" style="color: #913cd6;">{{ __('Messages') }}</span>
                    </a>

                    <div class="collapse" id="navbar-messages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('messages') }}">
                                    {{ __('Messages list') }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('messages.create') }}">
                                    {{ __('New message') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @basic
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.payments') }}">
                        <i class="ni ni-credit-card" style="color:#172b4d;"></i> {{ __('E-payment') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#navbar-bank" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-bank">
                        <i class="ni ni-chart-bar-32 text-puple" style="color: #7e7586;"></i>
                        <span class="nav-link-text" style="color: #3cd649;">{{ __('My Bank') }}</span>
                    </a>

                    <div class="collapse" id="navbar-bank">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.bank') }}">
                                    {{ __('Banks') }}
                                </a>
                            </li>
                            @if(!empty(auth()->user()->banks))
                            @foreach (auth()->user()->banks as $b)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('method.bank',$b->id) }}">
                                    {{ __($b->name) }}
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#navbar-finance" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-finance">
                        <i class="ni ni-chart-pie-35 text-puple" style="color: #749938;"></i>
                        <span class="nav-link-text" style="color: #a0a9dd;">{{ __('My Finance') }}</span>
                    </a>

                    <div class="collapse" id="navbar-finance">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.finance') }}">
                                    {{ __('Finances') }}
                                </a>
                            </li>
                            @if(!empty(auth()->user()->finances))
                            @foreach (auth()->user()->finances as $f)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('method.finance',$f->id) }}">
                                    {{ __($f->name) }}
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#navbar-insurance" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-insurance">
                        <i class="ni ni-badge text-puple" style="color: #312c35;"></i>
                        <span class="nav-link-text" style="color: #0e227a;">{{ __('My Insurance') }}</span>
                    </a>

                    <div class="collapse" id="navbar-insurance">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    {{ __('My choose') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.service') }}">
                        <i class="ni ni-box-2 text-puple" style="color:#172b4d;"></i> {{ __('Other Services') }}
                    </a>
                </li>
                @endbasic
                @business
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-money-coins" style="color:#172b4d;"></i> {{ __('Transactions') }}
                    </a>
                </li>
                @endbusiness
                @partner
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-tie-bow" style="color:#172b4d;"></i> {{ __('My offers') }}
                    </a>
                </li>
                @endpartner
                @admin
                @can('user-list')
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-us-manager" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-us-manager">
                        <i class="ni ni-circle-08 text-puple" style="color: #7e7586;"></i>
                        <span class="nav-link-text" style="color: #28442b;">{{ __('Users Management') }}</span>
                    </a>

                    <div class="collapse" id="navbar-us-manager">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('Users') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-zone" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-zone">
                        <i class="ni ni-pin-3 text-puple" style="color: #78ca2b;"></i>
                        <span class="nav-link-text" style="color: #58c21a;">{{ __('zone management') }}</span>
                    </a>


                    @can('country-list')
                    <div class="collapse" id="navbar-zone">
                        <ul class="nav nav-sm flex-column">
                            @can('country-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('country.index') }}">
                                    {{ __('country management') }}
                                </a>
                            </li>
                            @endcan

                            @can('locality-list')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('locality.index') }}">
                                    {{ __('locality management') }}
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                    @endcan
                </li>

                @can('transaction-list')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transaction.index') }}">
                        <i class="ni ni-money-coins" style="color:#172b4d;"></i> {{ __('Transactions Management') }}
                    </a>
                </li>
                @endcan

                @can('payment-list')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('payment.index') }}">
                        <i class="ni ni-credit-card" style="color:#172b4d;"></i> {{ __('E-payment Management') }}
                    </a>
                </li>
                @endcan

                @can('bank-list')
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('bank.index') }}">
                        <i class="ni ni-chart-bar-32 text-puple" style="color:#3cd649;"></i> {{ __('Bank Management') }}
                    </a>
                </li>
                @endcan
				
				@can('finance-list')
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('finance.index') }}">
                        <i class="ni ni-chart-pie-35 text-puple" style="color: #749938;"></i> {{ __('Finance Management') }}
                    </a>
                </li>
                @endcan


                <li class="nav-item">
                    <a class="nav-link" href="#navbar-m-insurance" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-m-insurance">
                        <i class="ni ni-badge text-puple" style="color: #312c35;"></i>
                        <span class="nav-link-text" style="color: #0e227a;">{{ __('Insurance Management') }}</span>
                    </a>

                    <div class="collapse" id="navbar-m-insurance">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    {{ __('My choose') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @can('other-service-list')
				<li class="nav-item">
                    <a class="nav-link" href="{{ route('otherservice.index') }}">
                        <i class="ni ni-box-2 text-puple" style="color: #777677;"></i> {{ __('Management of other services') }}
                    </a>
                </li>
                @endcan

                @can('role-list')
				<li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        <i class="ni ni-paper-diploma" style="color:#172b4d;"></i> {{ __('Roles') }}
                    </a>
                </li>
                @endcan
                @endadmin

            </ul>
        </div>
    </div>
</nav>
