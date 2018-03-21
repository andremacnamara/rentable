<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlists extends Model
{
    protected $fillable = ["title", "user_id", "active"];

    //Relation between properties to be saved, and watchlist
    public function properties(){
      return $this->hasMany('App\WatchedProperties');
    }

    //Relation between user and watchlist
    public function user(){
      return $this->belongsTo('App\User');
    }
}
