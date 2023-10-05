<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Include your CSS files here -->
{{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    @vite(['resources/scss/app.scss'])
</head>
<body>
<header>
    <!-- Your header content goes here -->
</header>

<nav>
    <!-- Your navigation menu goes here -->
</nav>

<main>
    @yield('content')
</main>

<footer>
    <!-- Your footer content goes here -->
</footer>

<!-- Include your JavaScript files here -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
