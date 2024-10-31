<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    {{-- @vite(['resources/js/app.js', 'recources/css/app.css']) --}}
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <div id="app">
        <router-view></router-view>
    </div>
</body>

</html>
