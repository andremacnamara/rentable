@extends('layouts/main')
@section('title')
  Expenses
@endsection

@section('content')
  <div class=" text-center container">
    <div class="row">
      <div class="col-md-12">
        <span class="h3">Log your expenses for this property</span><br>
        <span class="text-muted">{{$property->address}}</span>
        
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">
        <span class="h5 text-muted">Please fill out this form</span>
      </div>
    </div>
    <form method="POST" action="/expenses">
      {{ csrf_field() }}
      <input name="property_id" class="text-muted" value="{{$property->id}}">
      <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
          <label for"description">Expense Description<label>
        </div>
      </div>
      <div class="row form-group justify-content-center">
        <div class="col-md-4">
          <input class="form-control" type="text" name="description">
        </div>
      </div>

      <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
          <label for"amount">Amount<label>
        </div>
      </div>
      <div class="row form-group justify-content-center">
        <div class="col-md-4 input-group">
          <span class="input-group-addon mr-1 mt-1">€</span>
          <input class="form-control" type="text" name="amount">
        </div>
      </div>

      <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
          <label for"category">Category<label>
        </div>
      </div>
      <div class="row form-group justify-content-center">
        <div class="col-md-4">
          <select class="form-control" id="category" name="category">
            <option value="Mortgage Payment">Mortgage Payment</option>
            <option value="Maintainence">Maintainence</option>
            <option  value="Management Fee">Management Fee</option>
          </select>
        </div>
      </div>

      <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
          <label for"description">Date<label>
        </div>
      </div>
      <div class="row form-group justify-content-center">
        <div class="col-md-4">
          <input class="form-control" type="date" name="date">
        </div>
      </div>
      <input type="submit" class="btn btn-primary" value="Log Expense">
    </form>
    
    
  </div>
@endsection
