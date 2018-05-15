<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyAdvert extends Model
{
     protected $fillable = ["photo", "address", "county", "town","type","rent","date","bedrooms","bathrooms","furnished","description", "user_id"];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function preferances(){
      return $this->hasMany('App\TenantPreferance');
    }

    public function expenses(){
      return $this->hasMany('App\PropertyExpense');
    }

    public function name(){
      return "Fallout 4";
    }
}

