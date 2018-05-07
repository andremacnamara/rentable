<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['landlord_name', 'landlord_id', 'tenant_name', 'tenant_id' ,'property_address' ,'overallRating' ,'landlordCommunicationRating' ,'issueResolvedSpeedRating' ,'rentMarketRate' ,'happyToContinueTenancy' ,'otherComments' ,'recommendLandlord'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }

}
