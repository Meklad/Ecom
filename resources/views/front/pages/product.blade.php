@extends('front.layout')

@section('title')
    Product Name
@endsection

@section('content')
	<div class="container">
		<center><h1>{{ $product->name }}</h1></center><hr>
	</div>
        <!-- Latest SHirts -->
        <div class="row">
            <div class="small-5 small-offset-1 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                        <a href="{{ url('images/' . $product->image) }}">
                             <img src="{{ url('images/' . $product->image) }}"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="small-6 columns">
                <div class="item-wrapper">
                    <h3 class="subheader">
                        <h5 style="color: green;">{{ $product->name }}</h5>
                       <span class="price-tag">Price: ${{ $product->price }}</span>
                       <div class="item-wrapper">
                            <p><b>Descreption: {{ $product->desc }}</b></p>
                       </div><br>
            <a href="{{ route('category', $product->category->id) }}"><h5 style="color: green;">Category: {{ $product->category->name }}</h5></a>

                    </h3>
                    <div class="row">
                        <div class="large-12 columns">
                            <a href="{{ route('cart.edit', $product->id) }}" class="button  expanded">Add to Cart</a>
                        </div>
                    </div>
                <p class="text-left subheader"><small>* Designed by <a href="https://www.youtube.com/webdevmatics">Webdevmatics</a></small></p>

                </div>
            </div>
        </div>
    </div>
@endsection