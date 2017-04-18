@extends('user.products.main')

@section('product')
        <div class="col-md-12">
            <span class="pull-right">
                <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-primary btn-xs">Edit</a>
            </span>
        </div>
        <div class="col-md-12">
            <p>
                Product {{$product->id}}
            </p>
        </div>
@endsection
