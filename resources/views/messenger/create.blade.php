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
                                <h3 class="mb-0"></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('messages') }}" class="btn btn-sm btn-primary">{{ __('Returns to the list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
    <form action="{{ route('messages.store') }}" method="post">
        {{ csrf_field() }}
            <!-- Subject Form Input -->
            <div class="pl-lg-4">
                <div class="form-group">
                    <label class="control-label">Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                        value="{{ old('subject') }}">
                </div>
            </div>

            <!-- Message Form Input -->
            <div class="pl-lg-4">
                <div class="form-group">
                    <label class="control-label">Message</label>
                    <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                </div>
            </div>
            <div class="pl-lg-4">
                @if($users->count() > 0)
                    <div class="checkbox">
                        @foreach($users as $user)
                            <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                                                                    value="{{ $user->id }}">{!!$user->name!!}</label>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Submit Form Input -->
            <div class="pl-lg-4">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
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

