@extends('layouts/main')
@section('title')
  Feedback Home
@endsection

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <span>Feedback Center</span>
        </div>
    </div>
    @if(Auth::user()->userType == "Tenant")
      <div class="row text-center">
          <div class="col-md-12">
              <a href="/feedback/create" class="btn btn-button">Leave Feedback</a>
          </div>
      </div>
    @endif

      <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>Results</th>
            <th>Date Posted</th>
            <th>Landlord Name</th>
            <th>Tenant Name</th>
            <th>Property Address</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($feedback as $tenancyfeedback)
            <tr>
              <td><a href="/feedback/results/{{$tenancyfeedback->id}}">Feedback ID {{$tenancyfeedback->id}}</td>
              <td>{{ \Carbon\Carbon::parse($tenancyfeedback->created_at)->format('d/m/Y')}}</td>
              <td>{{$tenancyfeedback->landlord_name}}</td>
              <td>{{$tenancyfeedback->tenant_name}}</td>
              <td>{{$tenancyfeedback->property_address}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection