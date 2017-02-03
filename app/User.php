<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Address;

class User extends Authenticatable
{
    protected $table = 'users'; 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * This method check if the registered user is admin.
     * 
     * @return boolean 
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * This method return all orders associated with user.
     * 
     * @return collection
     */
    public function address()
    {
        return $this->hasMany('App\Address');
    }
}
