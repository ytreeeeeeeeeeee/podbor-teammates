<!DOCTYPE html>
<html lang="ru">
<head>
    @section('head')
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <link href="/resources/css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/resources/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    @show
</head>
<body>
    <x-header></x-header>
    <main @yield('class')>
        @yield('page-content')
    </main>
    <x-footer></x-footer>
<script type="text/javascript" src="/resources/js/app.js"></script>
<script type="text/javascript" src="/resources/js/signup.js"></script>
</body>
</html>
