<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenancy extends Model
{
    protected $table = 'tenancy';
    protected $fillable = ['tenant_id', 'tenant_name', 'landlord_id', 'landlord_name', 'property_address', 'accepted'];

    public function user(){
        return $this->belongsTo('App\User');
      }
}
