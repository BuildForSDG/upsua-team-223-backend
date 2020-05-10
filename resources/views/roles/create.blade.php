@extends('layouts.app', ['title' => __('Role Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add a role')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Role management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">{{ __('Retours à la liste') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
							@if (count($errors) > 0)
								<div class="alert alert-danger">
									<strong>Whoops!</strong> There were some problems with your input.<br><br>
									<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
									</ul>
								</div>
							@endif
							<form method="post" action="{{ route('roles.store') }}" autocomplete="off">
                            @csrf
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
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<strong>Permission:</strong>
										<br/><br/>
										@foreach($permission as $value)
										<div class="custom-control custom-checkbox mb-3">
										  <input class="custom-control-input" name="permission[]" value="{{$value->id}}" id="customCheck1{{$value->id}}" type="checkbox">
										  <label class="custom-control-label" for="customCheck1{{$value->id}}">{{ $value->name }}</label>
										</div>
										<br/>
										@endforeach
									</div>
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
