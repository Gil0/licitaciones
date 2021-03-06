<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporation extends Model
{

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phoneNumber','address','zipCode','rfc','workArea',
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
    
    public function Personal()
    {
        return $this->hasMany('App\Personal','teams');
    }
}
