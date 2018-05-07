<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyExpense extends Model
{
    protected $fillable = ['property_id', 'user_id', 'expenseDescription', 'cost', 'date', 'category'];

    public function property(){
        return $this->belongsTo('App\PropertyAdverts');
    }
}
