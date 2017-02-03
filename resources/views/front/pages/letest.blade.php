@extends('front.layout')

@section('title')
	Latest Products
@endsection

@section('content')
	<div class="row">
		<center><h1>Latest Products</h1></center>
		<hr>
		<br>

		<!-- Latest SHirts -->
	    <div class="row">
	        @forelse($products->all() as $product)
	                <div class="small-3 columns">
	                <a href="{{ route('product', $product->id) }}"><h5>{{ $product->category->name }}</h5></a>
	                    <div class="item-wrapper">
	                        <div class="img-wrapper">
	                            <a href="{{ route('cart.edit', $product->id) }}" class="button expanded add-to-cart">
	                                Add to Cart
	                            </a>
	                            <a href="#">
	                                <img src="{{ url('images/' . $product->image) }}"/>
	                            </a>
	                        </div>
	                        <a href="{{ route('product', $product->id) }}">
	                            <h3>
	                                {{ $product->name }}
	                            </h3>
	                        </a>
	                        <h5>
	                            ${{ $product->price }}
	                        </h5>
	                        <p>
	                            {{ $product->desc }}
	                        </p>
	                    </div>
	                </div>
	            @empty

	            <h3>No Products</h3>

	        @endforelse
	    </div>
	</div>
@endsection