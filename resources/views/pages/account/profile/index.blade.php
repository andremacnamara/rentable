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
                
          
                @if($currentUser->userType == "Landlord")
                    @if($currentUser->id == $user->id)
                        <span>You cannot add yourself</span>
                    @elseif($Tenancy == null || $user->userType == "Tenant" && $currentUser->id != $user->id && $Tenancy->accepted == 0 && $Tenancy->request_sent == 0)
                        <a href="/account/tenancy/{{$user->id}}/create" class="btn btn-primary">Start Tenancy</a>
                    @elseif($Tenancy->request_sent == 1 && $Tenancy->accepted == 0 && $user->userType == "Tenant" && $currentUser->id == $Tenancy->landlord_id && $user->id == $Tenancy->tenant_id)
                        <span>Request already sent</span>
                    @elseif($Tenancy->accepted == 1 && $Tenancy->request_sent == 0 && $currentUser->id == $Tenancy->landlord_id && $user->id == $Tenancy->tenant_id)
                        <span>You are in tenancy with this person</span>
                    @endif
                @endif
                
                
                {{--
                    Provides tenant ability to accept/reject the request from landlord.
                    Only a tenant can see these buttons
                    Only the relevant tenant can see these (id if tenancy id, is the profiles user id)

                --}}
                
                @if(!empty($tenancy))
                @if($currentUser->userType == "Tenant")
                    @if($tenancy == null || $tenancy->accepted == 0 && $tenancy->request_sent == 1 && $tenancy->tenant_id == $user->id)
                        
                        <form method="POST" action="/account/tenancy/{{$tenancy->id}}/accept">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="Accept Request">
                        </form>
                        <form method="POST" action="/account/tenancy/{{$tenancy->id}}/reject">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-warning" value="Reject Request">
                        </form>
                    @endif
                @endif

                    {{-- 
                        If a tenancy is in place. Show the details.
                        Keep it private. Only the tenant can see the details on their side.
                    --}}
               

                    @if($tenancy->accepted == 1 && $tenancy->request_sent == 0  && $tenancy->tenant_id == $user->id ) 
                    <form method="POST" action="/account/tenancy/{{$tenancy->id}}/end">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="End Tenancy">
                    </form>
                    <h5>Currently in Tenancy with {{$tenancy->landlord_name}}</h5>
                    <h5>Your property is {{$tenancy->property_address}}</h5>
                    @endif
                @endif
            </div>
        </div> {{-- End of Row --}}
        
        @if($user->userType == "Tenant")
        <div class="row mt-4">
            <div class="col-md-9">
                <span class="text-lead text-center">Your watched properties</span><hr>
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
                    <a href="/preferance" class="link-sub-title">Property Preferences</a>
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
                </table>
            </div>
        @endif

        @if($user->userType == "Landlord")
            <div class="row text-center d-flex flex-wrap">
                <div class="col-md-9">
                    @if($currentUser->id == $user->id)         
                        <h3>Your Active Adverts</h3>
                    @else
                        <h3>{{$user->name}}'s Active Adverts</h3>
                    @endif
          
                    <div class="row py-2">
                    @if(!empty($properties))
                        @foreach ($properties as $property)
                            <div class="col-md-4 mb-4">
                                <a href="/property/{{$property->id}}">
                                    <img class="list-image img-fluid" src="{{$property->photo}}">
                                </a>
                                <p class="mt-2">{{$property->address .', '. $property->town .', '. $property->county}}</p>
                            </div>
                        @endforeach
                    @endif
                    </div>
                </div>
                <div class="col-md-3 spacing">
                <table class="table">
                    <p class="text-sub-title">Your Tenants</p>
                    @if(!empty($landlordTenancies))
                        @foreach ($landlordTenancies as $Tenant)
                            <tr>
                                <td>
                                    <a href="/account/{{$Tenant->tenant_id}}">
                                        {{$Tenant->tenant_name}}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{$Tenant->property_address}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                        
                </table>
            </div>
            </div>
        @endif
        <a href="/messages/{{$user->id}}/create" class="btn btn-primary">Send Message</a>
    </div>
@endsection
