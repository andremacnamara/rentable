@extends('layouts/main')
@section('title')
  Your Watchlist
@endsection

@section('content')
<div class="container">
  <header class="jumbotron">
    <div class="container">
      <h1>These are your saved lists</h1>
    </div>
  </header>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>Watchlist Id</th>
            <th>Title</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <!--
            Looping thorugh all watchlists.
            Watchlist controller Index
          -->
          @foreach ($Watchlists as $Watchlist)
            <tr>
              <td>{{$Watchlist->id}}</td>
              <td>
                <a href="/watchlist/{{$Watchlist->id}}">
                  {{$Watchlist->title}}
                  <!--
                    If watchlist active
                    Show that it is
                  -->
                  @if($Watchlist->active == 1)
                    <div class="active btn btn-success ml-4">Active</div>
                  @endif
                </a>
              </td>
              <td>
                <a href="/watchlist/{{$Watchlist->id}}/edit" class="edit-btn">Edit</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
