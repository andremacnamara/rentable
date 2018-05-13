@extends('layouts/main')
@section('title')
  
@endsection
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default shadow">
          <div class="card-header">Preferences Report</div>
            <div class="card-body">
              <center>

                <!-- Name and County Label-->
                <div class="row">
                  <div class="col-md-6">
                    <label for="name" class="label text-muted">Patient Name</label>
                  </div>
                  <div class="col-md-6">
                    <label for="county" class="label lead">County</label>
                  </div>
                </div>
                <!-- Name and County Data-->
                <div class="row">
                  <div class="col-md-6 lead" id="name">
                    {{$user->name}}
                  </div>
                  <div class="col-md-6 text-muted" id="county">
                    {{$TenantPreferance->county}}
                  </div>
                </div>

                <!-- Rent and Type Label-->
                <div class="row mt-4">
                  <div class="col-md-6">
                    <label for="rent" class="label">Max Rent</label>
                  </div>
                  <div class="col-md-6">
                    <label for="type" class="label">Type</label>
                  </div>
                </div>

                <!-- Rent and Type Data-->
                <div class="row">
                  <div class="col-md-6 content" id="rent">
                    {{$TenantPreferance->rent}}
                  </div>
                  <div class="col-md-6 content" id="type">
                    {{$TenantPreferance->type}}
                  </div>
                </div>

                <!-- Bedrooms and Bathrooms Label-->
                <div class="row mt-4">
                  <div class="col-md-6">
                    <label for="bedroom" class="label">Min Bedrooms</label>
                  </div>
                  <div class="col-md-6">
                    <label for="bathrooms" class="label">Min Bathrooms</label>
                  </div>
                </div>
                
                <!-- Bedrooms and Bathrooms Data-->
                <div class="row">
                  <div class="col-md-6 content" id="bathrooms">
                    {{$TenantPreferance->bedrooms}}
                  </div>
                  <div class="col-md-6 content" id="bedrooms">
                    {{$TenantPreferance->bathrooms}}
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-12">
                    <a href="/account/preferance/{{$TenantPreferance->id}}/edit" class="btn btn-primary">Edit Preferences</a>
                  </div>
                  
                </div>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>       
@endsection