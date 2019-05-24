<!DOCTYPE html>
<head>
    <title>Book Store</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
        .books {
            display: flex;
            flex-wrap: wrap;
            margin-top: 30px;
            justify-content: center;
        }

        img {
            width: 180px;
            height: 230px;
        }

        header {
            margin-bottom: 20px;
        }

        .book-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 15pt;
        }

        .book-item {
            border-top: 1px solid grey;
            margin-bottom: 3%;
            padding: 7px;
            display: grid;
            grid-template-rows: 1fr;
            grid-template-columns: 21% 79%;
        }

        .book-item:first-child {
            margin-top: 30px;
        }

        #select-tag {
            width: auto;
        }

        #search, #inputGroupSelect04 {
            margin-left: 50px;
            background-color: transparent;
            color: #17a2b8;
            border-color: #17a2b8;
        }

        #search::-webkit-input-placeholder {
            color: #17a2b8;
        }

        .pagination-page {
            width: max-content;
            margin: 20px auto;
        }

        .pag {
            border-top: 1px solid grey;
        }

        a.page-link {
            display: inline-block;
        }

        a.page-link:hover {
            background-color: #007BFF;
            color: wheat;
        }

        #choose {
            margin-left: 10px;
        }

        .my-breadcrumb {
            padding: 8px 15px;
            margin-bottom: 20px;
            list-style: none;
            background-color: #f5f5f5;
            border-radius: 10px;
            border: 1px solid lightsteelblue;
        }

        .my-breadcrumb > li {
            display: inline-block;
        }

        .my-breadcrumb > .active-book {
            color: #777;
        }

        #my-footer {
            border-top: 1px solid gray;
            padding: 10px;
        }

        #but {
            width: 180px;
            float: left;
        }

        .title-color {
            color: #007bff;
        }

        .sort-items-desc {
            color: black;
            margin-right: 10px;
        }

        .sort-items {
            padding: 8px 15px;
            margin-bottom: 20px;
            list-style: none;
            background-color: #f5f5f5;
            border-radius: 10px;
            border: 1px solid lightsteelblue;
            font-family: 'Montserrat', sans-serif;
            font-size: 12pt;
        }

        .sort-tags {
            font-weight: bold;
            text-transform: uppercase;
        }

        #my-icon {
            margin-right: 10px;
        }

        #find-name, #find-price, #find-tag {
            font-size: 11pt;
        }

        #find-price:hover {
            background-color: #17a2b8;
        }

        #find-name:hover {
            background-color: #17a2b8;
        }

        .for-all-tags, .for-sort-items {
            display: grid;
            grid-template-rows: 1fr;
            grid-template-columns: 13% 87%;
        }

        .for-sort-items {
            margin-bottom: 25px;
        }

        #find-tag:hover {
            background-color: #343a40;
        }

        #search-by-tag {
            margin: 0;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('books') }}">
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