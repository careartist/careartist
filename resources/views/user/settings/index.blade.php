@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Settings
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        <p><a href="{{route('profile.index')}}">Profile settings</a></p>
                        <p><a href="{{route('address.index')}}">Address settings</a></p>
                        <p><a href="#">Roles settings</a></p>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            @yield('settings')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
