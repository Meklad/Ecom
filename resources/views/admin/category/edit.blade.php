@extends('admin.layout.admin')

@section('title')
	Edit Category
@endsection

@section('content')
	<center><h1>Edit Category</h1></center><hr>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			{!! Form::model($category, ['route' => ['category.update', $category->id], 'method' => 'PUT']) !!}
				<div class="form-group">
					{!! Form::label('name', 'Product Name') !!}
					{!! Form::text('name', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('max_discount_pct', 'Max Discount Pct') !!}
					{!! Form::number('max_discount_pct', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
				</div>
				
			{!! Form::close() !!}
		</div>
	</div>
@endsection