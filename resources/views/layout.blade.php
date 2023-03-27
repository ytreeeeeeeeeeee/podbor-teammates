<!DOCTYPE html>
<html lang="ru">
<head>
    @section('head')
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <link type="text/css" rel="stylesheet" href="/resources/css/app.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="/resources/css/style.css">
        <link type="text/css" rel="stylesheet" href="/resources/css/chat.css">
    @show
</head>
<body>
    <x-header></x-header>
    <main @yield('class')>
        @yield('page-content')
    </main>
    <x-footer></x-footer>
    <script type="module" src="/resources/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    @yield('scripts')
</body>
</html>
