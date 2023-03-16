@extends('layout')

@section('title', 'Заявка №' . $req->id)

@section('page-content')
    <h2 class="title">{{$req->title}}</h2>
    <div class="request-profile">
        <div class="request-info">
            <div class="user-graph">
                <a class="user-imgs" href="{{route('profile', ['id' => $author->id])}}">
                    <img class="user-avatar" src="{{$author->avatar}}" alt="avatar"/>
                    <img class="user-flag" src="https://www.countryflagicons.com/FLAT/64/RU.png" alt="flag"/>
                </a>
                <a href="{{route('game-reqs', ['id' => $game->id])}}" class="request-game">{{$game->title}}</a>
            </div>
            <div class="request-text">
                <p class="request-description">{{$req->description}}</p>
                @if($author->steam_link)
                    <div class="user-steam">
                        <img src="/resources/images/icons8-steam.svg" alt="steam icon"/>
                        <a class="user-steam--link" href="{{$author->steam_link}}">Ссылка на профиль стим</a>
                    </div>
                @endif
                @if($author->discord_link)
                    <div class="user-discord">
                        <img src="/resources/images/icons8-discord.svg" alt="discord icon"/>
                        <p class="user-discord--link">{{$author->discord_link}}</p>
                    </div>
                @endif
            </div>
        </div>
        @if(Auth::user())
            <div class="buttons">
                @if(Auth::user()->id != $author->id)
                    <a class="button" href="#">Написать сообщение</a>
                @else
                    <a class="button" href="#">Удалить</a>
                @endif
            </div>
        @endif
    </div>
@endsection
