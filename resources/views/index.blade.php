@extends('layout')

@section('title', 'Главная')

@section('page-content')
    <h2 class="title">Заявки пользователей</h2>
    <div class="card-request--list">
        @foreach($reqs as $req)
            <x-card-request :req="$req"></x-card-request>
        @endforeach
    </div>
@endsection
