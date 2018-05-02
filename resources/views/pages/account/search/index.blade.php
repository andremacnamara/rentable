@extends('layouts/main')
@section('title')
  Search for a property
@endsection

@section('content')
  @if ($errors->any())
    <div class="row mx-auto text-center">
      <div class="col-md-12">
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
      </div>
    </div>
@endif

<div class="container">
  <div class="card">
    <form method="GET" action="/user/search/results">
      {{ csrf_field() }}
      <div class="card-header">Search for a Tenant</div>
        <div class="card-body">

         
            <div class="row mt-md-4">
                <div class="col-md-4">
                    <button type="submit" class="form-control btn btn-primary">
                        Search
                    </button>
                </div>
            </div>
          </div> <!-- ./Card Body -->
      </form>
    </div><!-- ./Card -->
  </div><!-- ./Container -->

@endsection