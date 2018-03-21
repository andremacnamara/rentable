<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WatchedProperties;
use App\Watchlists;
use Auth;

class WatchedPropertiesController extends Controller
{
  public function create(Request $request, $image_info){
  //Adds ad data to the active watchlist
  $Watchlist = Watchlists::where('user_id', Auth::id())->where('active', 1)->first();

  if($Watchlist == null){
    return redirect('watchlist/create');
  } else {
    $saveData = [
      "image_info" => $image_info,
      "image_url" => $request->image_url,
      "watchlists_id" => $Watchlist->id,
      "address" => $request->address,
      "town" => $request->town,
      "county" => $request->county,
    ];

    $inspiration = WatchedProperties::create($saveData);

    return back();
  }

}

public function destroy($image_info){
  $WatchedProperties = WatchedProperties::where('image_info', $image_info)->delete();

  return back();
}
}
