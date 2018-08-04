<?php

namespace App;

use App\PropertyAdvert;

use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasRoles,
        Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

    public function preferances(){
        return $this->hasOne('App\TenantPreferance');
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

    public function feedback(){
        return $this->hasMany('App\Feedback');
    }
}
