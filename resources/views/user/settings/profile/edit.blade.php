@extends('user.settings.index')

@section('head')    
@endsection

@section('settings')
        <div class="col-md-12">
            <form class="form-horizontal" role="form" method="post" action="{{ route('profile.update', ['profile' => $profile->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}


                <div class="form-group{{ $errors->has('uap_number') ? ' has-error' : '' }}">
                    <label for="uap_number" class="control-label col-md-12">UAP Number</label>

                    <div class="col-md-12">
                        <input id="uap_number" type="text" class="form-control" name="uap_number" value="@if(old('uap_number')){{ old('uap_number') }}@else{{ $profile->uap_number }}@endif" placeholder="UAP Number">

                        @if ($errors->has('uap_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('uap_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <hr>

                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                    <label for="phone_number" class="control-label col-md-12">Phone Number</label>

                    <div class="col-md-12">
                        <input id="phone_number" type="text" class="form-control" name="phone_number" value="@if(old('phone_number')){{ old('phone_number') }}@else{{ $profile->phone_number }}@endif" placeholder="Phone Number">

                        @if ($errors->has('phone_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-9 col-md-offset-2">
                        <button type="submit" class="btn btn-primary">
                            Update Profile
                        </button>
                    </div>
                </div>
            </form>
        </div>
@endsection

@section('script')
@endsection