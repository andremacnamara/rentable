@extends('layouts/main')
@section('title')
  Create a Tenancy
@endsection

@section('content')
<div class="container">
  <h1>Create Tenancy</h1>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-md-10">
            <form action="/account/tenancy/{{$user->id}}" method="POST">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                  <label for="property_address">Property Address</label>
                </div> <!-- ./col6 -->
              </div> <!-- ./ row-6 -->
              <div class="row">
                <div class="col-md-10">
                  <select class="form-control" id="property_address" name="property_address">
                    <!--Gets all counties from DB -->
                    @if(!empty($properties))
                      @foreach ($properties as $property)
                        <option value="{{$property->address . ', ' . $property->town . ', ' . $property->county}}">{{$property->address . ', ' . $property->town . ', ' . $property->county}}</option>
                      @endforeach
                    @endif
                  </select>
                </div> <!-- ./ col-6-->
              </div> <!-- ./ row-5  -->
              <div class="row mt-2">
                <div class="col-md-6">
                  <label for="landlord_name">Landlord Name</label>
                </div> <!-- ./col=6 -->
              </div> <!-- ./ row-4-->
              <div class="row">
                <div class="col-md-6">
                  <select class="form-control" name="landlord_name">
                    <option value="{{Auth::user()->name}}">{{Auth::user()->name}}</option>
                  </select>
                </div> <!-- ./ row 3-->
              </div> <!-- ./col-3 -->
              <div class="row mt-2">
                <div class="col-md-6">
                  <label for="tenand_name">Tenant Name</label>
                </div> <!-- ./col=6 -->
              </div> <!-- ./ row-4-->
              <div class="row">
                <div class="col-md-6">
                  <select class="form-control" name="tenant_name">
                    <option value="{{$user->name}}">{{$user->name}}</option>
                  </select>
                </div> <!-- ./ row 3-->
              </div> <!-- ./col-3 -->


              <div class="row mt-2">
                <div class="col-md-6">
                  <label for="landlord_id">Landlord id</label>
                </div> <!-- ./col=6 -->
              </div> <!-- ./ row-4-->
              <div class="row">
                <div class="col-md-6">
                  <select class="form-control" name="landlord_id">
                    <option value="{{Auth::user()->id}}">{{Auth::user()->id}}</option>
                  </select>
                </div> <!-- ./ row 3-->
              </div> <!-- ./col-3 -->

               <div class="row mt-2">
                <div class="col-md-6">
                  <label for="tenant_id">Tenant Id</label>
                </div> <!-- ./col=6 -->
              </div> <!-- ./ row-4-->
              <div class="row">
                <div class="col-md-6">
                  <select class="form-control" name="tenant_id">
                    <option value="{{$user->id}}">{{$user->id}}</option>
                  </select>
                </div> <!-- ./ row 3-->
              </div> <!-- ./col-3 -->

              <button class="mt-2 btn btn-primary" type="submit">Create Tenancy</button>
            </form> <!-- ./form -->
          </div> <!-- ./col-10 -->
        </div> <!-- ./ row 2 -->
      </div> <!-- ./ box -->
    </div> <!-- ./ col-12 -->
  </div> <!-- ./ row 1-->
</div> <!-- ./ container -->
@endsection
