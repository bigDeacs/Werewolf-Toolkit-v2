<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'wins', 'losses',
    ];

    /**
     * Get the user that owns the game.
     *
     * @var array
     */
     public function games()
     {
       return $this->belongsToMany('App\Games');
     }
}
