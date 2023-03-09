@extends('layout')

@section('title', 'Заявка №')

@section('page-content')
    <h2 class="title">Заголовок заявки</h2>
    <div class="request-profile">
        <div class="request-info">
            <div class="user-graph">
                <div class="user-imgs">
                    <img class="user-avatar" src="/resources/images/qrcode%20(4).png" alt="avatar" />
                    <img class="user-flag" src="https://countryflagsapi.com/png/ru" alt="Russian Federation flag" />
                </div>
                <a href="#" class="request-game">Game</a>
            </div>
            <div class="request-text">
                <p class="request-description">dsgcvsghdcv ghsdv sdhgv chsjgdv sjhgd vcsjhgd vcshgkjd cvksjdh csdkghfc ksuyrf cgskhd vcsgkhd sjdhkvc skdcv shdcv sjdhgcv sjhdc sjdhgc sdjhgc sdvhgc</p>
                <div class="user-steam">
                    <img src="/resources/images/icons8-steam.svg" alt="steam icon"/>
                    <a class="user-steam--link" href="https://steamcommunity.com/profiles/76561199049415797/">Ссылка на профиль стим</a>
                </div>
                <div class="user-discord">
                    <img src="/resources/images/icons8-discord.svg" alt="discord icon"/>
                    <p class="user-discord--link">Черный Кот Из Майнкрафта#1603</p>
                </div>
            </div>
        </div>
        <div class="buttons">
            <a class="button" href="#">Написать сообщение</a>
            <a class="button" href="#">Удалить</a>
        </div>
    </div>
@endsection
