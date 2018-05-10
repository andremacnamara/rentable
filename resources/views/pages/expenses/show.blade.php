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

      <div class="row text-center">
      <div class="col-md-12">
        <span class="h5">An aggregated overview of expenses for all properties</span>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-6">
        <div class="panel-body">
          <canvas id="canvas" height="150" width="300"></canvas>
        </div>
      </div>
    </div>

    <script>
      var url = "/uniquepropertyoverview/{{$property->id}}";
      var Cost = new Array();
      var Category = new Array();
      $(document).ready(function(){
        $.get(url, function(response){
          response.forEach(function(data){
            Cost.push(data.cost);
            Category.push(data.category);
          });
          
          var ctx = document.getElementById("canvas").getContext('2d');
          var myPieChart = new Chart(ctx,{
            type: 'pie',
            
            data : 
            {
              datasets: [{
                data: Cost
              }],
            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels:  Category
            }
          });
        });
      });
  </script>

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
