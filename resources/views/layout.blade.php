<!DOCTYPE html>
<html lang="ru">
<head>
    @section('head')
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/public/css/app.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/public/css/style.css">
        <link rel="stylesheet" href="/public/css/chat.css">
    @show
</head>
<body>
    <x-header></x-header>
    <main @yield('class')>
        @if(Auth::check())
            <div class="user-all-info" data-user-info="{{json_encode(Auth::user()->id)}}"></div>
        @endif
        @yield('page-content')
    </main>
    <x-footer></x-footer>
    <script type="text/javascript" src="/public/js/app.js"></script>
    @if(Auth::check())
        @vite('public/js/handleNotifications.js')
        <script type="text/javascript" src="/public/js/onlyAuthorized.js"></script>
    @endif
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    @yield('scripts')
</body>
</html>
