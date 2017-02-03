@extends('admin.layout.admin')

@section('title')
	Add New Product
@endsection

@section('content')
	<center><h1>Add New Product</h1></center><hr>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			{!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true, 'data-parsley-validate' => '']) !!}
				<div class="form-group">
					{!! Form::label('name', 'Product Name') !!}
					{!! Form::text('name', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('desc', 'Description') !!}
					{!! Form::text('desc', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('stock_quantity', 'Stock Quantity', ['class' => 'control-label']) !!}
					{!! Form::number('stock_quantity', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => 'number']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
					{!! Form::text('price', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => 'number']) !!}
				</div>

				@if (Session::has('flash_message'))
					<div class="alert alert-danger">
						{{ Session::get('flash_message') }}
					</div>
				@endif

				<div class="form-group">
					{!! Form::label('discount_pct', 'Discount Pct', ['class' => 'control-label']) !!}
					{!! Form::number('discount_pct', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => 'number']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('category_id', 'Categories') !!}
					{!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Select Category']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('image', 'Product Image') !!}
					{!! Form::file('image', ['class' => 'form-control',  'required' => '']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
				</div>
				
			{!! Form::close() !!}
		</div>
	</div>
@endsection