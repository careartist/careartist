@extends('user.products.main')

@section('product')
        <div class="col-md-12">
            <p>
            <ul>
            @foreach($products as $product)
            	<li>
            		<a href="{{route('products.show', ['id' => $product->id])}}">
            			{{$product->title}} {{$product->user->profile->address->place->place}}
            		</a>

            		<span class="pull-right">
            			<a href="{{route('products.edit', ['id' => $product->id])}}">Edit</a>
            		</span>
            	</li>
            @endforeach
            </ul>
            </p>
        </div>
@endsection
