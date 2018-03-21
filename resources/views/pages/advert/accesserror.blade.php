@extends('layouts/main')

@section('content')
<!-- If a user navigates to URL they have no rights to be on -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="error-template">
        <h1>Oops!</h1>
        <h2>You have no rights to be here</h2>
        <div class="error-details">
          Sorry, an error has occured, Requested page not found!
        </div>
        <div class="error-actions">
          <a href="/" class="btn btn-primary btn-lg">
            <span class="glyphicon glyphicon-home"></span>
              Take Me Home
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
