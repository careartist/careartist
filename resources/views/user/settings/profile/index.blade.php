@extends('user.settings.index')

@section('settings')
        <div class="col-md-12">
            <span class="pull-right">
                <a href="{{ route('profile.edit', ['profile' => $user->profile->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            </span>
        </div>
        <div class="col-md-12">
            <p>
                @if($user->profile->uap_number)
                    {{ $user->profile->uap_number }}
                @else
                    <a href="{{ route('profile.edit', ['profile' => $user->profile->id]) }}" class="btn btn-primary btn-xs">Add UAP Number</a>
                @endif
            </p>
            <p>
                @if($user->profile->phone_number)
                    {{ $user->profile->phone_number }}
                @else
                    <a href="{{ route('profile.edit', ['profile' => $user->profile->id]) }}" class="btn btn-primary btn-xs">Add Phone Number</a>
                @endif
            </p>
        </div>
@endsection
