<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    @yield('css')
</head>
<body class="">
    <nav class="overflow-hidden navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{url('/allusers')}}">Home</a>
            <ul class="navbar-nav mx-5 w-50 d-flex justify-content-between" >
                @guest
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                  </li>
                @endguest
                  @auth
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/me') }}">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/pending/'.Auth::user()->id) }}">Pending messages</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                  </li>
                  @endauth

            </ul>
        </div>
    </nav>
    <div class="overflow-hidden">
    @yield('main')
    </div>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @yield('js')
</body>
</html>
