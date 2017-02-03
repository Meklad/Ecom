<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Address extends Model
{
    protected $fillable = ['addressline', 'city', 'state', 'zip', 'country', 'phone'];

    /**
     * This method return user associated with many orders.
     * 
     * @return collection
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
