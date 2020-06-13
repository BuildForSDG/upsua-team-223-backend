@extends('layouts.app', ['title' => __('Finances')])

@section('content')
    @include('users.partials.header', ['title' => __('All Finances')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('List of Finances') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('home') }}" class="btn btn-sm btn-primary">{{ __('Dashboard') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- ici -->
                        <div class="header-body">
                            <!-- Card stats -->
                            <div class="row">

                                @foreach($finances as $f)
                                <div class="col-xl-3 col-lg-6 pt-1">
                                    <div class="card card-stats mb-1 mb-xl-0">
                                        <a href="{{ route('method.finance',$f->id) }}">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">{{$f->name}}</h5>
                                                    <span class="h6 font-weight-bold mb-0">{{$f->description}}</span>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape rounded-circle shadow">
                                                        <img class="rounded-circle shadow" width="30" src="{{asset('/assets/img/finances/'.$f->img)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-muted text-sm">
                                                <span class="text-info mr-2"><i class="fas fa-arrow-down"></i> Infos: </span>
                                                <span class="text-nowrap">Clic here</span>
                                            </p>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- ici -->
					</div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
