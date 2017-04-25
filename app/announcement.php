<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class announcement extends Model
{
    
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category', 'duration','budget','description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /**
    *		Relations
    **/

    public function User()
    {
    	return $this->belongsTo('App\User');
    }
}
