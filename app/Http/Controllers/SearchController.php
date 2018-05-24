<?php

namespace App\Http\Controllers;
use App\PropertyAdvert;
use Auth;
use DB;
use App\Watchlists;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
      //Search Filter UI
      //Populates fields.
      $user = Auth::user();
      $county = DB::table('county')->get();
      $types  = DB::table('property_type')->get();
      $towns = DB::table('town')->get();
      $specs  = DB::table('property_specs')->get();
      return view('pages/search/index', compact('user', 'county', 'towns', 'types', 'specs'));
    }

    public function search(Request $request){
      //Search Filter Logic

      //Validation

      $this->validate($request, [
        "county" => "required",
        "town" => "required",
        "type" => "required",
        "min-bedrooms" => "required",
        "max-bedrooms" => "required",
        "min-bathrooms" => "required",
        "max-bathrooms" => "required",
        "min-rent" => "required|max:4",
        "max-rent" => "required|max:4",
      ]);

      $user = Auth::user();
      $query = PropertyAdvert::query();
      $options = [];

      //Fills options array with county, town and yupe
      if ($request->has('county')) {
          $options['county'] = $request->input('county');
      }

      if ($request->has('town')) {
          $options['town'] = $request->input('town');
      }

      if($request->has('type')){
        $options['type'] = $request->input('type');
      }

      //Preforms query on options array
      if ($options) {
          $query->where($options);
      }

      //Bedrooms
      /*
      *  Checks Min
      *  Checks Max
      *  Results in min -> Max and in between being returned
      *  For Bed, Bath and Rent
      */

      if ($request->has('min-bedrooms')) {
          if ($request->has('max-bedrooms')) {
              $query->whereBetween('bedrooms', [
                  $request->input('min-bedrooms'),
                  $request->input('max-bedrooms')
              ]);
          } else {
              $query->where('bedrooms', '>', $request->input('min-bedrooms'));
          }
      } elseif ($request->has('max-bedrooms')) {
          $query->where('bedrooms', '<', $request->input('max-bedrooms'));
      }

      //Bathrooms
      if ($request->has('min-bathrooms')) {
          if ($request->has('max-bathrooms')) {
              $query->whereBetween('bathrooms', [
                  $request->input('min-bathrooms'),
                  $request->input('max-bathrooms')
              ]);
          } else {
              $query->where('bathrooms', '>', $request->input('min-bathrooms'));
          }
      } elseif ($request->has('max-bathrooms')) {
          $query->where('bathrooms', '<', $request->input('max-bathrooms'));
      }

      //Rent
      if ($request->has('min-rent')) {
          if ($request->has('max-rent')) {
              $query->whereBetween('rent', [
                  $request->input('min-rent'),
                  $request->input('max-rent')
              ]);
          } else {
              $query->where('rent', '>', $request->input('min-rent'));
          }
      } elseif ($request->has('max-rent')) {
          $query->where('rent', '<', $request->input('max-rent'));
      }

      $properties = $query->get(); //Gets all


      //Wathlists Logic
      $inspirationsArray = Watchlists::where('user_id', Auth::id())->where('active', 1)->first();
      $filteredData = $inspirationsArray;
      if(count($inspirationsArray) >= 1) {
        $inspirationsArray = $inspirationsArray->properties;
        $arrayInfo = [];
        foreach($inspirationsArray as $image) {
          array_push($arrayInfo, $image->image_info) ;
        }
      }
      return view('pages/search/results', compact('properties', 'user', 'arrayInfo', 'filteredData'));
  }
}
