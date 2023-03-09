@extends('layout')

@section('title', 'Главная')

@section('page-content')
    <h2 class="title">Никнейм</h2>
    <div class="user-profile">
        <div class="user-info">
            <div class="user-graph">
                <div class="user-imgs">
                    <img class="user-avatar" src="/resources/images/qrcode%20(4).png" alt="avatar" />
                    <img class="user-flag" src="https://countryflagsapi.com/png/ru" alt="Russian Federation flag" />
                </div>
                <div class="user-categories">
                    <p class="user-role">Role</p>
                    <p class="user-status">Status</p>
                </div>
            </div>
            <div class="user-text">
                <p class="user-description">dsgcvsghdcv ghsdv sdhgv chsjgdv sjhgd vcsjhgd vcshgkjd cvksjdh csdkghfc ksuyrf cgskhd vcsgkhd sjdhkvc skdcv shdcv sjdhgcv sjhdc sjdhgc sdjhgc sdvhgc</p>
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
            <a class="button" href="#">Редактировать</a>
            <a class="button" href="#">Удалить</a>
        </div>
    </div>

@endsection
