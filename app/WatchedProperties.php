<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchedProperties extends Model
{
  protected $fillable = ["image_url", "image_info", "watchlists_id", "address", "town", "county"];

  //Relation between properties to be saved, and watchlist
  public function watchlist(){
    return $this->belongsTo('App\Watchlist');
  }
}
