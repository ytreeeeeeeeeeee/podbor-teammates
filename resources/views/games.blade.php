@extends('layout')

@section('title', 'Игры')

@section('page-content')
    <h2 class="title">Поиск по играм</h2>
    <form action="/" method="post">
        <div class="field-wrap">
            <input type="text" autocomplete="off" placeholder="Поиск"/>
        </div>
    </form>
    <div class="games-list">
        @foreach($games as $game)
            <x-game-card :game="$game"></x-game-card>
        @endforeach
    </div>
@endsection
