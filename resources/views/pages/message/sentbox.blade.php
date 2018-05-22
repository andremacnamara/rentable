@extends('layouts/main')

@section('title')
  Message Center
@endsection

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <span>Message Center</span><br>
                <span>Current viewing: Sentbox</span>
            </div>
        </div>
        <div class="row text-center mt-4">
            <div class="col-md-12">
                <a href="/messages/inbox" class="btn btn-success mb-3">Inbox</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Sent To</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        

                        @if(!empty($sentMessages)) 
                            @foreach ($sentMessages as $message)
                                <tr>
                                    <td><a href="/messages/show/{{$message->id}}">{{$message->title}}</a></td>
                                    <td>{{$message->recipient_name}}</td>
                                    <td>{{ \Carbon\Carbon::parse($message->created_at)->format('d/m/Y')}}</td>
                                    <td>{{$message->created_at->toTimeString()}}</td>
                                    
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
