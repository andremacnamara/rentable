<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenantPreferance extends Model
{
     protected $fillable = ["county","type","rent","bedrooms","bathrooms", "user_name", "user_id"];

     public function user(){
      return $this->belongsTo('App\User');
    }

    public function property(){
      return $this->belongsTo('App\PropertyAdvert');
    }
}
