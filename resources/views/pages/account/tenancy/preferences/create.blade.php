@extends('layouts/main')
@section('title')
  Create a Tenancy
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
        <h3>Specifiy your property preferences</h3>
        <span>This will be used for the following......</span><br>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="box">
                    <div class="row">
                        <div class="col-md-10">
                            <form action="/account/preferance" method="POST">
                                {{ csrf_field() }}

                                {{-- County Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="county">County</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <select class="form-control" id="county" name="county">
                                            @foreach ($counties as $county)
                                                <option value="{{$county->name}}">{{$county->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Property Type Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="type">Type</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <select class="form-control" id="type" name="type">
                                            @foreach ($propertyType as $type)
                                                <option value="{{$type->name}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Rent Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="rent">Max rent you can pay</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <input id="rent" type="text" class="form-control{{ $errors->has('rent') ? ' is-invalid' : '' }}" name="rent" value="{{ old('rent') }}" required autofocus>
                                    </div>
                                </div>

                                {{-- Bedroom Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="bedrooms">Minimum bedrooms</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <select class ="form-control" id="bedrooms" name="bedrooms">
                                            @foreach ($specs as $bedroom)
                                                <option>{{$bedroom->bedrooms}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Bathroom Row --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="bathrooms">Minimum bathrooms</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <select class ="form-control" id="bathrooms" name="bathrooms">
                                            @foreach ($specs as $bathroom)
                                                <option>{{$bathroom->bathrooms}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button class="mt-2 btn btn-primary" type="submit">Submit Preferances</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection