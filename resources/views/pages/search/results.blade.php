@extends('layouts/main')
@section('title')
  Search Results
@endsection

@section('content')
<div class="container">
  @foreach ($properties as $property)
    <div class="card mb-md-4">
      <div class="card-header"><h5><a href="/property/{{$property->id}}">{{$property->address .', '. $property->town .', '. $property->county}}</a><h5></div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <p>Bedrooms : {{$property->bedrooms}}</p>
            </div>
            <div class="col-md-3">
              <p>Bathrooms : {{$property->bathrooms}}</p>
            </div>
            <div class="col-md-3">
              <p>Rent : €{{$property->rent}}</p>
            </div>
            <div class="col-md-3">
              {{ date_format(date_create($property->date),'d M Y') }}
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div style="position: relative; background: url('{{ $property->photo }}') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;">

                <!-- Encoding photo to add to url -->
                @php
                  $codedUrl = urlencode($property->photo);
                @endphp
                @if(count($filteredData) >= 1)
                  <!-- Ensures users only have the "add" button if they currently have a wathclist created -->
                  <a href="/watchlist/{{$property->id}}/add?image_url={{$codedUrl}}&address={{$property->address}}&town={{$property->town}}&county={{$property->county}}">
                    <div class="add-btn
                      @if(in_array($property->id, $arrayInfo))
                        active
                      @endif">
                      <i class="fa fa-check" aria-hidden="true"></i></div>
                  </a>
                @endif
              </div>
          	</div>
          </div>
          <div class="col-md-8">
            {{$property->description}}
          </div>
      </div>
    </div>
  @endforeach
</div><!-- ./Container -->
@endsection
