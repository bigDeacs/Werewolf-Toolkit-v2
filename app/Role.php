<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    /**
     * Get the games for the user.
     *
     * @var array
     */
     public function positions()
     {
       return $this->hasMany('App\Position');
     }
}
