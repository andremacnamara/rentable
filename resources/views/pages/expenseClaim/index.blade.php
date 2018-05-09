@extends('layouts/main')
@section('title')
  Expense Claim Home
@endsection

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <span>Expense Claim</span>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <a href="/expenseclaim/create" class="btn btn-button">Submit Claim</a>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Date Posted</th>
              <th>Approved</th>
            </tr>
          </thead>
          <tbody>

            {{--@foreach ($feedback as $tenancyfeedback)
              <tr>
                <td><a href="/feedback/results/{{$tenancyfeedback->id}}">Feedback ID {{$tenancyfeedback->id}}</td>
                <td>{{$tenancyfeedback->created_at}}</td>
                <td>{{$tenancyfeedback->landlord_name}}</td>
                <td>{{$tenancyfeedback->tenant_name}}</td>
                <td>{{$tenancyfeedback->property_address}}</td>
              </tr>
            @endforeach --}}
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection