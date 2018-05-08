@extends('layouts/main')

@section('title')
  Message from ...
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <span>Title {{$message->title}}</span><br>
                <span>Message {{$message->message}}</span>
            </div>
        </div>
    </div>
@endsection
