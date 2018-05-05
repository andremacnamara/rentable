@extends('layouts/main')
@section('title')
  Chart
@endsection

@section('content')
<!DOCTYPE html>

  <div>{!! $chart->container() !!}</div>

 <script src="path/to/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
 {!! $chart->script() !!}

@endsection
