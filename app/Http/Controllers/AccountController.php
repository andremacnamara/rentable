<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyAdvert;
use App\Tenancy;
use DB;
use Auth;
use App\Watchlists;
use App\WatchedProperties;
use App\TenantPreferance;
use App\User;

class AccountController extends Controller
{

  public function index($id){
  
    $currentUser = Auth::user();
    $user = User::where('id', $id)->first();
    $properties = PropertyAdvert::where('user_id', $id)->get();
    $property = WatchedProperties::all();
    $Watchlists = Watchlists::where('user_id', Auth::id())->get();

    //Allows landlords to see their relationship with tenants, and vice versa.
    $landlordTenancies = Tenancy::all()->where('landlord_id', Auth::id());
    $tenantTenancies = Tenancy::all()->where('tenant_id', Auth::id());

    //Allows the attirbutes from the table to be access by correct landlord and tenant
    $tenancy = Tenancy::where('tenant_id', Auth::id())->first();
    $Tenancy = Tenancy::where('landlord_id', Auth::id())->first();
    
    //Sends different use types to relevant view

    return view('/pages/account/profile/index', compact('properties', 'currentUser', 'user', 'Watchlists', 'property', 'tenantTenancies', 'landlordTenancies', 'Tenancy', 'tenancy'));

    // if($user->userType == "Landlord"){
    //   return view('/pages/account/landlord', compact('properties', 'user', 'Watchlists', 'property', 'landlordTenancies', 'Tenancy'));
    // }
    
    // else{
    //   return view('/pages/account/tenant', compact('properties', 'user', 'Watchlists', 'property', 'tenantTenancies', 'tenancy'));
    // }
  }

  //Renders Form
  public function create($id){
    $user = User::where('id', $id)->first();
    $properties = PropertyAdvert::all()->where('user_id', Auth::id());
    $tenancy = new Tenancy;

    return view('/pages/account/tenancy/create', compact('user', 'properties', 'tenancy'));
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

    
    return redirect("/account/$user->id");
  }
  
  // public function accept(Request $request, $id){
  //   Tenancy::where('accepted', 0)->where('request_sent', 1)->where('tenant_id', Auth::id())->where('landlord_id', $id)
  //           ->update(
  //             [
  //               'accepted' => 1,
  //               'request_sent' => 0,
  //             ]
              
  //           );
  //   return back();
  // }

  public function accept(Request $request, string $id)
  {
      Tenancy::find($id)
          ->update([
              'accepted' => 1,
              'request_sent' => 0,
          ]);
  
      return back();
  }


  public function reject(Request $request){
    Tenancy::where('accepted', 0)->where('request_sent', 1)->where('tenant_id', Auth::id())
            ->update(
              [
                'accepted' => 0,
                'request_sent' => 0,
              ]
            );
    return back();
  }
  
  public function end(Request $request){
    Tenancy::where('accepted', 1)->update(
      [
        'accepted' => 0,
      ]
    );
    return back();
  }

  public function searchhome(){
      //Search Filter UI
      //Populates fields.
      $user = Auth::user();
      $properties = PropertyAdvert::where('user_id', Auth::id())->get();
      return view('pages/account/search/index', compact('user', 'properties'));
  }

  public function searchresults(Request $request){
    
    //Gets all users that are tenants
    $tenants = User::where('userType', 'tenant')->first();
    
    //Gets all preferances
    $Prefereances = TenantPreferance::all()->first();
    //Gets the prefereances that match a tenant id
    $pref = $Prefereances::where('user_id', $tenants->id)->first();

    //Gets the current signed in users property
    $selectedPropertyId = $request->property_address;

    $property = PropertyAdvert::where('id', $selectedPropertyId)->first();
    

    $result = $pref
              ->where('county' , $property->county)
              ->where('type' , $property->type)
              ->where('rent', '<=', $property->rent)
              ->where('bedrooms', '<=', $property->bedrooms)
              ->where('bathrooms', '<=', $property->bathrooms);

    $users = $result->get();
    
    return view('pages/account/search/results', compact('users'));
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
