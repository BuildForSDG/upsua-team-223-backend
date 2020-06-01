@extends('layouts.app', ['title' => __('Payments method')])

@section('content')
    @include('users.partials.header', ['title' => __($payment->name.' payments method')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
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
                    <div class="card-body">
                        <p>
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Link with href
                        </a>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Button with data-target
                        </button>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                            </div>
                        </div>

                        <div class="collapse" id="collapseExample2">
                            <div class="card card-body">
                                2Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
