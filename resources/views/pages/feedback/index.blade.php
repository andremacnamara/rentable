@extends('layouts/main')
@section('title')
  Feedback Home
@endsection

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <span>Feedback Center</span>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <a href="/feedback/create" class="btn btn-button">Leave Feedback</a>
        </div>
    </div>
</div>
@endsection