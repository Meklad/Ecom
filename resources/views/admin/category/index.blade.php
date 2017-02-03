@extends('admin.layout.admin')

@section('title')
	Show All Categories
@endsection

@section('content')
	<center><h1>All Categories</h1></center><hr>
<table class="table">
	<thead class="thead-inverse">
		<tr>
		  <th>#</th>
		  <th>Category Name</th>
		  <th>Operations</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		@if(!empty($categories))
			@forelse($categories as $category)
			  <th scope="row">{{ $category->id }}</th>
			  <td><b><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></b></td>
			  <td>
			  	<a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
			  </td>
			  <td>
			  	{!! Form::open(['route' => ['category.destroy', $category->id], 'method' => 'delete']) !!}
				    <div class="form-group">
				       	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
				    </div>
				{!! Form::close() !!}
			  </td>
			</tr>

			@empty

			<h3>No Categories</h3>

			@endforelse
		@endif
	</tbody>
</table>

@if(!empty($products))

<section>

	<h3>Products</h3>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Products</th>
			</tr>
		</thead>
		<tbody>
			@forelse($products as $product)
			<tr>
				<td>{{ $product->name }}</td>
			</tr>

			@empty

			<tr><td>No Products</td></tr>
			@endforelse
		</tbody>
	</table>

</section>

@endif

@endsection