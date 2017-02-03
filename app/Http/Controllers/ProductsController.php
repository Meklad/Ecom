<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display all products in admin section.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created product in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // This object requests for all inputs except for the image:
        $formInput = $request->except('image');

        // Handling Discount:
        $category = category::findOrFail($request->category_id);
        if ($request->discount_pct > $category->max_discount_pct) {
            return back()->with(\Session::flash('flash_message', "Discount Pct Must Be less than or Equl %$category->max_discount_pct"));
        }

        // Validation Rules:
        $this->validate($request, [
            'name'          => 'required|min:6',
            'desc'          => 'required|min:6',
            'price'         => 'required',
            'stock_quantity'=> 'required',
            'category_id'   => 'required',
            'image'         => 'required|image|mimes:jpeg,png,jpg|max:10000',
        ]);

        // Handling image upload:
        $image = $request->image;
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image'] = $imageName;
        }

        // Store all inputs:
        Product::create($formInput);

        // Redirect To Main Dashbord:
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Not Used ...
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return to the view specified product.
        $product    = Product::findOrFail($id);

        // return to the view all categories.
        $categories = Category::pluck('name', 'id');

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $formInput)
    {
        // specified product with id:
        $product = Product::findOrFail($formInput);

        // This object requests for all inputs except for the image:
        $formInput = $request->except('image');

        // Handling Discount:
        $category = category::findOrFail($request->category_id);
        if ($request->discount_pct > $category->max_discount_pct) {
            return back()->with(\Session::flash('flash_message', "Discount Pct Must Be less than or Equl %$category->max_discount_pct"));
        }

        // Validation Rules:
        $this->validate($request, [
            'name'          => 'min:6',
            'desc'          => 'min:6',
            'image'         => 'image|mimes:jpeg,png,jpg|max:10000',
        ]);

        // Handling image upload:
        $image = $request->image;
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image'] = $imageName;

            // Delete Old Image:
            $oldImageName = $product->image;
            Storage::delete($oldImageName);
        }

        // Store all inputs:
        $product->update($formInput);

        // Redirect To Main Dashbord:
        return redirect()->route('product.index');
    }

    /**
     * Delete the specified product from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // specified product with id:
        $product = Product::findOrFail($id);

        // delete the product
        $product->delete();

        // return back to [show all products] view.
        return back();
    }
}
