@extends('layouts/main')
@section('title')
  Watchlist - {{$Watchlists->id}}
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10">
      <h1>{{$Watchlists->title}}</h1>
      <h6>This is where all your projects are located - <strong style="color: red">Author: {{$Watchlists->user->name}}</strong></h6>
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
                  WatchlistController - Show.
                -->
                
                @foreach ($Watchlists->properties as $WatchedProperties)
                  <div class="col-md-4">
                    <div class="box">
                      <a href="/property/{{$WatchedProperties->id}}">
                        <div style="position: relative; background: url('{{$WatchedProperties->image_url}}') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;"></div>
                      </a>
                    </div>
                    <p>{{$WatchedProperties->address .', '. $WatchedProperties->town .', '. $WatchedProperties->county}}</p>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <center>
              <a href="/watchlist/{{$Watchlists->id}}/edit" class="edit-btn">Edit</a>
              <a href="/watchlist/{{$Watchlists->id}}/delete" onclick="confirm()" class="delete-btn">Delete</a>
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
