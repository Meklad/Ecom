@extends('admin.layout.admin')

@section('title')
	Show All Products
@endsection

@section('content')
	<center><h1>All Products</h1></center><hr>

<table class="table">
	<thead class="thead-inverse">
		<tr>
		  <th>#</th>
		  <th>Product Name</th>
		  <th>Product Category</th>
		  <th>Product Price</th>
		  <th>Product Image</th>
		  <th>Operations</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		@forelse($products as $product)
		  <th scope="row">{{ $product->id }}</th>
		  <td>{{ $product->name }}</td>
		  <td>{{ $product->category->name }}</td>
		  <td>${{ $product->price }}</td>
		  <td><img src="{{ url('images/' . $product->image) }}" width="100" height="100"></td>
		  <td>
		  	<a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
		  </td>
		  <td>
		  	{!! Form::open(['route' => ['product.destroy', $product->id], 'method' => 'delete']) !!}
			    <div class="form-group">
			       	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
			    </div>
			{!! Form::close() !!}
		  </td>
		</tr>

		@empty

		<h3>No Products</h3>

		@endforelse
	</tbody>
</table>

@endsection