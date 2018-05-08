@extends('layouts/main')

@section('title')
  Create your message.
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default mt-4 mb-4">
                <div class="card-header">#</div>
                <div class="card-body">

                    <form method="POST" action="/messages">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row mb-4">
                                    <label for="recipient" class="col-md-3 col-form-label text-md-right">Send To</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="recipient_name" value="{{$user->name}}" readonly >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" class="form-control" name="recipient_id" value="{{$user->id}}" readonly >


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row mb-4">
                                    <label for="title" class="col-md-3 col-form-label text-md-right">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row mb-4">
                                    <label for="message" class="col-md-3 col-form-label text-md-right">Message</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Send Message">
                        


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
