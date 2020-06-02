@extends('layouts.app', ['title' => __('Payments Management')])

@section('content')
    @include('users.partials.header', ['title' => __('show Payment method')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="col-12">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Payment') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('payment.index') }}" class="btn btn-sm btn-primary">{{ __('Returns to the list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Name:</strong>
									{{ $payment->name }}
									@if(isset($payment->payment_img))<img class="w-30 h-30" width="30" src="{{asset('/assets/img/payments/'.$payment->payment_img)}}">@endif
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Description:</strong>
									{{ $payment->description }}
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Method Accepted:</strong>
									{{ $payment->method_accepted }}
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Unique Number:</strong>
									{{ $payment->number }}
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Payment:</strong>
									{{ $payment->partner->user->name }}
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Locality:</strong>
									{{ $payment->locality->name }}
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<strong>Creation date:</strong>
									{{ $payment->created_at->format('d/m/Y H:i') }}
								</div>
							</div>
                        </div>
                        @can('payment-cost-list')
                        <div class="table-responsive">
                            <h6 class="heading-small text-muted mb-4">{{ __('Payments Cost information') }}</h6>
                            <table class="table align-items-center table-flush"  id="datatable-buttons">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('Type') }}</th>
                                        <th scope="col">{{ __('Min value') }}</th>
                                        <th scope="col">{{ __('Max value') }}</th>
                                        <th scope="col">{{ __('Amount') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($costs as $cost)
                                        <tr>
                                            <td>{{ $cost->type }}</td>
                                            <td>{{ $cost->min_val }}</td>
                                            <td>{{ $cost->max_val }}</td>
                                            <td>{{ $cost->amount }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    @can('payment-cost-list')
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <form action="{{ route('paymentcost.destroy', $cost) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                        @can('payment-cost-edit')
                                                                        <a class="dropdown-item" href="{{ route('paymentcost.edit',$cost->id) }}">{{ __('Edit') }}</a>
                                                                        @endcan
                                                                    @can('payment-cost-delete')
                                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("are you sure you want to delete the payment cost?") }}') ? this.parentElement.submit() : ''">
                                                                        {{ __('Remove') }}
                                                                    </button>
                                                                    @endcan
                                                                </form>
                                                        </div>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endcan
                        <br>
                        @can('payment-cost-create')
                        <form method="post" action="{{ route('paymentcost.store') }}" enctype="multipart/form-data" autocomplete="off">
                            <h6 class="heading-small text-muted mb-4">{{ __('add new Payments Cost') }}</h6>
                                @csrf
                                <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
									<label class="form-control-label" for="input-type">{{ __('Type accepted') }}</label>
									<select name="type" class="form-control">
										   <option selected value="out">out</option>
										   <option value="in">In</option>
									</select>
									@if ($errors->has('type'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('type') }}</strong>
										</span>
									@endif
								</div>
                                <div class="form-group{{ $errors->has('min') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-min">{{ __('Min value') }}</label>
                                    <input type="hidden" value="{{ $payment->id }}" name="payment_id">
                                    <input type="number" name="min" id="input-min" class="form-control form-control-alternative{{ $errors->has('min') ? ' is-invalid' : '' }}" placeholder="{{ __('Min value') }}" value="{{ old('min') }}" required="true">

                                    @if ($errors->has('min'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('min') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('max') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-max">{{ __('Max value') }}</label>
                                    <input type="number" name="max" id="input-max" class="form-control form-control-alternative{{ $errors->has('max') ? ' is-invalid' : '' }}" placeholder="{{ __('Max value') }}" value="{{ old('max') }}" required="true">

                                    @if ($errors->has('max'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('max') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-amount">{{ __('Amount') }}</label>
                                    <input type="text" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('Amount') ? ' is-invalid' : '' }}" placeholder="{{ __('amount') }}"value="{{ old('amount') }}" required="true">

                                    @if ($errors->has('amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('send') }}</button>
                                    </div>
                                </div>
                        </form>
                        @endcan
					</div>
                </div>
            </div>

        @include('layouts.footers.auth')
    </div>
@endsection
