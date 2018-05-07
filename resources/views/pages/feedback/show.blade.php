@extends('layouts/main')
@section('title')
  Feedback No: - {{$feedback->id}}
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10">
     {{$feedback->id}}
     
    </div>
  </div>
  
  </div>
@endsection
