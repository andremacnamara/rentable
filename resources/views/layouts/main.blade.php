<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
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
                <a class="dropdown-item" href="#">Expense Tracker</a>
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
    @yield('content')
  </body>
</html>
