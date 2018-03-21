@extends('layouts/main')
@section('title')
  Rentable - Recent Adds
@endsection

@section('content')
<div class="container">
  <header class="jumbotron">
    <div class="container">
      <h1>Welcome to EasyRental</h1>
        <p>These are the most recent properties</p>
        <p><a class="btn btn-primary btn-lg" href="/property/advertise/create">Add New Property</a></p>
    </div>
  </header>

  <div class="row text-center d-flex flex-wrap">
    <div class="col-lg-12">
      <h3>Our most recent properties</h3>
      @foreach ($Advert as $property)
        <div class="col-md-4 col-sm-6">
          <div class="thumbnail">
            <img class="img-fluid" src="data:image/gif;base64,{{ $property->photo }}">
              <div class="caption">
                <h4>{{$property->address .', '. $property->town .', '. $property->county}}</h4>
              </div>
              <p><a href="/property/{{$property->id}}" class="btn btn-primary">More Info!</a></p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
