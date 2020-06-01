@extends('layouts.app', ['title' => __('User account')])

@section('content')
    @include('users.partials.header', ['title' => __('deposit account: '.$user->email)])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card card-pricing border-0 text-center mb-4">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center text-left">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Account balance') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Returns to the list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
						<div class="card-body px-lg-7">
                            <div class="display-2 mt-2 mb-2">{{ $user->account->balance }}</div>
                            <span class=" text-muted">
                                currency :
                                @if(isset($user->country))
                                    {{ $user->country->iso_4217_currency_code }}
                                @endif
                            </span>
                            <form method="post" action="{{ route('users.account.type', $user) }}" autocomplete="off">
                                @csrf
                                @method('put')
                                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                        <input type="number" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="{{ __('Amount ...') }}" value="" required="true">

                                        @if ($errors->has('amount'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <select name="type" class="form-control">
                                    <option value="credited">{{ __('Credited') }}</option>
                                    <option value="debited">{{ __('Debited') }}</option>
                                  </select>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('send') }}</button>
                                </div>
                            </form>
                        </div>
					</div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
