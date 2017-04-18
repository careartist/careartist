@extends('user.products.main')

@section('head')
@endsection

@section('product')
        <div class="col-md-12">
            <form class="form-horizontal" role="form" method="post" action="{{ route('products.store') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                    <label for="body" class="control-label sr-only">Description</label>

                    <div class="col-md-9">
                        <textarea id="body" class="form-control" name="body"  autofocus>{{ old('body') }}</textarea>

                        @if ($errors->has('body'))
                            <span class="help-block">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-9 col-md-offset-2">
                        <button type="submit" class="btn btn-primary">
                            Add Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
@endsection

@section('script')
@endsection