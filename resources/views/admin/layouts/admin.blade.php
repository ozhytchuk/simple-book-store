<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        h1 {
            margin-bottom: 20px;
            padding-bottom: 9px;
            border-bottom: 1px solid #eee;
        }

        .sidebar {
            position: fixed;
            top: 51px;
            bottom: 0;
            left: 0;
            z-index: 1000;
            padding: 20px;
            overflow-x: hidden;
            overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
            border-right: 1px solid #eee;
        }

        .sidebar {
            padding-left: 0;
            padding-right: 0;
        }

        .sidebar .nav {
            margin-bottom: 20px;
        }

        .sidebar .nav-item {
            width: 100%;
        }

        .sidebar .nav-item + .nav-item {
            margin-left: 0;
        }

        .sidebar .nav-link {
            border-radius: 0;
        }

        .placeholders {
            padding-bottom: 3rem;
        }

        .placeholder img {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        #edit-icon {
            margin-left: 20%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <a class="navbar-brand" href="{{ route('admin') }}">Dashboard</a>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-sm-2 col-md-2 hidden-xs-down bg-faded sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tags</a>
                </li>
            </ul>

        </nav>

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
            @yield('content')
        </main>
    </div>
</div>
</body>
<script src="https://kit.fontawesome.com/de9bf0c327.js"></script>
</html>

