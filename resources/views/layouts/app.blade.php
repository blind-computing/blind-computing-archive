<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials._head')
    <title>@yield('title') | {{ config('app.name', 'Blind Computing') }}</title>
</head>

<body class="text-left">
    @include('partials._nav')
    <main class="container-fluid">
        @include('partials._messages')
        @yield('content')
    </main>
</body>

</html>
