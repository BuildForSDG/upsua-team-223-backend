@extends('layouts.app', ['title' => __('Country')])

@section('content')
    @include('users.partials.header', ['title' => __('the country')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Show') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('country.index') }}" class="btn btn-sm btn-primary">{{ __('Returns to the list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Name:</strong>
									{{ $country->name }}
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Code:</strong>
									{{ $country->code }}
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Currency:</strong>
									{{ $country->currency }}
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
                                    <strong>ISO 4217 Code:</strong>
                                    {{ $country->iso_4217_currency_code }}
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
