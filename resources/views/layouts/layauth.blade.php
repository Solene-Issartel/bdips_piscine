   <!DOCTYPE html> 
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Quicksand font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <script src="{{ asset('js/appjs.js') }}"></script>
    <!-- Title -->
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="icon" type="image/png" href="../public/img/dice.png">
    <!-- JS -->
    <script src="{{ asset('../resources/assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('../resources/assets/js/bootstrap.min.js') }}"></script>
  </head> 

  <body>
     @yield('content')
  </body>
</html>
