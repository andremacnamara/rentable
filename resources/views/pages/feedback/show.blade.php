@extends('layouts/main')
@section('title')
  Feedback No: - {{$feedback->id}}
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center text-center">
      <div class="col-md-8">
        <div class="card card-default border-shadow">
          <div class="card-header">Feedback survey ID: {{$feedback->id}}. Taken by {{$feedback->tenant_name}} for {{$feedback->landlord_name}} </div>
          <div class="card-body">
          
            {{-- Q1 --}}
            <div class="row">
              <div class="col-md-12">
                <label for="overall" class="label">Q1. How is the tenancy overall?</label>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 content" name="overall">
                {{$feedback->overall_rating}}
              </div>
            </div>

            {{-- Q2 --}}
            <div class="row mt-4">
              <div class="col-md-12">
                  <label for="communication" class="label">Q2. How is the landlords communication</label>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12 content" name="communication">
                {{$feedback->landlord_communication_rating}} 
              </div>
            </div>

            {{-- Q3 --}}
            <div class="row mt-4">
              <div class="col-md-12">
                  <label for="issue_resolution" class="label">Q3. How would you rate response time to maintainece issues</label>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12 content" name="issue_resolution">
                {{$feedback->issue_resolved_speed_rating}} 
              </div>
            </div>

            {{-- Q4 --}}
            <div class="row mt-4">
              <div class="col-md-12">
                  <label for="rent" class="label">Q4. How does the rent reflect the quality of the property</label>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12 content" name="rent">
                {{$feedback->rent_market_rate}}
              </div>
            </div>

            {{-- Q5 --}}
            <div class="row mt-4">
              <div class="col-md-12">
                  <label for="happy" class="label">Q5. Are you happy to continue this tenancy</label>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12 content" name="happy">
                {{$feedback->happy_to_continue_tenancy}}
              </div>
            </div>

            {{-- Q6 --}}
            <div class="row mt-4">
              <div class="col-md-12">
                  <label for="recommend_landlord" class="label">Q6. Would you recommend this landlord to a friend</label>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12 content" name="recommend_landlord">
                {{$feedback->recommend_landlord}}
              </div>
            </div>

            {{-- Q7 --}}
            <div class="row mt-4">
              <div class="col-md-12">
                  <label for="other" class="label">Any Other Comments</label>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12 content" name="other">
                {{$feedback->other_comments}}
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
