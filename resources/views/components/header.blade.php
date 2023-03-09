<header class="header">
    <nav class="main-tabs">
        <a href="#" class="tab">Главная</a>
        <a href="#" class="tab">Заявки</a>
    @if(Auth::user())
        <a href="#" class="tab">Чат</a>
        <a href="#" class="tab">Онлайн подбор</a>
        <a href="#" class="tab">Для администраторов</a>
    @endif
    </nav>

    @if(Auth::user())
        <nav class="logged-menu">
            <a href="#" class="logout-menu__item"><img id="profile" class="profile" alt="Профиль"></a>
            <a href="#" class="logout-menu__item"><img class="chat" src="https://img.icons8.com/sf-black-filled/64/ef6817/chat-message.png" alt="Чат"></a>
            <a href="#" class="logout-menu__item"><img class="applications" src="https://img.icons8.com/pastel-glyph/64/ef6817/paperwork--v1.png" alt="Ваши заявки"></a>
            <a href="#" class="logout-menu__item"><img class="logout" src="https://img.icons8.com/ios-glyphs/30/ef6817/exit.png" alt="Выход"></a>
        </nav>
    @else
        <nav class="logout-menu">
            <a href="#" class="logout-menu__item">Вход</a>
            <a href="#" class="logout-menu__item">Регистрация</a>
        </nav>
    @endif
</header>
