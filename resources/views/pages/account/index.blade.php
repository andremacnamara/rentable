@extends('layouts/main')
@section('title')
  Rentable - Recent Adds
@endsection

@section('content')
<div class="container">

  @if($user->userType != "Landlord")
    <div class="row">
    <a href="/account/tenancy/{{$user->id}}/create" class="btn btn-primary">Start Tenancy</a>
    </div>
    <div class="row mt-4">
      <div class="col-md-9">
        <span class="text-lead text-center">Your watched properties</span>
        <hr>
        <div class="row py-2">
          @foreach ($user->WatchedProperties as $WatchedProperties)
            <div class="col-md-4 mb-4">
              <a href="/property/{{$WatchedProperties->image_info}}">
                <img class="list-image img-fluid" src="{{$WatchedProperties->image_url}}">
              </a>
              <p class="mt-2">{{$WatchedProperties->address .', '. $WatchedProperties->town .', '. $WatchedProperties->county}}</p>
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-md-3 spacing">
        <table class="table">
          <tbody>
            <!--
              Looping thorugh all watchlists.
              Watchlist controller Index
            -->
            <a href="#" class="link-sub-title">Property Preferences</a>
            <p class="text-sub-title">Your Watchlists</p>
            @foreach ($Watchlists as $Watchlist)
              <tr>
                  <td>
                    <a href="/watchlist/{{$Watchlist->id}}">
                      {{$Watchlist->title}}
                    </a>
                  </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @else
   
    <header class="jumbotron">
      <div class="container">
        <h1>Welcome to EasyRental</h1>
          <p>These are the most recent properties</p>
          <p>
            <a class="btn btn-primary btn-lg" href="/property/advertise/create">Add New Property</a>
          </p>
          <p>
            <a class="btn btn-primary btn-lg" href="/watchlist">Watch List</a>
          </p>
      </div> <!--container-->
    </header>

    <div class="row text-center d-flex flex-wrap">
      <div class="col-lg-12">
        <h3>Your Active Adverts</h3>
          <div class="row py-2">
            @foreach ($properties as $property)
              <div class="col-md-4 mb-4">
                <a href="/property/{{$property->id}}">
                  <img class="list-image img-fluid" src="{{$property->photo}}">
                </a>
                <p class="mt-2">{{$property->address .', '. $property->town .', '. $property->county}}</p>
              </div>
            @endforeach
          </div>
      </div> <!-- ./col 12 -->
    </div>  <!-- ./row -->
  @endif

</div>

@endsection
