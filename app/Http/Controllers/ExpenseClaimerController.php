<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\ExpenseClaimer;
use App\Tenancy;
use App\User;

class ExpenseClaimerController extends Controller
{
 
    public function index(){

        return view('/pages/expenseClaim/index');
    }

    public function create(){
        $tenancy = Tenancy::where('tenant_id', Auth::user()->id)->get();
        
        return view('/pages/expenseClaim/create', compact('tenancy'));
    }
}