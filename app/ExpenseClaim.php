<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseClaim extends Model
{
    protected $fillable = ['title', 'description', 'cost', 'receipt', 'tenant_id', 'landlord_id', 'property_address'];
}
