@extends('layouts/main')
@section('title')
  Expenses
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center text-center">
      <div class="col-md-8">
        <div class="card card-default border-shadow">
          <div class="card-header">Current status of claim <strong>{{$expenseClaim->approved}}</strong> </div>
          <div class="card-body">
            <form method="POST" action="/expenseclaim/show/{{$expenseClaim->id}}/">

              {{ csrf_field() }}
              {{ method_field('PUT') }}

              <div class="row mt-4 justify-content-center">
                <div class="col-md-6">
                  <label for="property_address">Please update the status of the claim</label>
                </div>
              </div>
              
              <div class="row form-group justify-content-center">
                <div class="col-md-4">
                  <select class="form-control" id="approved" name="approved">
                      <option value="Approved">Approved</option>
                      <option value="Not Approved">Not Approved</option>
                  </select>
                </div>
              </div>
              <input type="submit" class="btn btn-primary mb-2 text-center" value="Log Expense">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
