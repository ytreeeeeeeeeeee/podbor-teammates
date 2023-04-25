<header class="header">
    <nav class="main-tabs">
        <a href="{{route('main-page')}}" class="tab underline">Главная</a>
        <a href="{{route('all-requests')}}" class="tab underline">Заявки</a>
        <a href="{{route('games')}}" class="tab underline">Игры</a>
    @if(Auth::user())
        <a href="{{route('add-req')}}" class="tab underline">Создать заявку</a>
        <a href="{{route('online')}}" class="tab underline">Онлайн-подбор</a>
    @endif
    </nav>

    @if(Auth::user())
        <nav class="logged-menu">
            <div href="{{route('profile', ['id' => Auth::user()->id])}}" class="logged-menu--item profile-container">
                <img src="{{asset(Auth::user()->avatar)}}" id="profile" class="profile" alt="Профиль" />
                <div class="profile-info">
                    <a href="{{route('profile', ['id' => Auth::user()->id])}}" class="admin-nickname">{{Auth::user()->name}}</a>
                    @if(Auth::user()->isAdmin())
                        <a href="{{route('admin-panel')}}" class="admin-button">Панель администратора</a>
                    @endif
                </div>
            </div>

            <a href="{{route('chat', ['activeChat' => -1])}}" class="logged-menu--item"><img class="chat-button" src="https://img.icons8.com/sf-black-filled/250/e68a01/chat-message.png" alt="Chat"/></a>
            <a href="{{route('my-requests')}}" class="logged-menu--item"><img class="requests" src="https://img.icons8.com/material/250/e68a01/application-form.png" alt="My-requests"/></a>
            <a href="{{route('logout')}}" class="logged-menu--item"><img class="logout" src="https://img.icons8.com/ios-glyphs/250/e68a01/exit.png" alt="Выход" /></a>
        </nav>
    @else
        <nav class="logout-menu">
            <a href="{{route('reg-auth', ['tab' => 'login'])}}" class="logout-menu__item underline">Вход</a>
            <a href="{{route('reg-auth', ['tab' => 'signup'])}}" class="logout-menu__item underline">Регистрация</a>
        </nav>
    @endif
</header>
