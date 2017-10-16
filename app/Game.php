<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'moderator', 'user_id', 'complete',
    ];

    /**
     * Get the user that owns the game.
     *
     * @var array
     */
     public function user()
     {
       return $this->belongsTo('App\User');
     }
}
