<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

use Auth;

/*************************************************
 * This Controller Return The FrontEnd Pages.
 */
class FrontController extends Controller
{
	/*******************************************
	 * This method return home view to the user.
	 * 
	 * @return views/front/pages/home.blade.php
	 */
    public function home()
    {
        $products = Product::all();
        $categories = Category::all();
        $admin       = Auth::user('admin');
        return view('front.pages.home', compact('products', 'categories', 'admin'));
    }

    /***********************************************
     * This method return About Us view to the user.
     * 
     * @return views/front/pages/aboutUs.blade.php
     */
    public function aboutUs()
    {
        $categories = Category::all();
        $admin       = Auth::user('admin');
    	return view('front.pages.aboutUs', compact('categories', 'admin'));
    }

    /*************************************************
     * This method return Contact Us view to the user.
     * 
     * @return views/front/pages/contactUs.blade.php
     */
    public function contactUs()
    {
        $categories = Category::all();
        $admin       = Auth::user('admin');
        return view('front.pages.contactUs', compact('categories', 'admin'));
    }

    /***************************************************
     * This method return all products view to the user.
     * 
     * @return views/front/pages/products.blade.php
     */
    public function category($id)
    {
        $products = Category::findOrFail($id)->products;
        $categories = Category::all();
        $admin       = Auth::user('admin');
        return view('front.pages.category', compact('products', 'categories', 'admin'));
    }

    /*******************************************************
     * This method return Specific product view to the user.
     * 
     * @return views/front/pages/product.blade.php
     */
    public function product($id)
    {
        $product  = Product::findOrFail($id);
        $categories = Category::all();
        $admin       = Auth::user('admin');
        return view('front.pages.product', compact('product', 'categories', 'admin'));
    }

    public function catToProudct($id)
    {
        $products   = Category::findOrFail($id)->products;
        $categories = Category::all();
        $admin       = Auth::user('admin');
        return view('front.layout', compact('products', 'categories', 'admin'));
    }

    public function letest()
    {

        $products   = Product::all()->last();
        $categories = Category::all();
        $admin       = Auth::user('admin');
        return view('front.pages.letest', compact('products', 'categories', 'admin'));
    }
}