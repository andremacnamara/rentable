@extends('layouts/main')
@section('title')
  
@endsection
@section('content')

<div class="container">
  <div class="row text-center mb-2">
    <div class="col-md-12">
      <span class="h5">A log of all your expenses</span>
    </div>
  </div>
  <div class="row text-center mb-2">
    <div class="col-md-12">
      <span class="text-muted">{{$property->address}}, {{$property->town}}</span>
    </div>
  </div>
  <div class="row text-center mb-4">
    <div class="col-md-12">
      <a class="btn btn-primary" href="/expenses/{{$property->id}}/create">Log Expense</a>
    </div>
  </div>
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
    </div>
  </div>
@endsection
