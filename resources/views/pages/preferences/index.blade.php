@extends('layouts/main')
@section('title')
  Preferences
@endsection

@section('content')

  <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <span>The preferences page is where you specify your're desired property specs</span>
      </div>
    </div>

    @if($user->userType == "Tenant")
      @if(!empty($recievedMessages)) 
        @if($tenantPreferance->user_id == Auth::user()->id)
          <div class="row text-center">
            <div class="col-md-12">      
              <a href="/account/preferance/{{$tenantPreferance->id}}/edit" class="btn btn-button">Edit Preferences</a>
            </div>
          </div>
        @endif
      @endif

      <div class="row text-center">
          <div class="col-md-12">
              <a href="/account/preferance/create" class="btn btn-button">Set Preferences</a>
          </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th></th>
                <th>Type</th>
                <th>Rent</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
              </tr>
            </thead>
            <tbody>

              @if(!empty($tenantPreferance))
                  <tr>
                    <td><a href="/account/preferance/{{$tenantPreferance->id}}">Preferance ID {{$tenantPreferance->id}}</td>
                    <td>{{$tenantPreferance->type}}</td>
                    <td>{{$tenantPreferance->rent}}</td>
                    <td>{{$tenantPreferance->bedrooms}}</td>
                    <td>{{$tenantPreferance->bathrooms}}</td>
                  </tr>
              @endif

          </tbody>
        </table>
      </div>
    </div>
    @else
    <div class="row text-center">
      <div class="col-md-12">
        <span class="lead">Only Tenants can set preferances</span>
      </div>
    </div>
  @endif
</div>
@endsection
