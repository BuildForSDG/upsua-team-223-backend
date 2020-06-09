@extends('layouts.app', ['title' => __('Bank method')])

@section('content')
    @include('users.partials.header', ['title' => __($bank->name.' bank')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card card-pricing border-0 mb-4 bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Use '.$bank->name) }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('users.bank') }}" class="btn btn-sm btn-primary">{{ __('Banks') }}</a>
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
                        <div class="card-body px-lg-7">
                            <div class="display-2 mt-2 mb-2">{{ auth()->user()->account->balance }}</div>
                            <span class=" text-muted">
                                currency :
                                @if(isset(auth()->user()->country))
                                    {{ auth()->user()->country->iso_4217_currency_code }}
                                @endif
                            </span>
                            <form method="post" action="#" autocomplete="off">
                                @csrf
                                @method('put')
                                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                        <input type="number" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="{{ __('Amount ...') }}" value="" required="true">
                                        <input type="hidden" name="service_id" value="{{ $bank->id }}">
                                        @if ($errors->has('amount'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <select name="type" class="form-control">
                                    <option value="credited">{{ __('Credited from '.$bank->name) }}</option>
                                    <option value="debited">{{ __('Debited from '.$bank->name) }}</option>
                                  </select>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Send') }}</button>
                                </div>
                                <div class="text-center mt-2">
                                    <a href="#" class="btn btn-sm btn-primary">{{ __('bank balance') }}</a>
                                    <a href="#" class="btn btn-sm btn-primary">{{ __('historical') }}</a>
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
