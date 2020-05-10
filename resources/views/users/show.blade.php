@extends('layouts.app', ['title' => __('User')])

@section('content')
    @include('users.partials.header', ['title' => __('the user')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('user') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Returns to the list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Name:</strong>
									{{ $user->name }}
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Phone:</strong>
									{{ $user->phone }}
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Email:</strong>
									{{ $user->email }}
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Roles:</strong>
									@if(!empty($user->getRoleNames()))
										@foreach($user->getRoleNames() as $v)
											<label class="badge badge-success">{{ $v }}</label>
										@endforeach
									@endif
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