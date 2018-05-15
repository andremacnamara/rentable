@extends('layouts/main')
@section('title')
  Edit: {{$Advert->address}}
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
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-default">
        <div class="card-header">Edit Your Property</div>
        <div class="card-body">

          <!-- Form for posting the property advert -->

          <form method="POST" action="/property/{{$Advert->id}}">
          {{ csrf_field() }}
          {{ method_field('PUT') }}

            <!-- Row for IMAGE -->

            <div class="form-group row">
              <label for="photo" class="col-md-3 col-form-label text-md-right">Images</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="photo" value={{$Advert->photo}}>
              </div>
            </div>

            <!-- Row for ADDRESS  -->

            <div class="form-group row">
              <label for="address" class="col-md-3 col-form-label text-md-right">Address</label>
              <div class="col-md-9">
                <input id="Address" type="text" class="form-control{{ $errors->has('Address') ? ' is-invalid' : '' }}" name="address"  value="{{$Advert->address }}" required autofocus>
                  @if ($errors->has('Address'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('Address') }}</strong>
                    </span>
                  @endif
              </div>
            </div>

            <!-- Row for COUNTY-->

            <div class="form-group row">
              <label for="county" class="col-md-3 col-form-label text-md-right">County</label>
              <div class="col-md-9">
                <select class ="form-control" id="county" name="county">
                  <!--Gets all counties from DB -->
                  @foreach ($counties as $county)
                    <option {{ $county->name == $Advert->county ? 'selected':'' }}>{{$county->name}}</option>
                  @endforeach
                </select>

                @if ($errors->has('county'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('county') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <!-- Row for TOWNS-->

            <div class="form-group row">
              <label for="town" class="col-md-3 col-form-label text-md-right">town</label>
              <div class="col-md-9">
                <select class="town form-control" name="town" value="{{$Advert->town}}">
                  @foreach ($towns as $town)
                    <option {{ $town->name == $Advert->town ? 'selected':'' }}>{{$town->name}}</option>
                  @endforeach
                </select>
                @if ($errors->has('town'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('town') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <!-- Row for PROPERTY TYPES -->
            <div class="form-group row">
              <label for="type" class="col-md-3 col-form-label text-md-right">Type</label>
              <div class="col-md-9">
                <select class ="form-control" id="type" name="type">
                  @foreach ($types as $type)
                    <option {{ $type->name == $Advert->type ? 'selected':'' }}>{{$type->name}}</option>
                  @endforeach
                </select>
                @if ($errors->has('type'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('type') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <!-- Row for Rent -->

            <div class="form-group row">
              <label for="rent" class="col-md-3 col-form-label text-md-right">Rent</label>
              <div class="col-md-9">
                <input id="rent" type="text" class="form-control{{ $errors->has('rent') ? ' is-invalid' : '' }}" name="rent" value="{{$Advert->rent}}" required autofocus>
                  @if ($errors->has('rent'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('rent') }}</strong>
                    </span>
                  @endif
                </div>
            </div>

            <!-- Row for Availability -->

            <div class="form-group row">
              <label for="availability" class="col-md-3 col-form-label text-md-right">Availability:</label>
              <div class="col-md-9">
                <input class="form-control" type="date" name="date" value="{{$Advert->date}}" id="availability">
              </div>
            </div>

            <!-- Row for BEDROOMS -->

            <div class="form-group row">
              <label for="bedrooms" class="col-md-3 col-form-label text-md-right">Bed</label>
              <div class="col-md-9">
                <select class ="form-control" id="bedrooms" name="bedrooms" value="{{$Advert->bedrooms}}">
                  @foreach ($specs as $spec)
                    <option {{ $spec->bedrooms == $Advert->bedrooms ? 'selected':'' }}>{{$spec->bedrooms}}</option>
                  @endforeach
                </select>
                @if ($errors->has('bedrooms'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('bedrooms') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <!-- Row for Bathrooms -->
            <div class="form-group row">
              <label for="Bathrooms" class="col-md-3 col-form-label text-md-right">Bath</label>
              <div class="col-md-9">
                <select class ="form-control" id="Bathrooms" name="bathrooms" value="{{$Advert->bathrooms}}">
                  @foreach ($specs as $spec)
                    <option {{ $spec->bathrooms == $Advert->bathrooms ? 'selected':'' }}>{{$spec->bathrooms}}</option>
                  @endforeach
                </select>
                @if ($errors->has('Bathrooms'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('Bathrooms') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <!-- Row for FURNISHED -->

            <fieldset class="form-group">
              <legend class="col-md-3 col-form-label text-md-right">Furnished</legend>
              <div class="col-md-9">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="furnished" id="optionsRadios1" value="Yes"
                      {{$Advert->furnished == 'Yes' ? 'checked' : '' }} >
                      Yes
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="furnished" id="optionsRadios1" value="No"
                      {{$Advert->furnished == 'No' ? 'checked' : '' }} >
                      No
                  </label>
                </div>
              </div>
            </fieldset>

            <!-- Row for Description -->

            <div class="form-group row">
              <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>
                <textarea class="form-control col-md-9" name="description" id="description" rows="5">{{$Advert->description}}</textarea>
            </div>

            <!-- Row for BUTTON -->

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Save Advert
                </button>
              </div>
            </div>
          </form>
        </div><!-- ./ CARD BODY-->
      </div> <!-- ./ CARD -->
    </div> <!-- ./ COL-8 -->
  </div> <!-- ./ ROW -->
</div> <!-- ./ Container-->


<!-- =============== JAVASCRIPT =============== -->

<!--
    Typeahead for TOWNS
    https://itsolutionstuff.com/post/laravel-5-dynamic-autocomplete-search-using-select2-js-ajax-part-2example.html
-->
  <script type="text/javascript">
    $('.town').select2({
      placeholder: 'Select an item',
        ajax: {
          url: '/townsearch',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                return {
                  text: item.name,
                  id: item.name
                }
              });
            };
          },
        cache: true
      }
    });
  </script>
@endsection
