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
              <th>Claim Approved</th>
              @if(!empty($expenseClaim))
                @if($expenseClaim != "Awaiting Review")
                <th>Time Reviewed</th>
                @endif
              @endif
            </tr>
          </thead>
          <tbody>

           @if(!empty($expenseClaim))
            @foreach ($expenseClaim as $claim)
              <tr>
                <td><a href="/expenseclaim/show/{{$claim->id}}">{{$claim->title}}</a></td>
                <td>{{$claim->created_at->toDateString()}}</td>
                <td>{{$claim->approved}}</td>
                @if($claim->approved != "Awaiting Review")
                  <th>{{$claim->updated_at}}</th>
                @endif
              </tr>
            @endforeach
          @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection