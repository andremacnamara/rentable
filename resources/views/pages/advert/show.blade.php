@extends('layouts/main')
@section('title')
  {{$Advert->address}}
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card mb-4">
        <div class="card-header card-title text-center col-md-12">
          <h4>{{$Advert->address .', '. $Advert->town .', '. $Advert->county}}</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <p class="font-weight-bold">€{{$Advert->rent}} Per Month</p>
            </div>
            <div class="col-md-6">
              <p>Bed: {{$Advert->bedrooms . ' ' . 'Bath: ' . $Advert->bathrooms}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p class="">Avaliable From: {{$Advert->date}}</p>
            </div>
            <div class="col-md-6">
              @if ($Advert->furnished == "option1")
                <p>Furnished: Yes</p>
              @else
                <p>Furnished: No</p>
              @endif
            </div>
          </div>
          <img src="{{$Advert->photo}}" class="card-img-top">
          <div class="card-text">
            <div class="row">
              <div class="col-md-12">
                <h5 class="float-left ml-3">Description</h5>
              </div>
            </div>
            <div class="row mx-auto">
              <div class="col-md-12">
                <p class="desc-text">{{$Advert->description}}</p>
              </div>
            </div>
          </div>
          <div class="card-footer text-muted">
            <a href="/property/{{$Advert->id}}/edit" class="btn btn-primary">Edit Property</a>
            <a href="/property/{{$Advert->id}}/archive" class="btn btn-info">Archive Property</a>
          </div>
    </div>
  </div>
</div>
@endsection
