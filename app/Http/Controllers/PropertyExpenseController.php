<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\PropertyAdvert;
use App\PropertyExpense;
use App\User;

class PropertyExpenseController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(){

    $properties = PropertyAdvert::where('user_id', Auth::user()->id)->get();
    return view('/pages/expenses/index', compact('properties', 'data'));
  }

  public function create($id){
    $property = PropertyAdvert::where('id', $id)->first();
    
    return view('/pages/expenses/create', compact('property'));
  }

  public function store(Request $request){
    $PropertyExpenses = PropertyExpense::create([
      "property_id"         => $request->property_id,
      "user_id"             => Auth::user()->id,
      "expenseDescription"  => $request->description,
      "cost"                => $request->amount,
      "date"                => $request->date,
      "category"            => $request->category
    ]);  
    
    return "Expense Log";
  }

  public function show($id){
    $PropertyExpenses = PropertyExpense::where('property_id', $id)->get();
    return view('/pages/expenses/show', compact('PropertyExpenses'));

  }
}