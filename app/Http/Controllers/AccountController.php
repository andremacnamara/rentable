<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyAdvert;
use App\Tenancy;
use DB;
use Auth;
use App\Watchlists;
use App\WatchedProperties;
use App\User;

class AccountController extends Controller
{
  public function index($id){
   //Authenticated different user types
   //Sends Landlord and Tenant to appropiate pages
   $user = User::where('id', $id)->first();
   $properties = PropertyAdvert::where('user_id', $id)->get();
   $property = WatchedProperties::all();
   $Watchlists = Watchlists::where('user_id', Auth::id())->get();
   $users = Auth::user();
   $Tenancy =  DB::table('tenancy')->first();
 
  return view('/pages/account/index', compact('properties', 'user', 'Watchlists', 'property', 'Watchlists', 'Tenancy'));
}

  //Renders Form
  public function create($id){
    $user = User::where('id', $id)->first();
    $properties = PropertyAdvert::where('user_id', Auth::id())->get();

    return view('/pages/account/tenancy/create', compact('user', 'properties'));
  }

  //Stores data
  public function store(Request $request, User $user){
    $properties = PropertyAdvert::where('user_id', Auth::id())->get();
    $Tenancy = Tenancy::create([
      'tenant_id' => $request->tenant_id,
      'tenant_name' => $request->tenant_name,
      'landlord_id' => $request->landlord_id,
      'landlord_name' => $request->landlord_name,
      'property_address' => $request->property_address,
    ]);

    //Redirct somewhere
  }
  
  public function accept(Request $request){
    Tenancy::where('accepted', 0)->where('request_sent', 1)
            ->update(
              [
                'accepted' => 1,
                'request_sent' => 0,
              ]
              
            );
    return back();
  }

  public function reject(Request $request){
    
  }
  


  public function show(){

  }

  public function edit(){

  }

  public function update(){

  }

  public function delete(){

  }
}
