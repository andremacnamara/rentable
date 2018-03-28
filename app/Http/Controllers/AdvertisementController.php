<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\PropertyAdvert;
use App\PropertyAdvertPhoto;
use DB;
use App\User;
use Auth;

class AdvertisementController extends Controller
{

    public function index(){
      //Returns index page.
      //Options
      $user = Auth::user();
      $Advert = PropertyAdvert::get();
      return view('pages/advert/index', compact('Advert', 'user'));
    }

    public function create(){
      //Create Form
      //Populates different options
      $county = DB::table('county')->get();
      $types  = DB::table('property_type')->get();
      $specs  = DB::table('property_specs')->get();
      $user = Auth::user();

      //Only allows landlords to post
      if($user->userType != "Landlord"){
          return view('pages/advert/accesserror', compact('user'));
      }
      else {
        return view('pages/advert/create', compact('user', 'county', 'types', 'specs'));
      }
    }

    public function store(Request $request){
      //Stores data from form
      $Advert = PropertyAdvert::create([
          "photo"       => $request->photo,
          "address"     => $request->address,
          "county"      => $request->county,
          "town"        => $request->town,
          "type"        => $request->type,
          "rent"        => $request->rent,
          "date"        => $request->date,
          "bedrooms"    => $request->bedrooms,
          "bathrooms"   => $request->bathrooms,
          "furnished"   => $request->furnished,
          "description" => $request->description,
          "user_id" => Auth::id(),
      ]);
      //Gets the advertid for redirect to show page
      $id = $Advert->id;

    return redirect("/property/$id");
  }

    public function show($id){
      //Shows add user clicked on based on id
      $user = User::where('id', $id)->first();
      $Advert = PropertyAdvert::where('id', $id)->first();
      return view('pages/advert/show', compact('Advert', 'user'));
      //dd($Advert)
    }

    public function edit($id){
      //Similar to create
      //Form with prepopulated data
      $user = Auth::user();

      $types    = DB::table('property_type')->get();
      $specs    = DB::table('property_specs')->get();
      $counties = DB::table('county')->get();
      $towns    = DB::table('town')->get();
      $Advert = PropertyAdvert::where('id', $id)->first();

      return view ('pages/advert/edit', compact('Advert', 'user', 'types', 'specs', 'counties', 'towns'));
    }

    public function update(Request $request, $id){
      //Similar to Stores
      //Posts updated data
      PropertyAdvert::where('id', $id)->where('user_id', Auth::id())->update([
          "photo"       => $request->photo,
          "address"     => $request->address,
          "county"      => $request->county,
          "town"        => $request->town,
          "type"        => $request->type,
          "rent"        => $request->rent,
          "date"        => $request->date,
          "bedrooms"    => $request->bedrooms,
          "bathrooms"   => $request->bathrooms,
          "furnished"   => $request->furnished,
          "description" => $request->description,
          "user_id" => Auth::id(),
      ]);
      return redirect("/property/$id");
    }

    public function archive(){
      return "Advert has been archived";
    }


    public function townload(Request $request){
      //Typehead function.
      //Route => Route::get('/townsearch', 'AdvertisementController@townload');
      //
    	$data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("town")
            		->select("id","name")
            		->where('name','LIKE',"%".$search."%")
            		->get();
        }
        return response()->json($data);
    }
}
