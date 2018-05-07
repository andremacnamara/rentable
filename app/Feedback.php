<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['landlord_name', 'landlord_id', 'tenant_name', 'tenant_id' ,'property_address' ,'overall_rating' ,'landlord_communication_rating' ,'issue_resolved_speed_rating' ,'rent_market_rate' ,'happy_to_continue_tenancy' ,'other_comments' ,'recommend_landlord'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }

}
