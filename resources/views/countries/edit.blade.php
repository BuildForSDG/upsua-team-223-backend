@extends('layouts.app', ['title' => __('Country Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Country')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Country management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('country.index') }}" class="btn btn-sm btn-primary">{{ __('Returns to the list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('country.update', $country) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Country information') }}</h6>
                            <div class="pl-lg-4">
								<div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-code">{{ __('Code') }}</label>
                                    <input type="text" name="code" value="{{$country->code}}" id="input-code" class="form-control form-control-alternative{{ $errors->has('code') ? ' is-invalid' : '' }}" placeholder="{{ __('Code ...') }}" value="{{ old('code') }}" required>

                                    @if ($errors->has('code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" value="{{$country->name}}" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name ...') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('currency') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-currency">{{ __('Currency') }}</label>
                                    <input type="text" name="currency" value="{{$country->currency}}" id="input-currency" class="form-control form-control-alternative{{ $errors->has('currency') ? ' is-invalid' : '' }}" placeholder="{{ __('Currency ...') }}" value="{{ old('currency') }}" required autofocus>

                                    @if ($errors->has('currency'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('currency') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('iso_4217_currency_code') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-iso_4217_currency_code">{{ __('ISO 4217') }}</label>
                                    <input type="text" name="iso_4217_currency_code" value="{{$country->iso_4217_currency_code}}" id="input-iso_4217_currency_code" class="form-control form-control-alternative{{ $errors->has('iso_4217_currency_code') ? ' is-invalid' : '' }}" placeholder="{{ __('ISO 4217 currency code') }}" value="{{ old('iso_4217_currency_code') }}" required>

                                    @if ($errors->has('iso_4217_currency_code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('iso_4217_currency_code') }}</strong>
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
