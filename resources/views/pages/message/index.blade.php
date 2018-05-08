@extends('layouts/main')

@section('title')
  Message Center
@endsection

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <span>Message Center</span>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <a href="/messages/create" class="btn btn-button">Send a message</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>From</th>
                            <th>Date</th>
                            <th>Read</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($messages as $message)
                            <tr>
                                <td><a href="messages/{{$message->id}}">{{$message->title}}</a></td>
                                <td>{{$message->sender_name}}</td>
                                <td>{{$message->created_at}}</td>
                                <td>{{$message->read}}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
