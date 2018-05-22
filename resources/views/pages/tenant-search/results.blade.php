@extends('layouts/main')
@section('title')
  Search Results
@endsection

@section('content')
<div class="container">
  @foreach ($users as $user)
    <div class="card mb-md-4">
      <div class="card-header"><h5><a href="/account/{{$user->user_id}}">{{$user->user_name}}</a><h5></div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <p>ID : {{$user->id}}</p>
              <p>Name: {{$user->county}}</p>
              <p>Property Type : {{$user->type}}</p>
              <p>Rent : {{$user->rent}}</p>
              <p>Bedrooms : {{$user->bedrooms}}</p>
              <p>Bathrooms : {{$user->bathrooms}}</p>
            </div>
          </div>
        </div>
      </div>
  @endforeach
</div><!-- ./Container -->
@endsection
