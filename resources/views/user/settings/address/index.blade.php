@extends('user.settings.index')

@section('settings')
        <div class="col-md-12">
            <span class="pull-right">
                <a href="{{ route('address.edit', ['address' => $user->profile->address->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            </span>
        </div>
        <div class="col-md-12">
            <p>
                {{ $user->profile->address->region->place }}
            </p>
            <p>
                {{ $user->profile->address->place->place }}
            </p>
            <p>
                {{ $user->profile->address->address }}
            </p>
        </div>
@endsection
