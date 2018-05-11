@extends('layouts/main')
@section('title')
  Search for a property
@endsection

@section('content')
  @if ($errors->any())
    <div class="row mx-auto text-center">
      <div class="col-md-12">
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
      </div>
    </div>
@endif

<div class="container">
  <div class="card">
    <form method="GET" action="/user/search/results">
      {{ csrf_field() }}
      <div class="card-header">Search for a Tenant</div>
        <div class="card-body">
          <center>
            <div class="row">
              <div class="col-md-10">
                <select class="form-control" id="property_address" name="property_address">
                  <!--Gets all counties from DB -->
                    @foreach ($properties as $property)
                      <option value="{{$property->id}}">{{$property->address . ', ' . $property->town . ', ' . $property->county}}</option>
                    @endforeach
                </select>
              </div> <!-- ./ col-6-->
            </div> <!-- ./ row-5  -->
         
            <div class="row mt-md-4">
                <div class="col-md-4">
                    <button type="submit" name="search" value="search" class="form-control btn btn-primary">
                        Search
                    </button>
                </div>
            </div>
            </center>
          </div> <!-- ./Card Body -->
      </form>
    </div><!-- ./Card -->
  </div><!-- ./Container -->

@endsection