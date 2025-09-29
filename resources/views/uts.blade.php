<!DOCTYPE html>
<html lang="en">
<head>
    <title>UTS - @yield('title')</title>
</head>
<body>
    <header>
        @yield('header')

    <nav>
        @yield('navigation')
    </nav>
    </header>
    
    <div>
        @yield('content')
    </div>

    <footer>
        @yield('footer')
    </footer>
</body>
</html>