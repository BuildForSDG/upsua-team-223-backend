@extends('layouts.app', ['title' => __('Finance Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Finance')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Finance management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('finance.index') }}" class="btn btn-sm btn-primary">{{ __('Returns to the list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('finance.store') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Finance information') }}</h6>
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
								 <div class="form-group{{ $errors->has('img') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-img">{{ __('logo') }}</label>
                                    <input type="file" name="img" id="input-img" class="form-control form-control-alternative{{ $errors->has('img') ? ' is-invalid' : '' }}" placeholder="{{ __('img') }}" value="{{ old('img') }}" autofocus>

                                    @if ($errors->has('img'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('img') }}</strong>
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
