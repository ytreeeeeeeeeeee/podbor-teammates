<header class="header">
    <nav class="main-tabs">
        <a href="{{route('main-page')}}" class="tab">Главная</a>
        <a href="{{route('all-requests')}}" class="tab">Заявки</a>
    @if(Auth::user())
        <a href="#" class="tab">Онлайн подбор</a>
        <a href="#" class="tab">Для администраторов</a>
    @endif
    </nav>

    @if(Auth::user())
        <nav class="logged-menu">
            <a href="{{route('profile', ['id' => 1])}}" class="logged-menu--item"><img src="{{}}" id="profile" class="profile" alt="Профиль" /></a>
            <a href="#" class="logged-menu--item"><img class="chat" src="https://img.icons8.com/sf-black-filled/250/e68a01/chat-message.png" alt="Chat"/></a>
            <a href="{{route('my-requests')}}" class="logged-menu--item"><img class="requests" src="https://img.icons8.com/material/250/e68a01/application-form.png" alt="My-requests"/></a>
            <a href="{{route('logout')}}" class="logged-menu--item"><img class="logout" src="https://img.icons8.com/ios-glyphs/250/e68a01/exit.png" alt="Выход" /></a>
        </nav>
    @else
        <nav class="logout-menu">
            <a href="{{route('reg-auth') . "?tab=login"}}" class="logout-menu__item">Вход</a>
            <a href="{{route('reg-auth') . "?tab=signup"}}" class="logout-menu__item">Регистрация</a>
        </nav>
    @endif
</header>
