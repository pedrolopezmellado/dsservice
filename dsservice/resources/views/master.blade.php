<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="header">
            @yield('head')
        </div>

        <div class="searcher">
            @yield('search')
        </div>
        
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>