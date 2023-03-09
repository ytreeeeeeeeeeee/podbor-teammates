@extends('layout')

@section('title', 'Игры')

@section('page-content')
    <h2 class="title">Поиск по играм</h2>
    <form action="/" method="post">
        <div class="field-wrap">
            <input type="text" autocomplete="off" placeholder="Search"/>
        </div>
    </form>
    <div class="games-list">
        <x-game-card></x-game-card>
        <x-game-card></x-game-card>
        <x-game-card></x-game-card>
    </div>
@endsection
