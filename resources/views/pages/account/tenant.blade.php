@extends('layouts/main')
@section('title')
  Profile for {{$user->name}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($tenantTenancies as $tenancy)
            <span class="lead"><strong>Landlord Name: </strong>{{$tenancy->landlord_name}}</span><br>
            <span class="lead"><strong>Property Address: </strong>{{$tenancy->property_address}}</span><br>
            @endforeach
            
                {{-- This blocks a tenant adding themselves --}}
                {{-- Shows add button, if tenancy model is empty. Also when no relationship established. --}}
            
            @if(Auth::user()->id != $user->id)
                @if($tenancy == null || $tenancy->accepted == 0 && $tenancy->request_sent != 1)
                    <a href="/account/tenancy/{{$user->id}}/create" class="btn btn-primary">Start Tenancy</a>
                @endif
            @endif

                {{-- Only shows following buttons, if the current signed in user, is the relevant user. --}}
                {{-- Shows accept/reject if the request has been sent, but not accepted yet. --}}

            @if(Auth::user()->id == $user->id)
                @if($tenancy != null && $tenancy->accepted == 0 && $tenancy->request_sent == 1)
                    <form method="POST" action="/account/tenancy/{{$user->id}}/accept">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="Accept Request">
                    </form>

                    <form method="POST" action="/account/tenancy/{{$user->id}}/reject">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-warning" value="Reject Request">
                    </form>

                    {{-- Allows the tenancy to be ended. --}}
                
                @elseif($tenancy != null && $tenancy->accepted == 1 && $tenancy->request_sent == 0)
                    <form method="POST" action="/account/tenancy/{{$user->id}}/end">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="End Tenancy">
                    </form>
                @endif
            @endif
        </div>
    </div>


      {{-- ============== Watched Properties ============== --}}

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
@endsection