<!DOCTYPE html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body class="@yield('page_name')_page">
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i id="my-icon" class="fas fa-book-open"></i>Book store
            </a>
            <div class="input-group" id="select-tag">
                <form action="{{ route('search') }}" class="form-inline" method="get">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"
                           name="q"
                           id="search" required>
                    <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    @yield('content')
</div>
<footer class="footer" id="my-footer">
    <div class="container">
        <p class="text-muted">© Company, Inc.</p>
    </div>
</footer>
</body>
</html>