@extends('layouts.app', ['title' => __('Upsua Messages')])

@section('content')
    @include('users.partials.header', ['title' => __('Upsua Messages')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __($thread->subject) }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('messages') }}" class="btn btn-sm btn-primary">{{ __('Returns to the list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- List group -->
                        <div class="list-group list-group-flush">
                            @foreach ($thread->messages as $message)
                                <a class="list-group-item list-group-item-action flex-column align-items-start py-4 px-4">
                                    <div class="d-flex w-100 justify-content-between">
                                        <div>
                                            <div class="d-flex w-100 align-items-center">
                                                @if(!empty(auth()->user()->cni_img))
                                                <img src="{{asset('/assets/img/profiles/'.$message->user->cni_img)}}" alt="Image placeholder" class="avatar avatar-xs mr-2" />
                                                @else
                                                <img src="{{ asset('argon') }}/img/brand/favicon.png" alt="Image placeholder" class="avatar avatar-xs mr-2" />
                                                @endif
                                                <h5 class="mb-1">{{ $message->user->name }}</h5>
                                            </div>
                                        </div>
                                        <small><strong>Posted:</strong> {{ $message->created_at->diffForHumans() }}</small>
                                    </div>
                                    <h4 class="mt-3 mb-1"></h4>
                                    <p class="text-sm mb-0">
                                        {{ $message->body }}
                                    </p>
                                </a>
                            @endforeach
                    @include('messenger.partials.form-message')
                    </div>
            </div>
        </div>
    </div>

@include('layouts.footers.auth')
</div>
@endsection
