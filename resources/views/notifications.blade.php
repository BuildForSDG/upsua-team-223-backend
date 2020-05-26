@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Notifications</h6>
                    </div>
                </div>

                @php
                    $user = auth()->user();
                    $notifications = $user->notifications;
                @endphp

                <br>
                <div class="row">
                    <div class="col-md-12">
                        
                        @foreach ($notifications as $notification)
                            @php
                                $data = $notification->data;
                            @endphp
                            <div class="card shadow">
                                <div class="card-header border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-8">
                                            <h3 class="mb-0" style="display: inline;">{{ $data['subject'] }}</h3>

                                            &nbsp; &nbsp; &nbsp; 

                                            @if ($notification->unread())
                                                <span class="badge badge-danger">NEW</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 text-right">
                                            {{ $notification->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{ $data['message'] }}
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <br>
                            {{-- //mark the notification as read --}}
                            @php
                                $notification->markAsRead();
                            @endphp
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection