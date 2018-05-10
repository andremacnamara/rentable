<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\PropertyAdvert;

class ChartsController extends Controller
{

    public function AggregatedPropertyOverview(){
            $user = Auth::user()->id;
            $result = DB::table('property_expenses')
                        ->where('user_id', $user)
                        ->get();
            return response()->json($result);
        }

    public function uniquePropertyOverview($id){
        $result = DB::table('property_expenses')
                    ->where('property_id', $id)
                    ->get();
            return response()->json($result);
    }
}