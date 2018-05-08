@extends('layouts/main')

@section('title')
    @if($message->sender_id == Auth::user()->id)
        Sent Messages
    @else
        Message From
    @endif
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <div class="card card-default border-shadow">
                    @if($message->sender_id == Auth::user()->id)
                        <div class="card-header">You sent this message</div>
                    @else
                        <div class="card-header">You have recieved a message</div>
                    @endif
                    <div class="card-body">

                        <div class="row text-muted">
                            <div class="col-md-3">
                                <label for="from" class="text-md-right">From</label>
                            </div>
                            <div class="col-md-9">
                                <span name="from">{{$message->sender_name}}</span>
                            </div>
                        </div>

                        <div class="row mt-3 text-muted">
                            <div class="col-md-3">
                                <label for="to" class="text-md-right">To</label>
                            </div>
                            <div class="col-md-9">
                                <span name="to">{{$message->recipient_name}}</span>
                            </div>
                        </div>

                        <div class="row mt-3 text-muted">
                            <div class="col-md-3">
                                <label for="title" class="text-md-right">Title</label>
                            </div>
                            <div class="col-md-9">
                                <span name="title" class="">{{$message->title}}</span>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="message" class="text-md-right">Message</label>
                            </div>
                            <div class="col-md-9">
                                <span name="message" class="lead">{{$message->message}}</span>
                            </div>
                        </div>
                       
                        @if($message->sender_id != Auth::user()->id)
                            <div class="row mt-4 ml-4">
                                <div class="col-md-12">
                                    <a href="/messages/{{$message->sender_id}}/create" class="float-left border border-secondary btn btn-button">Reply</a>
                                    <a href="/messages/inbox" class="ml-2 float-left border border-secondary btn btn-button">Back</a>
                                </div>
                            </div>
                        @else
                            <div class="row mt-4 ml-4">
                                <div class="col-md-12">
                                    <a href="/messages/sentbox" class="ml-2 float-left border border-secondary btn btn-button">Back</a>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
