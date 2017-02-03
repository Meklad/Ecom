<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;

class CategoriesController extends Controller
{
    /**
     * Display a all catagories in table with some operations like edit and delete.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return to the view categories index.
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created category in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('category.index');
    }

    /**
     * Display the specified category associated with products that belongs to it this category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Category::findOrFail($id)->products;
        $categories = Category::all();
        return view('admin.category.index', compact(['categories', 'products']));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified category in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // specified category with id.
        $category = Category::findOrFail($id);

        // store the upcoming value from the form.
        $category->name = $request->name;

        // save the values to database.
        $category->save();

        // redirect the admin to the view [show all categories].
        return redirect()->route('category.index');
    }

    /**
     * Delete the specified category from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find a category with the given id.
        $category = Category::findOrFail($id);

        // Delete all products associated with category.
        $category->products()->delete();

        // Delete the category.
        $category->delete();

        // return back to categories index page.
        return back();
    }
}
