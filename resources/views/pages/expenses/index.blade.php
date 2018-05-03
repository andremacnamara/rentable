@extends('layouts/main')
@section('title')
  Expenses
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <span class="h3">Property Expenses Logger</span>
      </div>
    </div>
    @foreach($properties as $property)
      <div class="col-md-4 mt-4">
        <a href="/expenses/{{$property->id}}/create">
          <img class="img-fluid" src="{{$property->photo}}">
        </a>
        <p class="mt-2">{{$property->address .', '. $property->town .', '. $property->county}}</p>
      </div>
    @endforeach
  </div>
@endsection
