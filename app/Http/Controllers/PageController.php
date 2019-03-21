<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Illuminate\Http\Request;


class PageController extends Controller
{
  public function index(){
    $user = Auth::user();
    if($user){
      $notifications = $user->notifications()->get();
    }

    // if(!$notifications){
    //   $notifications = No
    // }

    return view('pages/home', compact('user', 'notifications'));
  }
}
