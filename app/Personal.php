<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'area','phoneNumber','address','rfc','zipCode'
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
    *		Relations
    **/

    public function User()
    {
    	return $this->belongsTo('App\User');
    }
    
    public function Corporation()
    {
        return $this->belongsToMany('App\Corporation','teams');
    }
}
