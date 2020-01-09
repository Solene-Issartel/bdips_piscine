<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <script src="https://kit.fontawesome.com/e92a38100d.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/appjs.js') }}"></script>
    <script src="{{ asset('../resources/assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('../resources/assets/js/bootstrap.min.js') }}"></script>
    <link rel="icon" type="image/png" href="../public/img/dice.png">
  </head>


  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light sticky-top" style="background-color: #ffffff">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-dice-d6"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>     
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="{{ url('/home') }}" class="nav-link strong">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/user') }}">User</a>
            </li>
            @if(Auth::user()->isAdmin())
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/subject') }}">Subjects</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/session') }}">Session</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/users_list') }}">Students</a>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/session_user') }}">Session</a>
              </li>
            @endif

            <li class="nav-item">
              <a class="nav-link" href="{{ url('/stats') }}">Stats</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 Log out
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </div>   
      </div>     
    </nav>
    @yield('content')


</body>
</html>
