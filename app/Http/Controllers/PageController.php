<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

use Illuminate\Http\Request;


class PageController extends Controller
{
  public function index(){
    $user = Auth::user();
    $notifications = $user->notifications()->get();
    return view('pages/home', compact('user', 'notifications'));
  }

}
