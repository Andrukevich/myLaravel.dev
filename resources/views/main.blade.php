<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Ничего не пришло')</title>
</head>
<body>
    <header>
        <ul>
            <li>link 1</li>
            <li>link 2</li>
            <li>link 3</li>
            <li>link 4</li>
            <li>link 5</li>
        </ul>
    </header>

    <div class="content">
        @yield('content')
    </div>

    <footer>
        <p>footer</p>
    </footer>

    @section('footer.script')
        <script src="/js/app.js"></script>
    @show
</body>
</html>