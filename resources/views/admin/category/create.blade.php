@extends('admin.layout.admin')

@section('title')
	Add New Category
@endsection

@section('content')
	<center><h1>Add New Category</h1></center><hr>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			{!! Form::open(['route' => 'category.store', 'method' => 'post', 'files' => true]) !!}
				<div class="form-group">
					{!! Form::label('name', 'Category Name') !!}
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('max_discount_pct', 'Max Discount Pct') !!}
					{!! Form::number('max_discount_pct', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
				</div>
				
			{!! Form::close() !!}
		</div>
	</div>
@endsection