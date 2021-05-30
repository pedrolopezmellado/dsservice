<html>


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

        <div class="containter">
            @yield('footer')
        </div>
    </body>
</html>