@extends('layouts/main')
@section('title')
  Profile for {{$user->name}}
@endsection

@section('content')
    <div class="container">
       

        <div class="row text-center d-flex flex-wrap">
            <div class="col-lg-12">
            @foreach($landlordTenancies as $tenancy)
                <span class="lead"><strong>Tenant Name: </strong>{{$tenancy->tenant_name}}</span><br>
                <span class="lead"><strong>Property Address: </strong>{{$tenancy->property_address}}</span><br>
            @endforeach
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
            </div> <!-- ./col -->
        </div> <!-- ./row -->
    </div>  <!-- ./container -->
@endsection