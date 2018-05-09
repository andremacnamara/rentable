@extends('layouts/main')
@section('title')
  Expenses
@endsection

@section('content')
  <div class=" text-center container">
    <div class="row">
      <div class="col-md-12">
        <span class="h5">Log your expenses for this property</span><br>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">
        <span class="h5 text-muted">Please fill out this form</span>
      </div>
    </div>
    <form method="POST" action="/expenseclaim/{{$expenseClaim->id}}">

      {{ csrf_field() }}
      {{ method_field('PUT') }}

      <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
          <label for="property_address">Property Address</label>
        </div>
      </div>
        @if(!empty($expenseClaim))
          <div class="row form-group justify-content-center">
            <div class="col-md-4">
              <input type="text" class="form-control" name="property_address" value="{{$expenseClaim->property_address}}" readonly>
            </div>
          </div>
        @endif

      <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
          <label for"title">Title<label>
        </div>
      </div>
      <div class="row form-group justify-content-center">
        <div class="col-md-4">
          <input class="form-control" type="text" name="title" value="{{$expenseClaim->title}}">
        </div>
      </div>

      <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
          <label for"description">Description<label>
        </div>
      </div>
      <div class="row form-group justify-content-center">
        <div class="col-md-4">
          <input class="form-control" type="text" name="description" value="{{$expenseClaim->description}}">
        </div>
      </div>

      <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
          <label for"cost">Cost to be claimed<label>
        </div>
      </div>
      <div class="row form-group justify-content-center">
        <div class="col-md-4 input-group">
          <span class="input-group-addon mr-1 mt-1">€</span>
          <input class="form-control" type="text" name="cost" value="{{$expenseClaim->cost}}">
        </div>
      </div>

      <div class="row mt-4 justify-content-center">
        <div class="col-md-6">
          <label for"receipt">Please provide link to receipt<label>
          <label for"receipt" class="text-muted">If not avaliable please use a invoice generator.<label>
        </div>
      </div>
      <div class="row form-group justify-content-center">
        <div class="col-md-4">
          <input class="form-control" type="text" name="receipt" value="{{$expenseClaim->receipt}}">
        </div>
      </div>
     
      <input type="submit" class="btn btn-primary mb-2" value="Submit Claim Request">

    </form>
    
    
  </div>
@endsection
