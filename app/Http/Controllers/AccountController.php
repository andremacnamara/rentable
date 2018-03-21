<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyAdvert;
use DB;
use Auth;
use App\Watchlists;
use App\WatchedProperties;

class AccountController extends Controller
{
  public function index(){
   //Authenticated different user types
   //Sends Landlord and Tenant to appropiate pages

   $user = Auth::user();
   $properties = PropertyAdvert::where('user_id', Auth::id())->get();
   $property = WatchedProperties::all();
   $user_id = Auth::id();

   if($user->userType != "Landlord"){
     return view('/pages/account/tenant/index', compact('properties', 'user', 'Watchlists', 'property'));
   }
   else {
     return view('/pages/account/landlord/index', compact('properties', 'user'));
   }
}

  public function create(){

  }

  public function store(){

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
