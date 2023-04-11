@extends('layout')

@section('title', 'Добавить заявку')

@section('page-content')
    <div class="error-container">
        <h1 class="title" >404 ошибка! Пошел вон отсюда!</h1>
        <a href="{{route('main-page')}}" class="button button-error">Вернуться на главную</a>
    </div>

@endsection
