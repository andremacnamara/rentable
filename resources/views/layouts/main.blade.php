<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css"> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>

  </head>
  <body>
    <header>
      <div class="container mb-4">


        <ul class="nav">
          <li class="nav-item title">
            <a class="nav-link" href="/">Rentable</a>
          </li>
          @guest
            <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login">Login</a>
            </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="/property/advertise/create">Advertise</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/search">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user/search">Search for tenant</a>
          </li>
          
          <li class="nav-item dropdown name">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">{{Auth::user()->name}}</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/account/{{Auth::user()->id}}">My Profile</a>
                <a class="dropdown-item" href="/watchlist">Watchlist</a>
                <a class="dropdown-item" href="/feedback">Tenant Feedback</a>
                <a class="dropdown-item" href="/expenses">Expense Tracker</a>
                <a class="dropdown-item" href="/messages/index">Message Center</a>
                <a class="dropdown-item" href="/expenseclaim/home">Claim a Expense Back</a>
                <a class="dropdown-item" href="/preferance">Set Preferences</a>
                
                <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               {{ csrf_field() }}
               
           </form>
           
              </div>
          </li>

        @endguest
        </ul>
      </div>
      
    </header>
    <div class="container">
      <div class="text-center">
        @include('flash::message')
      </div>
    </div>
    @yield('content')
  </body>
</html>
