<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class PageController extends Controller
{
  public function index(){
    $user = Auth::user();
    return view('pages/home', compact('user'));
  }

}
