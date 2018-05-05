@extends('layouts/main')
@section('title')
  Rentable - Recent Adds
@endsection

@section('content')
  <div class="container">

  {{--  ============== Tenant Profile section ============== --}}


  {{--  ============== Relationship with Landlord ============== --}}
  
  
@if($user->userType != "Landlord")
      <div class="row">
        <div class="col-md-12">
 
        {{--  
          If the request hasn't been sent, and hasn't been excepted.
          Provie button to send a tenancy request
        --}}
         
        {{--
          If tennancy = null
          if tennacny not accepted
          if request hasn't been sent
          if currently signed in user != user/tenant id
        --}}
        
        @if(Auth::user()->id != $user->id)
          @if($tenancy == null || $tenancy->accepted == 0 && $tenancy->request_sent != 1)
           <a href="/account/tenancy/{{$user->id}}/create" class="btn btn-primary">Start Tenancy</a>
          @endif
        @endif

          {{--  
            If the user signed in, isn't the owner of this profile.
            Do not show these buttons that control accept/reject/end
          --}}

        @if(Auth::user()->id == $user->id)

          {{-- 
            If the request has been sent, but hasn't been accepted.
            Give option to accept and reject.
            This updates the values in DB.
          --}}

          @if($tenancy != null && $tenancy->accepted == 0 && $tenancy->request_sent == 1)
            <form method="POST" action="/account/tenancy/{{$user->id}}/accept">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="Accept Request">
            </form>
            <form method="POST" action="/account/tenancy/{{$user->id}}/reject">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-warning" value="Reject Request">
            </form>
            {{-- 
                If the request has been accepted.
                Show button to end the tenancy,
                and property details
            --}}
            
          @elseif($tenancy != null && $tenancy->accepted == 1 && $tenancy->request_sent == 0)
            <form method="POST" action="/account/tenancy/{{$user->id}}/end">
              {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="End Tenancy">
            </form>
            <h5>Currently in Tenancy with {{$tenancy->landlord_name}}</h5>
            <h5>Your property is {{$tenancy->property_address}}</h5>
          @endif <!-- End of current user vs this user-->
        @endif <!-- Initial If-->
      </div>


      <!-- ============== Watched Properties ============== -->


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

      <!-- ============== Landlord Profile section ============== -->
    
      <header>
      
            
         
        
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
