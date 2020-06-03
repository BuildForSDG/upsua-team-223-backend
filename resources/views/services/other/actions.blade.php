@extends('layouts.app', ['title' => __('Service method')])

@section('content')
    @include('users.partials.header', ['title' => __($otherService->name.' service')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card card-pricing border-0 mb-4 bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Use '.$otherService->name) }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('users.service') }}" class="btn btn-sm btn-primary">{{ __('Services') }}</a>
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
                                <div class="form-group{{ $errors->has('methods') ? ' has-danger' : '' }}">
                                    <input type="text" name="methods" id="input-methods" class="form-control form-control-alternative{{ $errors->has('methods') ? ' is-invalid' : '' }}" placeholder="{{ __('Bill number') }}" value="" required="true">
                                    @if ($errors->has('methods'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('methods') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                        <input type="number" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="{{ __('Amount ...') }}" value="" required="true">
                                        <input type="hidden" name="service_id" value="{{ $otherService->id }}">
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
					</div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
