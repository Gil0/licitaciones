<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cost'
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
    public function Announcement(){
        return $this->belongsTo('App\announcement');
    }
}
