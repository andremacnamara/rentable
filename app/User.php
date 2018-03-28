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

    //Tennancies of this uers. User model, tenancy table.
    public function tenanciesOfMine(){
      return $this->belongsToMany('App\User', 'tenancies', 'user_id', 'tenancy_id');
    }

    //Users who have this user as a friend
    //Inverse of user tenncies -> Both users have tenancy if one exists. One user can't be in a tenancy with someone who is not in tenacy with them.
    //Like friends on FB. You can't be friends with someone, without them being friends with you also.
    public function tenancyOf(){
      return $this->belongsToMany('App\User', 'tenancies', 'tenancy_id', 'user_id');
    }

    //If a tenancy is accepted, create the tenancy ie friendship.
    public function tenancies(){
      //Getting friends of this user. Where accepted is true
      return $this->tenanciesOfMine()->wherePivot('accepted', true)->get()->
      //merge the inverse. Tennancy created with both users
        merge($this->tenancyOf()->wherePivot('accepted', true)->get());
    }

    //Request hasn't yet been accepted. Display list  of pending requests
    public function tenacyRequests(){
      return $this->tenanciesOfMine()->wherePivot('accepted', false)->get();
    }

    //Inverse of Tenancy Requests
    public function tenancyRequestsPending(){
      return $this->tenancyOf()->where('accepted', false)->get();
    }

    //If a user has a request pending from another user
    public function hasTenancyRequestsPending(User $user){
      return (bool) $this->tenancyRequestsPending()->where('id', $user->id)->count();
    }

    public function hasTenancyRequestsReceived(User $user){
      return (bool) $this->tenacyRequests()->where('id', $user->id)->count();
    }

    //Add tenancy
    public function addTenancy(User $user){
      $this->tenancyOf()->attach($user->id);
    }

    //Add tenancy
    public function acceptTenancyRequest(User $user){
      $this->tenacyRequests()->where('id', $user->id)->first()->pivot->update([
        'accepted' => true,
      ]);
    }

    public function isInTenancyWith(User $user){
      return $this->tenancies()->where('id', $user->id)->count();
    }


}
