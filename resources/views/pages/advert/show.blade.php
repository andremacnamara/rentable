@extends('layouts/main')
@section('title')
  {{$Advert->address}}
@endsection
@section('content')
  <div class="container">
  
    <div class="row mb-4">
      <div class="col-md-8">

        <div class="card">
          <div class="card-header card-title text-center">
            <h5>{{$Advert->address .', '. $Advert->town .', '. $Advert->county}}</h5>
          </div>
        </div>

        <div class="card-body border border-grey">

          <div class="details-box">
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
          </div>
          
          <img src="{{$Advert->photo}}" class="img-fluid">
          
          <div class="border border-grey mt-4 mb-2 descrition">
            <div class="card-text">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="float-left ml-2">Description</h5>
                </div>
              </div>
            </div>
    
            <div class="row mx-auto mb-2">
              <div class="col-md-12">
                <p class="desc-text">{{$Advert->description}}</p>
              </div>
            </div>
          </div>
          
          <div class="text-box">
            <div class="row mx-auto mb-4">
              <div class="col-md-12">
                <a href="/property/{{$Advert->id}}/edit" class="butn btn-edit">Edit Property</a>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="col-md-4">
        <div class="card-header card-title text-center">
          Landlord Details
        </div>
        <div class="card-body border border-grey">
          <div class="row">
            <div class="col-md-12">
              <span class="text-muted">{{$user->name}}</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <span class="text-muted">{{$user->email}}</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <span class="text-muted">Member Since {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</span>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-7">
              <a href="/messages/{{$user->id}}/create" class="btn btn-message">Send Message</a>
            </div>
            <div class="col-md-5">
              <a href="/account/{{$user->id}}" class="btn btn-profile">Profile</a>
            </div>
          </div>
          
          
        </div>
      </div>
    </div>
  </div>
@endsection
