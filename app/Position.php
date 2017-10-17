<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'game_id', 'role_id', 'player_id', 'team_id', 'dead',
    ];

    /**
     * Get the user that owns the game.
     *
     * @var array
     */
     public function statuses()
     {
       return $this->belongsToMany('App\Status');
     }

    /**
     * Get the user that owns the game.
     *
     * @var array
     */
     public function game()
     {
       return $this->belongsTo('App\Game');
     }

     /**
      * Get the user that owns the game.
      *
      * @var array
      */
      public function role()
      {
        return $this->belongsTo('App\Role');
      }

      /**
       * Get the user that owns the game.
       *
       * @var array
       */
       public function team()
       {
         return $this->belongsTo('App\Team');
       }

       /**
        * Get the user that owns the game.
        *
        * @var array
        */
        public function player()
        {
          return $this->belongsTo('App\Player');
        }
}
