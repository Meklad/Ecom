<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;


use App\Category;
use App\Product;


class CheckoutController extends Controller
{
    /**
     * This method check if user Authenticated than return him to shpping form.
     * 
     * @return view('fornt.shpping').
     */
    public function step1()
    {
        $categories = Category::all();
        $admin      = Auth::user('admin');

    	if (Auth::check()) {
    		return redirect()->route('checkout.shipping');
    	}

    	return redirect('login');
    }

    public function shipping()
    {
        $categories = Category::all();
        $admin      = Auth::user('admin');

        return view('front.cart.shipping-form', compact('categories', 'admin'));
    }

    public function payment()
    {
        $categories = Category::all();
        $admin      = Auth::user('admin');
        return view('front.cart.payment', compact('categories', 'admin'));
    }

    public function storePayment(Request $request)
    {
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_7BoWwbLvjrynz7Yn2ACP3BD3");

        // Token is created using Stripe.js or Checkout!
        // Get the payment token submitted by the form:
        $token = $request->stripeToken;

        // Charge the user's card:
        $charge = \Stripe\Charge::create(array(
          "amount" => 1000,
          "currency" => "usd",
          "description" => "Example charge",
          "source" => $token,
        ));

        \Session::flush();

        return redirect('/');
    }
}
