<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

class Category extends Model
{
	/**
	 * This Attribute use to protect from mass assignment.
	 * 
	 * @var Array
	 */
	protected $fillable = ['name', 'max_discount_pct'];

	/***********************************************************
	 * This method return all products associated with category.
	 * 
	 * @return collection
	 */
    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
