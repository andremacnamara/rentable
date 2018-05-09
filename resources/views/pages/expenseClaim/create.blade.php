@extends('layouts/main')
@section('title')
  Expenses
@endsection

@section('content')
  <div class=" text-center container">
    <div class="row">
      <div class="col-md-12">
        <span class="h5">Log your expenses for this property</span><br>
        {{--<span class="text-muted">{{$property->address}}</span>--}}
        
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">
        <span class="h5 text-muted">Please fill out this form</span>
      </div>
    </div>
    <form method="POST" action="/expenses">

      {{ csrf_field() }}

      <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
          <label for="property_address">Property Address</label>
        </div>
      </div>
      <div class="row form-group justify-content-center">
        <div class="col-md-4">
          <select class="form-control" id="property_address" name="property_address">
              @foreach ($tenancy as $property)
                  <option>{{$property->property_address}}</option>
              @endforeach
          </select>
        </div>
      </div>

      <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
          <label for"title">Title<label>
        </div>
      </div>
      <div class="row form-group justify-content-center">
        <div class="col-md-4">
          <input class="form-control" type="text" name="title">
        </div>
      </div>

      <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
          <label for"description">Description<label>
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
          <label for"receipt">Please provide link to receipt<label>
        </div>
      </div>
      <div class="row form-group justify-content-center">
        <div class="col-md-4">
          <input class="form-control" type="text" name="receipt">
        </div>
      </div>

      <input type="submit" class="btn btn-primary mb-2" value="Log Expense">

    </form>
    
    
  </div>
@endsection
