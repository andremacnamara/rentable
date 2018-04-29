<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenancy extends Model
{
    protected $table = 'tenancy';
    protected $fillable = ['tenant_id', 'tenant_name', 'landlord_id', 'landlord_name', 'property_address', 'accepted'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //Helper method to clean up Tenancy/index
    public function notInTenancy()
    {
        return $this->accepted == 0 && $this->request_sent == 0;
    }
  
    public function hasRequestPending()
    {
        return $this->accepted == 0 && $this->request_sent == 1;
    }

  
    public function inTenancy()
    {
        return $this->accepted == 1 && $this->request_sent == 0;
    }
}
