@extends('layouts/main')
@section('title')
  Watchlist - {{$Watchlists->id}}
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10">
      <p class="lead font-weight-bold text-center">{{$Watchlists->title}} Watchlist</p>
      <p class="text-center">
        <a href="/watchlist/{{$Watchlists->id}}/edit" class="btn btn-info">Edit</a>
        <a href="/watchlist/{{$Watchlists->id}}/delete" onclick="confirm()" class="btn btn-danger">Delete</a>
      </p>
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
                @foreach ($Watchlists->properties as $WatchedProperties)
                  <div class="col-md-4">
                    <div class="box">
                      <a href="/property/{{$WatchedProperties->id}}">
                        <img class="list-image" src="{{$WatchedProperties->image_url}}">
                      </a>
                    </div>
                    <p class="lead mt-2">{{$WatchedProperties->address .', '. $WatchedProperties->town .', '. $WatchedProperties->county}}</p>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-md-3">

        </div>
      </div>
    </div>
  </div>
@endsection
