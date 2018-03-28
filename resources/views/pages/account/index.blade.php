@extends('layouts/main')
@section('title')
  Rentable - Recent Adds
@endsection

@section('content')
<div class="container">

  @if($user->userType != "Landlord")
    <div class="row">
      <div class="col-md-6">
        <p class="text-lead">Your Landlords</p>
        @if(!$user->tenancies()->count())
          <p class="text-sub">You has no tenancies!</p>
        @else
          @foreach ($user->tenancies() as $users)
            <p>
              <span>{{$users->name}}</span>
              <span class="text-muted">{{$users->userType}}</span>
            </p>
          @endforeach
        @endif
      </div>
      <div class="col-md-6">
        @if (Auth::user()->hasTenancyRequestsPending($user))
          <p class="text-lead">Waiting for {{$user->name }} to accept your request.</p>
          @elseif (Auth::user()->hasTenancyRequestsReceived($user))
            <a href="/account/{{$user->id}}/accept" class="btn btn-primary">Accept Friend Request</a>
          @elseif(Auth::user()->isInTenancyWith($user))
            <p class="text-sub">You and {{$user->name}} are friends</p>
          @elseif(Auth::user()==$user)
            @else
              {{-- <a href="/account/{{$user->id}}/add" class="btn btn-primary">Start Tenancy</a> --}}
              <a href="/account/tenancy/create/{{$user->id}}" class="btn btn-primary">Start Tenancy</a>
        @endif

        <p class="text-lead">Requests from Landlords</p>
        @if(!$tenancyRequests->count())
          <p class="text-sub">You has no Tenancy Requests!</p>
          @else
            @foreach ($tenancyRequests as $Request)
              <span>{{$Request->name}}</span>
              <span class="text-muted">{{$Request->userType}}</span>
              <span><a href="/account/{{$Request->id}}/accept" class="btn btn-primary btn-sm">Accept</a></span>
            @endforeach
        @endif

        @if(session()->has('status'))
          <div class="alert alert-info">
            {{ session('status') }}
          </div>
        @endif

      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-9">
        <span class="text-lead text-center">Your watched properties</span>
        <hr>
        <div class="row py-2">
          @foreach ($user->WatchedProperties as $WatchedProperties)
            <div class="col-md-4 mb-4">
              <a href="/property/{{$WatchedProperties->image_info}}">
                <img class="list-image img-fluid" src="{{$WatchedProperties->image_url}}">
              </a>
              <p class="mt-2">{{$WatchedProperties->address .', '. $WatchedProperties->town .', '. $WatchedProperties->county}}</p>
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-md-3 spacing">
        <table class="table">
          <tbody>
            <!--
              Looping thorugh all watchlists.
              Watchlist controller Index
            -->
            <a href="#" class="link-sub-title">Property Preferences</a>
            <p class="text-sub-title">Your Watchlists</p>
            @foreach ($Watchlists as $Watchlist)
              <tr>
                  <td>
                    <a href="/watchlist/{{$Watchlist->id}}">
                      {{$Watchlist->title}}
                    </a>
                  </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @else
    <div class="row">
      <div class="col-md-6">

        <p class="text-lead">Your Tenants</p>
        @if(!$user->tenancies()->count())
          <p>You has no tenancies!</p>
        @else
          @foreach ($user->tenancies() as $users)
            <p>
              <span>{{$users->name}}</span>
              <span class="text-muted">{{$users->userType}}</span>
            </p>
          @endforeach
        @endif
      </div>
      <div class="col-md-6">
        @if (Auth::user()->hasTenancyRequestsPending($user))
          <p>Waiting for {{$user->name }} to accept your request.</p>
        @elseif (Auth::user()->hasTenancyRequestsReceived($user))
          <a href="#" class="btn btn-primary">Accept Friend Request</a>
        @elseif(Auth::user()->isInTenancyWith($user))
          <p>You and {{$user->name}} are friends</p>
        @elseif(Auth::user()==$user)
        @else
          {{-- <a href="/account/{{$user->id}}/add" class="btn btn-primary">Start Tenancy</a> --}}
          <a href="/account/tenancy/create" class="btn btn-primary">Start Tenancy</a>
        @endif
        <p class="text-lead">Requests from Tenants</p>
        @if(!$tenancyRequests->count())
          <p>You has no Tenancy Requests!</p>
        @else
          @foreach ($tenancyRequests as $Request)
            <span>{{$Request->name}}</span>
            <span class="text-muted">{{$Request->userType}}</span>
          @endforeach

        @endif
      </div>
      @if(session()->has('status'))
        <div class="alert alert-info">
          {{ session('status') }}
        </div>
      @endif
    </div>
    <header class="jumbotron">
      <div class="container">
        <h1>Welcome to EasyRental</h1>
          <p>These are the most recent properties</p>
          <p>
            <a class="btn btn-primary btn-lg" href="/property/advertise/create">Add New Property</a>
          </p>
          <p>
            <a class="btn btn-primary btn-lg" href="/watchlist">Watch List</a>
          </p>
      </div> <!--container-->
    </header>

    <div class="row text-center d-flex flex-wrap">
      <div class="col-lg-12">
        <h3>Your Active Adverts</h3>
          <div class="row py-2">
            @foreach ($properties as $property)
              <div class="col-md-4 mb-4">
                <a href="/property/{{$property->id}}">
                  <img class="list-image img-fluid" src="{{$property->photo}}">
                </a>
                <p class="mt-2">{{$property->address .', '. $property->town .', '. $property->county}}</p>
              </div>
            @endforeach
          </div>
      </div> <!-- ./col 12 -->
    </div>  <!-- ./row -->
  @endif

</div>

@endsection
