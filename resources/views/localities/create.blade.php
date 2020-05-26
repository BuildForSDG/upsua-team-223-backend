@extends('layouts.app', ['title' => __('Locality Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Locality')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Locality management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('locality.index') }}" class="btn btn-sm btn-primary">{{ __('Returns to the list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('locality.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Locality information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name ...') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('subdivision') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-subdivision">{{ __('Subdivision') }}</label>
                                    <input type="text" name="subdivision" id="input-subdivision" class="form-control form-control-alternative{{ $errors->has('subdivision') ? ' is-invalid' : '' }}" placeholder="{{ __('Subdivision ...') }}" value="{{ old('subdivision') }}" required autofocus>

                                    @if ($errors->has('subdivision'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('subdivision') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
									<label class="form-control-label" for="input-country">{{ __('Country') }}</label>
                                    <select name="country" class="form-control">
										@foreach($countries as $country)
										<option value="{{ $country->id }}">{{ $country->name }}</option>
										@endforeach
									  </select>
                                    @if ($errors->has('country'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('send') }}</button>
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
