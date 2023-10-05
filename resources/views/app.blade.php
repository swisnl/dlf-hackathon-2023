<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png?v=1696496390') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png?v=1696496390') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png?v=1696496390') }}">
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest?v=1696496390') }}">
    <link rel="mask-icon" href="{{ asset('favicons/safari-pinned-tab.svg?v=1696496390') }}" color="#22c55e">
    <link rel="shortcut icon" href="{{ asset('favicons/favicon.svg?v=1696496390') }}">
    <meta name="apple-mobile-web-app-title" content="DLF Hackathon 2023">
    <meta name="application-name" content="DLF Hackathon 2023">
    <meta name="msapplication-TileColor" content="#dcfce7">
    <meta name="msapplication-config" content="{{ asset('favicons/browserconfig.xml?v=1696496390') }}">
    <meta name="theme-color" content="#dcfce7">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
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
</body>
</html>
