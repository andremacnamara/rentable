@extends('layouts/main')
@section('title')
  Expense Claim
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center text-center">
      <div class="col-md-8">
        <div class="card card-default border-shadow">
          <div class="card-header">Claim ID: {{$expenseClaim->id}} </div>
          <div class="card-body">
          
            <div class="row">
              <div class="col-md-12">
                <label for="title" class="label">Title</label>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 content" name="title">
                {{$expenseClaim->title}}
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-md-12">
                <label for="property_address" class="label">Property Address</label>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 content" name="property_address">
                {{$expenseClaim->property_address}}
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-md-12">
                <label for="description" class="label">Description</label>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 content" name="description">
                {{$expenseClaim->description}}
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-md-12">
                <label for="cost" class="label">Cost</label>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 content" name="cost">
                {{$expenseClaim->cost}}
              </div>
            </div>

            <div class="row mt-4">
              <div class="col-md-12">
                <label for="reciept" class="label">Receipt</label>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 content" name="cost">
                <a href="{{$expenseClaim->receipt}}">Link to receipt</a>
              </div>
            </div>

            @if($expenseClaim->landlord_id == Auth::user()->id)
              <a href="/expenseclaim/{{$expenseClaim->id}}/approve" class="mt-4 border border-secondary btn btn-button">Approve/Reject</a>
            @else
              <a href="/expenseclaim/{{$expenseClaim->id}}/edit" class="mt-4 border border-secondary btn btn-button">Edit</a>
            @endif
              <a href="/expenseclaim/home" class="mt-4 border border-secondary btn btn-button">Back</a>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
