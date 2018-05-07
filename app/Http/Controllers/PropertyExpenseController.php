<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\PropertyAdvert;
use App\PropertyExpense;
use App\User;
use App\Charts\OverallExpenseChart;

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

  public function chart(){
    $chart = new OverallExpenseChart;
      // Add the dataset (we will go with the chart template approach)
      $chart->dataset("Sample", "line", [100, 65, 84, 45, 90]);
      return view('/pages/expenses/charts', ['chart' => $chart]);
  }
  
  public function create($id){
    $property = PropertyAdvert::where('id', $id)->first();
    $categories = DB::table('expense_category')->get();
    
    return view('/pages/expenses/create', compact('property', 'categories'));
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
    $property = PropertyAdvert::where('id', $id)->first();
    $PropertyExpenses = PropertyExpense::where('property_id', $id)->get();
    return view('/pages/expenses/show', compact('PropertyExpenses', 'property'));
  }
}