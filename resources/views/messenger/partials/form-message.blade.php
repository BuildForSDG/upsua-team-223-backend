<div class="card-body">
    <h6 class="heading-small text-muted mb-4">Add a new message</h6>
<form action="{{ route('messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
    <div class="pl-lg-4">
        <!-- Subject Form Input -->
        <div class="form-group">
        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
    </div>
    </div>
    <div class="pl-lg-4">
    @if($users->count() > 0)
        <div class="checkbox">
            @foreach($users as $user)
                <label title="{{ $user->name }}">
                    <input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->name }}
                </label>
            @endforeach
        </div>
    @endif

    <!-- Submit Form Input -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </div>
</div>
</div>
</form>
</div>
