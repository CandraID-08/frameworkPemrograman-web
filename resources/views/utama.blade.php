
<html>
<head>
    <!-- <link href="public/css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <p>ini adalah navbar</p>
    </nav>
    @yield('judul_menu')

    <div>
            @yield('isi_menu')
    </div>
    
</body>
</html>