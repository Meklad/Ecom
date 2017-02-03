@extends('front.layout')

@section('title')
    All Products
@endsection

@section('content')
	<div class="container">
		<center><h1>All Products</h1></center><hr>
	</div>
	<!-- products listing -->
         <!-- Latest SHirts -->
        <div class="row">
            @forelse($products as $product)
            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="{{ route('product', $product->id) }}">
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
@endsection