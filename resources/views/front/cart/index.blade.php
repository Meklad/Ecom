@extends('front.layout')

@section('title')
	Add Products To Shopping Card
@endsection

@section('content')
{{ Html::style('css/font-awesome.min.css') }}
{{ Html::style('css/cart.css') }}

<center><h3>Add Product To Sopping Card</h3></center><hr><br>
<div class="container">
	<div class="row">
		<p><b>Date: {{ Carbon\Carbon::now() }}</b></p>
		<table id="cart" class="table table-hover table-condensed">
		<thead>
			<tr>
				<th style="width:50%">Product</th>
				<th style="width:10%">Subtotal</th>
				<th style="width:8%">Quantity</th>
				<th style="width:22%" class="text-center">Quantity Prics</th>
				<th style="width:10%"></th>
			</tr>
		</thead>
		<tbody>
		@foreach($cartItems as $cartItem)
			<tr>
				<td data-th="Product">
					<div class="row">
						<div class="col-sm-2 hidden-xs"><img src="{{ url('images/mc.jpg') }}" alt="..." class="img-responsive"/></div>
						<div class="col-sm-10">
							<h4 class="nomargin">{{ $cartItem->name }}</h4>
							<p>{{ $cartItem->desc }}</p>
						</div>
					</div>
				</td>
				<td data-th="Subtotal" class="text-center">${{ $cartItem->price }}</td>
				{!! Form::open(['route' => ['cart.update', $cartItem->rowId], 'method' => 'PUT']) !!}

				<td data-th="Quantity">
					<input type="number" name="qty" class="form-control text-center" value="{{ $cartItem->qty }}">
				</td>
				<td data-th="Price" class="text-center">${{ $cartItem->price * $cartItem->qty }}</td>
				<td class="actions" data-th="">

				<input type="submit" class="btn btn-info small" value="Update">
				{!! Form::close() !!}
				{!! Form::open(['route' => ['cart.destroy', $cartItem->rowId], 'method' => 'Delete']) !!}
				<input type="submit" class="btn btn-danger small" value="Delete">
				{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
		</tbody>
		<tfoot>
			<tr class="visible-xs">
				<td class="text-center"><strong>Total 1.99</strong></td>
			</tr>
			<tr>
				<td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
				<td class="hidden-xs"></td>
				<td class="hidden-xs text-center"><strong>Items: {{ Cart::count() }}</strong></td>
				<td class="hidden-xs text-center">
				<strong>
				SubTotal Price: {{ Cart::subtotal() }} <br>
				Discoutn: <br>       
				-------------- <br>
				Salling Prics {{ Cart::subtotal() }}
				</strong></td>
				<td><a href="{{ route('checkout') }}" class="btn btn-success btn-block" id="conf">Checkout <i class="fa fa-angle-right"></i></a></td>
			</tr>
		</tfoot>
	</table>
	</div>
</div>
@endsection