<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\PropertyAdvert;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'userType'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //landlord has many properties
    public function properties(){
      return $this->hasMany('App\PropertyAdvert');
    }

    //User has many lists
    public function watchlist(){
      return $this->hasMany('App\Watchlist');
    }

    //User has many WatchedProperties throuhhg watchlist
    public function WatchedProperties(){
        return $this->hasManyThrough('App\WatchedProperties', 'App\Watchlists');
    }

    public function tenancy(){
      return $this->hasMany('App\Tenancy');
    }

}
