<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;

class Product extends Model
{
	/**
	 * This Attribute use to protect from mass assignment.
	 * 
	 * @var Array
	 */
	protected $fillable = [
		'name', 'desc', 'stock_quantity', 'price', 'discount_pct', 'category_id', 'image'
	];

    /***********************************************************
	 * This method return category associated with many products.
	 * 
	 * @return collection
	 */
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
