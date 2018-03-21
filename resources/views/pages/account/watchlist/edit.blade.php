@extends('layouts/main')
@section('title')
  Create a Watchlist
@endsection

@section('content')
<div class="container">
  <h1>Create Project</h1>
  <h6>This is where all your projects are located</h6>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="row">
          <div class="col-md-10">
            <form action="/watchlist/{{$Watchlists->id}}" method="POST">
              {{ csrf_field() }}
              <!-- ./ Used to trick the browser to update-->
              {{ method_field('PUT') }}
              <div class="row">
                <div class="col-md-6">
                  <label for="title">Title</label>
                </div>
              </div> <!-- ./  row 7-->
              <div class="row">
                <div class="col-md-6">
                  <input type="text" name="title" value={{$Watchlists->title}}>
                </div> <!-- ./ col6  -->
              </div> <!-- ./ row 6 -->
              <div class="row">
                <div class="col-md-6">
                  <label for="title">Active</label>
                </div> <!-- ./  col-6 -->
              </div> <!-- ./  row 5 -->
              <div class="row">
                <div class="col-md-6">
                  <select name="active">
                    @if($Watchlists->active == 0)
                      <option value="0" selected>No</option>
                      <option value="1" >Yes</option>
                    @else
                      <option value="0" >No</option>
                      <option value="1" selected>Yes</option>
                    @endif
                  </select>
                </div> <!-- ./ col 6 -->
              </div> <!-- ./  row 4-->
              <div class="img-section">
                <div class="row">
                  @foreach ($Watchlists->properties as $WatchedProperties)
                    <div class="col-md-4">
                      <div class="box">
                        <div style="position: relative; background: url('{{$WatchedProperties->image_url}}') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;"></div>
                      </div> <!-- ./  box -->
                    </div> <!-- ./ col 4 -->
                  @endforeach
                </div> <!-- ./ row 3 -->
              </div> <!-- ./  img-section -->
              <button type="submit">Save</button>
            </form> <!-- ./ form  -->
          </div> <!-- ./ col 10 -->
        </div> <!-- ./ row 2 -->
        <div class="col-md-2">
          <center>
            <a href="/watchlist/{{$Watchlists->id}}/delete" onclick="confirm()" class="delete-btn">Delete</a>
          </center>
        </div> <!-- ./ col 2 -->
      </div> <!-- ./ box  -->
    </div> <!-- ./col 12  -->
  </div> <!-- ./ row 1 -->
</div> <!-- ./ container -->

@endsection
