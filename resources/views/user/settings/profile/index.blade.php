@extends('user.settings.index')

@section('head')

@endsection

@section('settings')
        <div class="col-md-12">
            <span class="pull-right">
                <a href="{{ route('profile.edit', ['profile' => $user->profile->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            </span>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        <img id="img-avatar" src="@if($user->profile->avatar) {{route('home')}}/{{ $user->profile->avatar }} @else https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97150&w=150&h=150 @endif">
                        <p>
                            <form id="user-avatar" action="{{route('user.avatar', ['profile' => $user->profile->id])}}">
                                <input type="hidden" name="avatar" id="avatar" role="uploadcare-uploader" data-image-shrink="800x800 60%" data-crop="1:1" />
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="Save!" />
                            </form>
                            
                        </p>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        @if($user->profile->uap_number)
                            UAP Number {{ $user->profile->uap_number }}
                        @else
                            <a href="{{ route('profile.edit', ['profile' => $user->profile->id]) }}" class="btn btn-primary btn-xs">Add UAP Number</a>
                        @endif
                    </p>
                    <p>
                        @if($user->profile->phone_number)
                            Phone Number {{ $user->profile->phone_number }}
                        @else
                            <a href="{{ route('profile.edit', ['profile' => $user->profile->id]) }}" class="btn btn-primary btn-xs">Add Phone Number</a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
@endsection

@section('script')
    <script>
        UPLOADCARE_PUBLIC_KEY = '67d96773aea58980cd4a';
        UPLOADCARE_TABS = 'file';
        UPLOADCARE_IMAGES_ONLY = true;
        UPLOADCARE_CLEARABLE = true;
    </script>

    <script charset="utf-8" src="https://ucarecdn.com/libs/widget/2.10.3/uploadcare.full.min.js"></script>

    <script>
        $('#user-avatar').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: { avatar: $('#avatar').val() },
                success: function success(response) {
                    if(response !== 'error')
                    {
                        $('#img-avatar').attr("src",'{{route('home')}}/' + response + "?no-cache=" + $.now());
                    }
                },
                error: function error(response) {
                    console.log('response');
                }
            });
        });
</script>

@endsection