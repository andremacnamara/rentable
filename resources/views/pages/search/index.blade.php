@extends('layouts/main')
@section('title')
  Search for a property
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
  <div class="card">
    <form method="GET" action="/search/results" enctype="m">
      {{ csrf_field() }}
      <div class="card-header">Search for a Property</div>
        <div class="card-body">

          <!-- County and Town Label-->
          <div class="row">
            <div class="col-md-6">
              <label class="ml-1" for="county">County</label>
            </div>
            <div class="col-md-6">
              <label for="town">Town</label>
            </div>
          </div>

          <div class="row">
          <!-- County Column -->
            <div class="col-md-6">
              <select class ="form-control" id="county" name="county">
                <!--Gets all counties from DB -->
                  @foreach ($county as $counties)
                    <option>{{$counties->name}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <select class="form-control" name="town">
              @foreach ($towns as $town)
                    <option>{{$town->name}}</option>
                  @endforeach
              </select>
            </div>
          </div> <!-- ./Row2 -->

          <!-- Bed and Bath Label-->
          <div class="row mt-md-4">
            <div class="col-md-3">
              <label class="ml-1" for="min-bedrooms">Min Bed</label>
            </div>
            <div class="col-md-3">
              <label for="max-bedrooms">Max Bed</label>
            </div>
            <div class="col-md-3">
              <label class="ml-1" for="min-bathrooms">Min Bath</label>
            </div>
            <div class="col-md-3">
              <label for="max-bathrooms">Max Bath</label>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <select class ="form-control" id="min-bedrooms" name="min-bedrooms">
                @foreach ($specs as $bedroom)
                  <option>{{$bedroom->bedrooms}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <select class ="form-control" id="max-bedrooms" name="max-bedrooms">
                @foreach ($specs as $bedroom)
                  <option>{{$bedroom->bedrooms}}</option>
                @endforeach
              </select>
            </div>

              <div class="col-md-3">
                <select class ="form-control" id="min-bathrooms" name="min-bathrooms">
                  @foreach ($specs as $bathroom)
                    <option>{{$bathroom->bathrooms}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3">
                <select class ="form-control" id="max-bathrooms" name="max-bathrooms">
                  @foreach ($specs as $bathroom)
                    <option>{{$bathroom->bathrooms}}</option>
                  @endforeach
                </select>
              </div>
            </div> <!-- ./Row2 -->

            <!-- Bed and Bath Label-->
            <div class="row mt-md-4">
              <div class="col-md-3">
                <label class="ml-1" for="min-rent">Min Rent</label>
              </div>
              <div class="col-md-3">
                <label for="max-rent">Max Rent</label>
              </div>
              <div class="col-md-6">
                <label class="ml-1" for="type">Property Type</label>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <input type="text" class="form-control" id="" name="min-rent">
              </div>
              <div class="col-md-3">
                <input type="text" class="form-control" id="max-rent" name="max-rent">
              </div>
              <div class="col-md-6">
                <select class ="form-control" id="type" name="type">
                  @foreach ($types as $type)
                    <option>{{$type->name}}</option>
                  @endforeach
                </select>
              </div>
            </div><!-- ./row3 -->
            <div class="row mt-md-4">
                <div class="col-md-4">
                    <button type="submit" class="form-control btn btn-primary">
                        Search
                    </button>
                </div>
            </div>
          </div> <!-- ./Card Body -->
      </form>
    </div><!-- ./Card -->
  </div><!-- ./Container -->

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
                }})};},
      cache: true
    }});
</script>
@endsection
