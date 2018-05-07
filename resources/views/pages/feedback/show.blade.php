@extends('layouts/main')
@section('title')
  Feedback No: - {{$feedback->id}}
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10">
     {{$feedback->id}}
     {{$feedback->landlord_name}}
     {{$feedback->landlord_id}}
     {{$feedback->tenant_name}}
     {{$feedback->tenant_id}}
     {{$feedback->created_at}}
     {{$feedback->overall_rating}}
     {{$feedback->landlord_communication_rating}}

     {{$feedback->issue_resolved_speed_rating}}
     {{$feedback->rent_market_rate}}
     {{$feedback->happy_to_continue_tenancy}}
     {{$feedback->other_comments}}
     {{$feedback->recommend_landlord}}
    </div>
  </div>
  
  </div>
@endsection
