@extends('front.layout')

@section('title')
	Shpping Info
@endsection

@section('content')
<div class="row">

	<br>

	<center><h1>Add Your Shipping Info</h1></center>

	<hr>

	<br>

	<div class="small-6 small-centered columns">

	{!! Form::open(['route' => 'address.store', 'method' => 'post']) !!}
	
	<div class="form-group">
		{!! Form::label('addressline', 'Address Line') !!}
		{!! Form::text('addressline', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('city', 'City') !!}
		{!! Form::text('city', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('state', 'State') !!}
		{!! Form::text('state', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('zip', 'Zip') !!}
		{!! Form::text('zip', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('country', 'Country') !!}
		{!! Form::text('country', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('phone', 'Phone') !!}
		{!! Form::text('phone', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Prossed To Payment >', ['class' => 'button success']) !!}
	</div>

	{!! Form::close() !!}
		
	</div>

</div>

@endsection