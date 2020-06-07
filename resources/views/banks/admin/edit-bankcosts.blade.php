@extends('layouts.app', ['title' => __('Service Costs Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Service Costs')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Service costs management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('otherservice.show',$cost->otherService->id) }}" class="btn btn-sm btn-primary">{{ __('Returns to the list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('otherservicecost.update', $cost) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Other service cost information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('min') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-min">{{ __('Min value') }}</label>
                                    <input type="hidden" value="{{ $cost->otherService->id }}" name="other_service_id">
                                    <input type="number" name="min" id="input-min" class="form-control form-control-alternative{{ $errors->has('min') ? ' is-invalid' : '' }}" placeholder="{{ __('Min value') }}" value="{{ $cost->min_val }}" required="true">

                                    @if ($errors->has('min'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('min') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('max') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-max">{{ __('Max value') }}</label>
                                    <input type="number" name="max" id="input-max" class="form-control form-control-alternative{{ $errors->has('max') ? ' is-invalid' : '' }}" placeholder="{{ __('Max value') }}" value="{{ $cost->max_val }}" required="true">

                                    @if ($errors->has('max'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('max') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-amount">{{ __('Amount') }}</label>
                                    <input type="text" name="amount" id="input-amount" class="form-control form-control-alternative{{ $errors->has('Amount') ? ' is-invalid' : '' }}" placeholder="{{ __('amount') }}"value="{{ $cost->amount }}" required="true">

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
                    </div>
                </div>
             </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
