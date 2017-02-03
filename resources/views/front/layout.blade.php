<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Ecom | @yield('title', 'Ecom')</title>
        <link rel="stylesheet" href="{{ asset('frontEnd/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontEnd/css/font-awesome.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontEnd/css/foundation.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontEnd/css/app.css') }}"/>
        <link rel="stylesheet" href="{{ asset('frontEnd/css/foundation-icons.css') }}"/>
    </head>
    <body>
        <div  class="top-bar">
            <div style="color:white" class="top-bar-left">
                <h4 class="brand-title">
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home fa-lg" aria-hidden="true">
                        </i>
                       Ecom <small>Store</small>
                    </a>
                </h4>
            </div>
            <div class="top-bar-right">
                <ol class="menu">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><b>Categoris</b><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                    <li><a href="{{ route('category', $category->id) }}">{{ $category->name }} </a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('aboutUs') }}">
                            <b>About Us</b>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contactUs') }}">
                            <b>Contact Us</b>
                        </a>
                    </li>
                    @if(Auth::guest())
                    <li>
                        <a href="{{ route('login') }}">
                            <b>Login</b>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user())
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><b>{{ $admin->name }}</b><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('admin.index')}}">Control Panel</a></li>
                            <li><a href="{{url('/logout')}}">LogOut</a></li>
                        </ul>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('cart.index') }}">
                            <i class="fa fa-shopping-cart fa-2x" aria-hidden="true">
                            </i>
                            CART <span class="alert badge">{{ Cart::count() }}</span>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
        
        @yield('header')
        <!-- Start Content -->

        @yield('content')

        <!-- Footer -->
        <br>
<footer class="footer">
  <div class="row full-width">
    <div class="small-12 medium-4 large-4 columns">
      <i class="fi-laptop"></i>
      <h3>This Website develped by <br> Ahmed Meklad</h3>
    </div>
    <div class="small-12 medium-4 large-4 columns">
      <i class="fi-html5"></i>
      <h1>Ecom</h1><h4>Is a ecommerce website</h4>
    </div>
    
    <div class="small-6 medium-4 large-4 columns">
      <h4>Follow Us</h4>
      <ul class="footer-links">
        <li><a href="#">Google+</a></li>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Twitter</a></li>
      <ul>
    </div>
  </div>
</footer>

    <script src="{{ asset('frontEnd/js/vendor/jquery.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        Stripe.setPublishableKey('pk_test_RFKQc2JWxq4sPSlfQ9LraqSO');
    </script>
    <script src="{{ asset('frontEnd/js/app.js') }}"></script>
    <script src="{{ asset('frontEnd/js/vendor/bootstrap.min.js') }}"></script>
    </body>
</html>
