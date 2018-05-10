<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\ExpenseClaim;
use App\Tenancy;
use App\User;

class ExpenseClaimerController extends Controller
{
 
    public function index(){
        //Retirevess all exxpenses logged by tenant, and for the property owned by a tenant.
        $expenseClaim = ExpenseClaim::where('tenant_id', Auth::user()->id)->orWhere('landlord_id', Auth::user()->id)->get();
        return view('/pages/expenseClaim/index', compact('expenseClaim'));
    }

    public function create(){
        $tenancy = Tenancy::where('tenant_id', Auth::user()->id)->get();
        
        return view('/pages/expenseClaim/create', compact('tenancy'));
    }

    public function store(Request $request){

        $this->validate($request, [
            "title" => "required",
            "description" => "required",
            "cost" => "required",
            "receipt" => "required",
            "property_address" => "required",
          ]);
        
        $ExpenseClaim = ExpenseClaim::create([
            'title' => $request->title,
            'description' => $request->description,
            'cost' => $request->cost,
            'receipt' => $request->receipt,
            'tenant_id' => $request->tenant_id,
            'landlord_id' => $request->landlord_id,	
            'property_address' => $request->property_address,
        ]);

        return redirect("/");
    }

    public function show($id){
        $expenseClaim = ExpenseClaim::where('id', $id)->first();
        return view('/pages/expenseClaim/show', compact('expenseClaim'));
    }

    public function edit($id){
        //Similar to create
        //Form with prepopulated data
      
        $expenseClaim = ExpenseClaim::where('id', $id)->where('tenant_id', Auth::id())->first();
        $tenancy = Tenancy::where('tenant_id', Auth::user()->id)->get();
        return view ('pages/expenseClaim/edit', compact('expenseClaim', 'tenancy'));
      }
  
      public function update(Request $request, $id){
        //Similar to Stores
        //Posts updated data

        $this->validate($request, [
            "title" => "required",
            "description" => "required",
            "cost" => "required",
            "receipt" => "required",
            "property_address" => "required",
          ]);
          
        ExpenseClaim::where('id', $id)->where('tenant_id', Auth::id())->update([
            'title' => $request->title,
            'description' => $request->description,
            'cost' => $request->cost,
            'receipt' => $request->receipt,
        ]);
        return redirect("/expenseclaim/show/$id");
      }

    public function approve($id){
        $expenseClaim = ExpenseClaim::where('id', $id)->first();
        return view('/pages/expenseClaim/approve', compact('expenseClaim'));
    }

    public function changeStatus(Request $request, $id){
        $ExpenseClaim = ExpenseClaim::where('id', $id)->where('landlord_id', Auth::id())->update([
            "approved" => $request->approved
        ]);

        return redirect("/expenseclaim/home");
    }
}