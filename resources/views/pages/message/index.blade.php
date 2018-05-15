@extends('layouts/main')
@section('title')
  Message Center
@endsection

@section('content')
  <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <span>Welcome to the message center.</span><br>
        <span>Please proceed to your messages.</span><br>
      </div>
    </div>
    <div class="row text-center mt-4">
      <div class="col-md-12">
        <span>To find a user to message please preform a search</span><br>
          @if($user->userType == "Landlord")
            <span><a href="/user/search">Search for a tenant</a></span><br>
          @endif
            <span><a href="/search">Search for a property</a></span>
      </div>
    </div>
    <div class="row text-center mt-4">
      <div class="col-md-12">
        <a href="/messages/inbox" class="btn btn-info mb-3">Inbox</a>
        <a href="/messages/sentbox" class="btn btn-info mb-3">Sentbox</a>
      </div>
    </div>
  </div>

@endsection