@extends('layouts/main')
@section('title')
  Rentable - Recent Adds
@endsection

@section('content')
{{-- <div class="container">
  <header class="jumbotron">
    <div class="container">
    </div>
  </header>

  <div class="row text-center d-flex flex-wrap">
    <div class="col-lg-12">
      <h3>Your Tenant Profile</h3>
    </div> <!-- ./col 12 -->
  </div> <!-- ./row -->
</div> <!-- ./container --> --}}
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10">

    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-md-10">
            <div class="img-section">
              <div class="row">
                <!--
                  Getting all properties in a specific watchlists
                  WatchlistController - Show
                -->
                @foreach ($user->WatchedProperties as $WatchedProperties)
                  <div class="col-md-4">
                    <div class="box">
                      <a href="/property/{{$WatchedProperties->image_info}}">
                        <img class="list-image" src="{{$WatchedProperties->image_url}}">
                      </a>
                    </div>
                    <h4>{{$WatchedProperties->address}}</h4>

                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <center>
              {{-- <a href="/watchlist/{{$Watchlists}}/edit" class="edit-btn">Edit</a>
              <a href="/watchlist/{{$Watchlists}}/delete" onclick="confirm()" class="delete-btn">Delete</a> --}}
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@endsection
