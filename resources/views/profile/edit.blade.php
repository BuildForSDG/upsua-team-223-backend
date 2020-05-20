@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('history') }}</a>
                            <a href="{{ url('messages') }}" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">{{ __('Friends') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">{{ __('Photos') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">{{ __('Comments') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light">, 27</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ __('Bucharest, Romania') }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('Solution Manager - Creative Tim Officer') }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                            </div>
                            <hr class="my-4" />
                            <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
                            <a href="#">{{ __('Show more') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-phone">{{ __('Phone') }}</label>
                                <input type="text" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Entrer le telephone') }}" value="{{ old('phone', auth()->user()->phone) }}" autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-first_name">{{ __('First name') }}</label>
                                <input type="text" name="first_name" id="input-first_name" class="form-control form-control-alternative{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="{{ __('First name') }}" value="{{ old('first_name', auth()->user()->first_name) }}">

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-address">{{ __('Address') }}</label>
                                <input type="text" name="address" id="input-address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address...') }}" value="{{ old('address', auth()->user()->address) }}">

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('date_of_birth') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-date_of_birth">{{ __('Date of birth') }}</label>
                                <input type="date" name="date_of_birth" id="input-date_of_birth" class="form-control form-control-alternative{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" placeholder="{{ __('date of birth') }}" value="{{ old('date_of_birth', auth()->user()->date_of_birth) }}">

                                @if ($errors->has('date_of_birth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('cni_number') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-cni_number">{{ __('CNI number') }}</label>
                                <input type="text" name="cni_number" id="input-cni_number" class="form-control form-control-alternative{{ $errors->has('cni_number') ? ' is-invalid' : '' }}" placeholder="{{ __('cni number ...') }}" value="{{ old('cni_number', auth()->user()->cni_number) }}">

                                @if ($errors->has('cni_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cni_number') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('language') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-language">{{ __('Language') }}</label>
                                <select id="input-language" name="language" class="form-control">
                                    @if(isset(auth()->user()->language))
                                    <option value="{{ auth()->user()->language }}" selected>{{ auth()->user()->language }}</option>
                                    @endif
                                    <option value="eng">English</option>
                                    <option value="fr">Frensh</option>
                                </select>
                                @if ($errors->has('language'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('language') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('Place of residence') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-place_of_residence">{{ __('Place of residence') }}</label>
                                <input type="text" name="place_of_residence" id="input-place_of_residence" class="form-control form-control-alternative{{ $errors->has('place_of_residence') ? ' is-invalid' : '' }}" placeholder="{{ __('Place of residence...') }}" value="{{ old('place_of_residence', auth()->user()->place_of_residence) }}">

                                @if ($errors->has('place_of_residence'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('place_of_residence') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('highest_academic_level') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-highest_academic_level">{{ __('Highest academic level') }}</label>
                                <input type="text" name="highest_academic_level" id="input-highest_academic_level" class="form-control form-control-alternative{{ $errors->has('highest_academic_level') ? ' is-invalid' : '' }}" placeholder="{{ __('Highest academic level...') }}" value="{{ old('highest_academic_level', auth()->user()->highest_academic_level) }}">

                                @if ($errors->has('highest_academic_level'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('highest_academic_level') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('phone_2') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-phone_2">{{ __('Phone 2') }}</label>
                                <input type="text" name="phone_2" id="input-phone_2" class="form-control form-control-alternative{{ $errors->has('phone_2') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone 2...') }}" value="{{ old('phone_2', auth()->user()->phone_2) }}">

                                @if ($errors->has('phone_2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-sex">{{ __('Sex') }}</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" value="man" name="sex" @if(auth()->user()->sex=='man') checked  @endif class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline1">M</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" value="woman" name="sex" @if(auth()->user()->sex=='woman') checked  @endif class="custom-control-input">
                                    <label class="custom-control-label" for="customRadioInline2">F</label>
                                  </div>
                                @if ($errors->has('sex'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-country">{{ __('Country') }}</label>
                                <select name="country_id" class="form-control">
                                    @foreach($countries as $country)
                                        @if($country->id==auth()->user()->country_id)
                                            <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                        @else
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endif
                                    @endforeach
                                  </select>
                                @if ($errors->has('country_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('Locality') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-locality">{{ __('Locality') }}</label>
                                <select name="locality" class="form-control">
                                    @foreach($localities as $locality)
                                        @if($locality->id==auth()->user()->locality_id)
                                            <option value="{{ $locality->id }}" selected>{{ $locality->name }}</option>
                                        @else
                                            <option value="{{ $locality->id }}">{{ $locality->name }}</option>
                                        @endif
                                    @endforeach
                                  </select>
                                @if ($errors->has('locality'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('locality') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <!--
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Other important information to complete') }}</h6>

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        -->
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="">

                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                            <form method="post" action="{{ route('logout.other.device') }}" autocomplete="off">
                                <div class="pl-lg-4">
                                @csrf
                                @method('post')
                                    <div class="form-group{{ $errors->has('cpassword') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cpassword">{{ __('enter your password to confirm') }}</label>
                                        <input type="password" name="cpassword" id="input-cpassword" class="form-control form-control-alternative{{ $errors->has('cpassword') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">

                                        @if ($errors->has('cpassword'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cpassword') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Disconnect from all devices other than this') }}</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
