@extends('layouts/main')
@section('title')
  Rentable - Recent Adds
@endsection

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="h3">{{$user->name}}</div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">

                {{--
                    Shows the add button to the landlord if the request hasn't been sent.
                    If it has been sent, doesn't show add, and shows message.
                    Does not show button to tenant.
                --}}

                @if($currentUser->user == "Landlord")
                    @if($Tenancy == null || $user->userType == "Tenant" && Auth::user()->id != $user->id && $Tenancy->accepted == 0 && $Tenancy->request_sent == 0)
                        <a href="/account/tenancy/{{$user->id}}/create" class="btn btn-primary">Start Tenancy</a>
                    @elseif($Tenancy->request_sent == 1 && $Tenancy->accepted == 0)
                        <span>Request already sent</span>
                    @endif
                @endif
                
                {{--
                    Provides tenant ability to accept/reject the request from landlord.

                --}}

                @if($tenancy == null ||$tenancy->accepted == 0 && $tenancy->request_sent == 1)
                    <form method="POST" action="/account/tenancy/{{$user->id}}/accept">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="Accept Request">
                    </form>
                    <form method="POST" action="/account/tenancy/{{$user->id}}/reject">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-warning" value="Reject Request">
                    </form>

                @elseif($tenancy->inTenancy())
                    <form method="POST" action="/account/tenancy/{{$user->id}}/end">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="End Tenancy">
                    </form>
                    <h5>Currently in Tenancy with {{$tenancy->landlord_name}}</h5>
                    <h5>Your property is {{$tenancy->property_address}}</h5>
                @endif

        
                
            </div>
        </div>
       
    </div>
@endsection
