<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyAdvert;
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
   $tenancies = $users->tenancies();
   $tenancyRequests = $users->tenacyRequests();

  return view('/pages/account/index', compact('properties', 'user', 'Watchlists', 'property', 'tenancyRequests', 'tenancies', 'Watchlists'));

}


  public function getAdd($id){
    $user = User::where('id', $id)->first();

    //If the user can be found
    if(!$user){
      return redirect('/')->with(['status', 'Profile Not Found']);
    }

    if(Auth::user()->id === $user->id){
        return redirect()->route('home');
    }

    //If current sign in user has request pending with the users
    //If the uer has a request pending with auth user
    if (Auth::user()->hasTenancyRequestsPending($user) ||
        $user->hasTenancyRequestsPending(Auth::user())){
          return redirect('/account/{{$user->id}}')->with('status', "Friend request already pending");
      }

    //Check if tenancy already exists
    if(Auth::user()->isInTenancyWith($user)){
      return redirect('/account/{{$user->id}}')->with('status', "Already i a tenancy");
    }

    //After passing all checks. Add other account
    //Landord is adding the tenant
    Auth::user()->addTenancy($user);

    return redirect('/account/{{$user->id}}')->with('status', "Request Sent");
  }





  public function getAccept($id){
    $user = User::where('id', $id)->first();

    if(!$user){
      return redirect('/')->with(['status', 'Profile Not Found']);
    }

    if(!Auth::user()->hasTenancyRequestsReceived($user)){
      return redirect('/');
    }

    Auth::user()->acceptTenancyRequest($user);

    return redirect('/account/{{$user->id}}')->with('status', "Request request accepted");
  }

  //Create a Tenancy.
  //Loads create form
  public function tenancyIndex($id){
    $user = User::where('id', $id)->first();
    $properties = PropertyAdvert::where('user_id', Auth::id())->get();

    return view('/pages/account/tenancy/create', compact('user', 'properties'));
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
