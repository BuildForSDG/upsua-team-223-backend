@extends('layouts.app', ['title' => __('Payments Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Payment method')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Payments management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('payment.index') }}" class="btn btn-sm btn-primary">{{ __('Returns to the list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('payment.store') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Payments information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Entrer le nom') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
								<div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                    <input type="text" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Entrer la description') }}" value="{{ old('description') }}" required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
								<div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-number">{{ __('Unique Number') }}</label>
                                    <input type="number" name="number" id="input-number" class="form-control form-control-alternative{{ $errors->has('number') ? ' is-invalid' : '' }}" placeholder="{{ __('Entrer la number') }}" value="{{ old('number') }}" required autofocus>

                                    @if ($errors->has('number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number') }}</strong>
                                        </span>
                                    @endif
                                </div>
								<div class="form-group{{ $errors->has('Locality') ? ' has-danger' : '' }}">
									<label class="form-control-label" for="input-locality">{{ __('Locality') }}</label>
									<select name="locality_id" class="form-control">
										@foreach($localities as $locality)
										   <option value="{{ $locality->id }}">{{ $locality->name }}</option>
										@endforeach
									</select>
									@if ($errors->has('locality'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('locality') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('partner') ? ' has-danger' : '' }}">
									<label class="form-control-label" for="input-partner">{{ __('Partner') }}</label>
									<select name="partner_account_id" class="form-control">
										@foreach($partners as $partner)
										   <option value="{{ $partner->id }}">{{ $partner->user->name }}</option>
										@endforeach
									  </select>
									@if ($errors->has('partner'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('partner') }}</strong>
										</span>
									@endif
								</div>
								<div class="form-group{{ $errors->has('method_accepted') ? ' has-danger' : '' }}">
									<label class="form-control-label" for="input-method_accepted">{{ __('Method accepted') }}</label>
									<select name="method_accepted" class="form-control">
										   <option selected value="in_out">In & Out</option>
										   <option value="in">In</option>
										   <option value="out">Out</option>
									  </select>
									@if ($errors->has('method_accepted'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('method_accepted') }}</strong>
										</span>
									@endif
								</div>
								 <div class="form-group{{ $errors->has('logo') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-logo">{{ __('logo') }}</label>
                                    <input type="file" name="payment_img" id="input-logo" class="form-control form-control-alternative{{ $errors->has('logo') ? ' is-invalid' : '' }}" placeholder="{{ __('Entrer le logo') }}" value="{{ old('logo') }}" autofocus>

                                    @if ($errors->has('logo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('logo') }}</strong>
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
