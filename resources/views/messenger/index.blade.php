@extends('layouts.app', ['title' => __('Upsua Messages')])

@section('content')
    <div class="header bg-primary bg-gradient-primary pb-6 pt-3 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
               <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{url('messages')}}">Messages</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </nav>
        </div>
                <div class="col-lg-6 col-5 text-right">
                <a href="{{ url('/messages/create') }}" class="btn btn-sm btn-neutral">New</a>
            </div>
        </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="table-responsive card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Consult the list of messages') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('/messages/create') }}" class="btn btn-sm btn-primary">{{ __('Create New Message') }}</a>
                            </div>
                        </div>
                    </div>

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

                    <div class="table-responsive">
                        <!-- Messages -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <!-- Title -->
                                <h5 class="h3 mb-0">Latest messages</h5>
                            </div>
                            <!-- Card body -->
                            <div class="card-body p-0">
                                <!-- List group -->
                                <div class="list-group list-group-flush">
                                    @foreach ($threads as $thread)
                                    @php
                                        $classe = $thread->isUnread(Auth::id()) ? 'bg-warning ' : '';
                                    @endphp
                                        <a href="{{ route('messages.show', $thread->id) }}" class="{{ $classe }} list-group-item list-group-item-action flex-column align-items-start py-4 px-4">
                                            <div class="d-flex w-100 justify-content-between">
                                                <div>
                                                    <div class="d-flex w-100 align-items-center">
                                                        @if(!empty(auth()->user()->cni_img))
                                                        <img src="{{asset('/assets/img/profiles/'.$thread->creator()->cni_img)}}" alt="Image placeholder" class="avatar avatar-xs mr-2" />
                                                        @else
                                                        <img src="{{ asset('argon') }}/img/brand/favicon.png" alt="Image placeholder" class="avatar avatar-xs mr-2" />
                                                        @endif
                                                        <h5 class="mb-1">{{ $thread->creator()->name }}</h5>
                                                    </div>
                                                </div>
                                                <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
                                            </div>
                                            <h4 class="mt-3 mb-1"> {{ $thread->subject }}({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</h4>
                                            <p class="text-sm mb-0">
                                                {{ $thread->latestMessage->body }}
                                            </p>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                @include('messenger.partials.flash')
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection
@push('js')
<!-- Optional JS -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/dataTables.select.min.js') }}"></script>
<!-- Argon JS -->
<script src="{{ asset('js/argon.min.js?v=1.1.0') }}"></script>
</body>
</html>
@endpush
