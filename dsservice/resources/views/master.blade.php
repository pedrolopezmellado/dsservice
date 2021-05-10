<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<head>
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="header">
            @yield('head')
        </div>

        <div class="container">
            @yield('search')
        </div>
        
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>