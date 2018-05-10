@extends('layouts/main')
@section('title')
  Create a Watchlist
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
  <h1>Create Project</h1>
  <h6>This is where all your projects are located</h6>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-md-10">
            <form action="/watchlist" method="POST">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                  <label for="title">Title</label>
                </div> <!-- ./col6 -->
              </div> <!-- ./ row-6 -->
              <div class="row">
                <div class="col-md-6">
                  <input class ="form-control" type="text" name="title" placeholder="Viewed properties...">
                </div> <!-- ./ col-6-->
              </div> <!-- ./ row-5  -->
              <div class="row mt-2">
                <div class="col-md-6">
                  <label for="title">Active</label>
                </div> <!-- ./col=6 -->
              </div> <!-- ./ row-4-->
              <div class="row">
                <div class="col-md-6">
                  <select class="form-control" name="active">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                  </select>
                </div> <!-- ./ row 3-->
              </div> <!-- ./col-3 -->
              <button class="mt-2 btn btn-primary" type="submit">Create Watchlist</button>
            </form> <!-- ./form -->
          </div> <!-- ./col-10 -->
        </div> <!-- ./ row 2 -->
      </div> <!-- ./ box -->
    </div> <!-- ./ col-12 -->
  </div> <!-- ./ row 1-->
</div> <!-- ./ container -->
@endsection
