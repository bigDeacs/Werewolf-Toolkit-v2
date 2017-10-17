<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'role_id',
    ];

    /**
     * Get the user that owns the game.
     *
     * @var array
     */
     public function positions()
     {
       return $this->belongsToMany('App\Position');
     }

}
