@extends('user.settings.index')

@section('head')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    
@endsection

@section('settings')
        <div class="col-md-12">
            <form class="form-horizontal" role="form" method="post" action="{{ route('address.update', ['address' => $address->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group">
                    <label for="region" class="control-label sr-only">Region</label>
                    <div class="col-md-9">
                        <select id="region" class="form-control" name="region" >
                            <option value="">Region</option>

                            @foreach($regions as $region)
                            <option value="{{$region->id}}"@if($region->id == $address->region_id)selected="selected"@endif>{{$region->place}}</option>
                            @endforeach

                        </select>

                        @if ($errors->has('region'))

                            <span class="help-block">
                                <strong>{{ $errors->first('region') }}</strong>
                            </span>

                        @endif
                        
                    </div>
                </div>

                <div class="form-group" id="places">
                    <label for="place" class="control-label sr-only">City</label>

                    <div class="col-md-9">

                        <select name="place" id="place" class="form-control selectpicker" data-live-search="true">
                            <option value="">Select</option>
                            <?php $last_id = 0; ?>
                            @foreach($places as $place)
                            @if($place->p_id != $last_id)

                            <optgroup label="{{ $place->p_place }}"></optgroup>');
                            <?php $last_id = $place->p_id ?>
                            @endif

                            <option value="{{$place->id}}"@if($place->id == $address->place_id)selected="selected"@endif>{{$place->place}}</option>

                            @endforeach
                        </select>
                        
                    </div>
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="control-label sr-only">Address</label>

                    <div class="col-md-9">
                        <textarea id="address" class="form-control" name="address"  autofocus>@if(old('address')){{ old('address') }}@else{{ $address->address }}@endif</textarea>

                        @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-9 col-md-offset-2">
                        <button type="submit" class="btn btn-primary">
                            Update Address
                        </button>
                    </div>
                </div>
            </form>
        </div>
@endsection

@section('script')

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <script>
        $('#region').on('change', function (e) 
        {
            var region_id = e.target.value;
            if(region_id != '')
            {
                $('#place').html('');
                $('#place').append('<option value="">Select</option>');
                                        
                $.get('{{ route('home') }}/user/ajax-places/' + region_id, function (data) 
                {
                    var last_id = 0;
                    $.each(data, function (index, placeObj) 
                    {
                        if(placeObj.p_id != last_id)
                        {
                            $('#place').append('<optgroup label="'+ placeObj.p_place +'"></optgroup>');
                            last_id = placeObj.p_id;
                        }
                        $('#place').append('<option data-tokens="'+placeObj.loc+'" value="'+placeObj.id+'">'+placeObj.place+'</option>');
                    });
                    $('.selectpicker').selectpicker('refresh');
                });
            }
        });
    </script>

@endsection