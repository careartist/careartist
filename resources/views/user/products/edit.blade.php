@extends('user.products.main')

@section('head')    
@endsection

@section('product')
        <div class="col-md-12">
            <form class="form-horizontal" role="form" method="post" action="{{ route('products.update', ['product' => $product->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                    <label for="body" class="col-md-3 control-label">Description</label>

                    <div class="col-md-9">
                        <textarea id="body" class="form-control" name="body" autofocus>@if(old('body')){{ old('body') }}@else{{ $product->body }}@endif</textarea>

                        @if ($errors->has('body'))
                            <span class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">
                            Update Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
@endsection

@section('script')
@endsection