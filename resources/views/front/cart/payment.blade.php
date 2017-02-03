@extends('front.layout')

@section('title')
	Payment Method
@endsection

@section('content')
	<div class="row">

@include('admin.layout.errors')

	<br>

	<center><h1>Payment Method</h1></center>

	<hr>

	<br>

	<div class="small-6 small-centered columns">

	<center>

		<form action="{{ route('payment.store') }}" method="POST" id="payment-form">

		{{ csrf_field() }}

		  <span class="payment-errors"></span>

		  <div class="form-row">
		    <label>
		      <span>Card Number</span>
		      <input type="text" size="20" data-stripe="number">
		    </label>
		  </div>

		  <div class="form-row">
		    <label>
		      <span>Expiration (MM/YY)</span>
		      <input type="text" size="2" data-stripe="exp_month">
		    </label>
		    <span> / </span>
		    <input type="text" size="2" data-stripe="exp_year">
		  </div>

		  <div class="form-row">
		    <label>
		      <span>CVC</span>
		      <input type="text" size="4" data-stripe="cvc">
		    </label>
		  </div>


		  <input type="submit" class="submit button success" value="Submit Payment">
		</form>

	</center>
		
	</div>

	<br>

	<hr>

</div>

@endsection

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        Stripe.setPublishableKey('pk_test_RFKQc2JWxq4sPSlfQ9LraqSO');
    </script>
    <script type="text/javascript" src="{{ asset('js/pay.js') }}"></script>