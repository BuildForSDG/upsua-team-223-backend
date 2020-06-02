@extends('layouts.app', ['title' => __('Payments method')])

@section('content')
    @include('users.partials.header', ['title' => __($payment->name.' payments method')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card card-pricing border-0 mb-4 bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Use '.$payment->name) }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('users.payments') }}" class="btn btn-sm btn-primary">{{ __('E-payment') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
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
                        @if($payment->method_accepted=='in')
                        <div class="card-body px-lg-7">
                            <div class="display-2 mt-2 mb-2">{{ auth()->user()->account->balance }}</div>
                            <span class=" text-muted">
                                currency :
                                @if(isset(auth()->user()->country))
                                    {{ auth()->user()->country->iso_4217_currency_code }}
                                @else
                                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary">{{ __('update profile') }}</a>
                                @endif
                            </span>
                            <form method="post" action="{{ route('users.account.type', auth()->user()) }}" autocomplete="off">
                                @csrf
                                @method('put')
                                <div class="form-group{{ $errors->has('method') ? ' has-danger' : '' }}">
                                    <input type="text" name="method" id="input-method" class="form-control form-control-alternative{{ $errors->has('method') ? ' is-invalid' : '' }}" placeholder="{{ __('Credit card, Email, Number ...') }}" value="" required="true">
                                    @if ($errors->has('method'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('method') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                        <input type="number" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="{{ __('Amount ...') }}" value="" required="true">
                                        <input type="hidden" name="payment_id" value="{{ $payment->id }}">
                                        @if ($errors->has('amount'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('credit my account') }}</button>
                                </div>
                            </form>
                        </div>
                        @endif
                        @if($payment->method_accepted=='out')
                        <div class="card-body px-lg-7">
                            <div class="display-2 mt-2 mb-2">{{ auth()->user()->account->balance }}</div>
                            <span class=" text-muted">
                                currency :
                                @if(isset(auth()->user()->country))
                                    {{ auth()->user()->country->iso_4217_currency_code }}
                                @endif
                            </span>
                            <form method="post" action="{{ route('payment.method.out', $payment) }}" autocomplete="off">
                                @csrf
                                @method('put')
                                <div class="form-group{{ $errors->has('methods') ? ' has-danger' : '' }}">
                                    <input type="text" name="methods" id="input-methods" class="form-control form-control-alternative{{ $errors->has('methods') ? ' is-invalid' : '' }}" placeholder="{{ __('Credit card, Email, Number ... of the receiver') }}" value="" required="true">
                                    @if ($errors->has('methods'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('methods') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                        <input type="number" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="{{ __('Amount ...') }}" value="" required="true">
                                        <input type="hidden" name="payment_id" value="{{ $payment->id }}">
                                        @if ($errors->has('amount'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Send money') }}</button>
                                </div>
                            </form>
                        </div>
                        @endif
                        @if($payment->method_accepted=='in_out')
                        <div class="card-body px-lg-7">
                            <div class="display-2 mt-2 mb-2">{{ auth()->user()->account->balance }}</div>
                            <span class=" text-muted">
                                currency :
                                @if(isset(auth()->user()->country))
                                    {{ auth()->user()->country->iso_4217_currency_code }}
                                @else
                                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary">{{ __('update profile') }}</a>
                                @endif
                            </span>
                            <form method="post" action="{{ route('users.account.type', auth()->user()) }}" autocomplete="off">
                                @csrf
                                @method('put')
                                <div class="form-group{{ $errors->has('method') ? ' has-danger' : '' }}">
                                    <input type="text" name="method" id="input-method" class="form-control form-control-alternative{{ $errors->has('method') ? ' is-invalid' : '' }}" placeholder="{{ __('Credit card, Email, Number ...') }}" value="" required="true">
                                    @if ($errors->has('method'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('method') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                        <input type="number" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="{{ __('Amount ...') }}" value="" required="true">
                                        <input type="hidden" name="payment_id" value="{{ $payment->id }}">
                                        @if ($errors->has('amount'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <select name="type" class="form-control">
                                    <option value="credited">{{ __('Send money') }}</option>
                                    <option value="debited">{{ __('credit my account') }}</option>
                                  </select>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('send') }}</button>
                                </div>
                            </form>
                        </div>
                        @endif
					</div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
