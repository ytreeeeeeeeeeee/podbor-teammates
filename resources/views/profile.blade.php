@extends('layout')

@section('title', $profile->name)

@section('page-content')
    <div class="alert" @error('avatar')data-error="{{json_encode($errors->first('avatar'))}}" @enderror></div>
    <h2 class="title">{{$profile->name}}</h2>
    <div class="user-profile">
        <div class="user-info">
            <div class="user-graph">
                <div class="user-imgs">
                    <img class="user-avatar" src="{{asset($profile->avatar)}}" alt="avatar"/>
                    <img class="user-flag" src="https://www.countryflagicons.com/FLAT/64/{{$profile->country}}.png" alt="flag"/>
                </div>
                <div class="user-categories">
                    <p class="user-role">{{$profile->role->title}}</p>
                    <p class="user-status">{{$profile->status->title}}</p>
                </div>
            </div>
            <div class="user-text">
                <p class="user-description">{{$profile->description}}</p>
                @if($profile->steam_link)
                    <div class="user-steam">
                        <img src="/resources/images/icons8-steam.svg" alt="steam icon"/>
                        <a class="user-steam--link" href="{{$profile->steam_link}}">Ссылка на профиль стим</a>
                    </div>
                @endif
                @if($profile->discord_link)
                    <div class="user-discord">
                        <img src="/resources/images/icons8-discord.svg" alt="discord icon"/>
                        <p class="user-discord--link">{{$profile->discord_link}}</p>
                    </div>
                @endif
            </div>
        </div>
        @if(Auth::user())
            <div class="buttons">
                @if(Auth::user()->isAdmin() && $profile->status->id === 1)
                    <form action="{{route('profile-decision', ['id' => $profile->id])}}" method="post" autocomplete="off">
                        @csrf
                        <button type="submit" class="approve button" name="action" value="approve">Подтвердить</button>
                        <button type="submit" class="ban button" name="action" value="ban">Заблокировать</button>
                    </form>
                @else
                    @if(Auth::user()->id != $profile->id && $profile->status->id === 2)
                        <form action="{{route('add-chat', ['id' => $profile->id])}}" method="post" autocomplete="off">
                            @csrf
                            <a class="button" onclick="this.parentNode.submit()">Написать сообщение</a>
                        </form>
                    @else()
                        <a class="button edit-button">Редактировать</a>
                    @endif
                @endif
            </div>
        @endif
    </div>

    @if(Auth::user() && Auth::user()->id == $profile->id)
        <x-modal-edit-profile :profile="$profile"></x-modal-edit-profile>
    @endif

    <x-error-alert></x-error-alert>
@endsection

@section('scripts')
    <script type="text/javascript" src="/public/js/signup.js"></script>
    <script type="text/javascript" src="/public/js/handleErrors.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/public/js/modalWindow.js"></script>
@endsection
