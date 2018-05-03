@extends('layouts/main')
@section('title')
  
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>Description</th>
            <th>Cost</th>
            <th>Category</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($PropertyExpenses as $expenses)
            <tr>
              <td>{{$expenses->expenseDescription}}</td>
              <td>€{{$expenses->cost}}</td>
              <td>{{$expenses->category}}</td>
              <td>{{$expenses->date}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{$PropertyExpenses->sum('cost');}}
    </div>
  </div>
@endsection
