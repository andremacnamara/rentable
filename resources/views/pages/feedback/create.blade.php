@extends('layouts/main')
@section('title')
  Leave Your Feedback
@endsection

@section('content')
    @if ($errors->any())
        <div class="row mx-auto text-center">
        <div class="col-md-12">
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        </div>
        </div>
    @endif
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <span class="h4">Please fill in the following survey</span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-default mt-4 mb-4">
                    <div class="card-header">#</div>
                    <div class="card-body">
                        <form method="POST" action="/feedback">
                            {{ csrf_field() }}

                            {{-- Basic Deatils --}}
                            <div class="row text-center mb-4">
                                <div class="col-md-12">
                                    <span class="lead"><strong>Tenancy Deatils</strong></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="landlord_name" class="col-md-3 col-form-label text-md-right">Landlord Name</label>
                                <div class="col-md-9">
                                    <select class ="form-control" id="landlord_name" name="landlord_name">
                                        @foreach ($tenancy as $landlord)
                                            <option>{{$landlord->landlord_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @foreach ($tenancy as $landlord)
        <input name="landlord_id" type="hidden" value="{{$landlord->landlord_id}}" readonly>
    @endforeach
                            
                            <div class="form-group row">
                                <label for="property_address" class="col-md-3 col-form-label text-md-right">Property Address</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="property_address" name="property_address">
                                        @foreach ($tenancy as $property)
                                            <option>{{$property->property_address}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="tenant_name" class="col-md-3 col-form-label text-md-right">Tenant Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="tenant_name" name="tenant_name">
                                        @foreach ($tenancy as $tenant)
                                            <option>{{$tenant->tenant_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            {{-- Questions --}}

                            <div class="row text-center mb-4">
                                <div class="col-md-12">
                                    <span class="lead"><strong>Feedback Questions</strong></span>
                                </div>
                            </div>

                            {{-- Question 1 --}}

                            <div class="row text-center mb-3">
                                <div class="col-md-12">
                                    <span class="text-muted">Q1. How is the tenancy overall?</span>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-md-12">
                                    @foreach($options as $option)
                                        <label class="checkbox-inline col-md-3"><input type="checkbox" name="overall_tenancy" value="{{$option->rate1}}">{{$option->rate1}}</label>
                                    @endforeach
                                </div>
                            </div><hr>

                            {{-- Question 2 --}}

                            <div class="row text-center mt-4 mb-4">
                                <div class="col-md-12">
                                    <span class="text-muted">Q2. How is the landlords communication</span>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-md-12">
                                    @foreach($options as $option)
                                        <label class="checkbox-inline col-md-3"><input type="checkbox" name="landlord_communication" value="{{$option->rate1}}">{{$option->rate1}}</label>
                                    @endforeach
                                </div>
                            </div><hr>

                            {{-- Question 3 --}}

                            <div class="row text-center mt-4 mb-4">
                                <div class="col-md-12">
                                    <span class="text-muted">Q3. How would you rate response time to maintainece issues</span>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-md-12">
                                    @foreach($options as $option)
                                        <label class="checkbox-inline col-md-3"><input type="checkbox" name="maintainence_response" value="{{$option->rate1}}">{{$option->rate1}}</label>
                                    @endforeach
                                </div>
                            </div><hr>

                            {{-- Question 4 --}}

                            <div class="row text-center mt-4 mb-4">
                                <div class="col-md-12">
                                    <span class="text-muted">Q4. How does the rent reflect the quality of the property</span>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-md-12">
                                    @foreach($options2 as $option2)
                                        <label class="checkbox-inline col-md-6"><input type="checkbox" name="rent_reflect" value="{{$option2->rent}}">{{$option2->rent}}</label>
                                    @endforeach
                                  </div>
                            </div><hr>

                            {{-- Question 5 --}}

                            <div class="row text-center mt-4 mb-4">
                                <div class="col-md-12">
                                    <span class="text-muted">Q5. Would you reccomened this landlord/property to a friend.</span>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-md-12">
                                    @foreach($options2 as $option)
                                        <label class="checkbox-inline col-md-6"><input type="checkbox" name="refer" value="{{$option->YN}}">{{$option->YN}}</label>
                                    @endforeach
                                </div>
                            </div><hr>

                            {{-- Question 6 --}}

                            <div class="row text-center mt-4 mb-4">
                                <div class="col-md-12">
                                    <span class="text-muted">Q6. Are you happy to continues this tenancy?</span>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-md-12">
                                    @foreach($options2 as $option)
                                        <label class="checkbox-inline col-md-6"><input type="checkbox" name="happy_continue" value="{{$option->YN}}">{{$option->YN}}</label>
                                    @endforeach
                                   </div>
                            </div><hr>

                            {{-- Question 7 --}}

                            <div class="row text-center mt-4 mb-4">
                                <div class="col-md-12">
                                    <span class="text-muted">Q7. Any other comments.</span>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
                                </div>
                            </div><hr>

                            {{-- BUtton --}}
                            <div class="row text-center">
                                <div class="col-md-6  offset-md-3">
                                    <button type="submit" class="btn btn-primary">
                                    Submit
                                    </button>
                                </div>
                            </div>
                            

    @foreach ($tenancy as $Tenant)
        <input name="tenant_id" type="hidden" value="{{$landlord->tenant_id}}" readonly>
    @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--

    

--}}