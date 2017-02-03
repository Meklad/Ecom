@extends('front.layout')

@section('title')
    Home
@endsection

@section('header')
    <section class="text-center">
        <br/>
        <br/>
        <br/>
        <br/>
        <h2 >
            <strong>
                Hey! Welcome to Ecom Store
            </strong>
        </h2>
        <br>
        <a href="{{ route('letest') }}"><button class="button large">Check out our products</button></a>
    </section>
    <br/>
@endsection

@section('content')

    <div class="subheader text-center">
         <h2>
        Ecom Latest Products
    </h2>
    </div>
   
    <!-- Latest SHirts -->
    <div class="row">
                     @forelse($products->chunk(4) as $chunk)
            @foreach($chunk as $product)
                <div class="small-3 columns">
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
                @endforeach

                @empty

                <h3>No Products</h3>
        @endforelse
    </div>

@endsection