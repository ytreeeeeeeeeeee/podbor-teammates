@extends('layout')

@section('title', $profile->name)

@section('page-content')
    <h2 class="title">{{$profile->name}}</h2>
    <div class="user-profile">
        <div class="user-info">
            <div class="user-graph">
                <div class="user-imgs">
                    <img class="user-avatar" src="{{$profile->avatar}}" alt="avatar"/>
                    <img class="user-flag" src="https://www.countryflagicons.com/FLAT/64/RU.png" alt="flag"/>
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
        <div class="buttons">
            <a class="button" href="#">Написать сообщение</a>
            @if(Auth::user()->id == $profile->id)
                <a class="button" href="#">Редактировать</a>
            @endif
            <a class="button" href="#">Удалить</a>
        </div>
    </div>

@endsection
