@extends('layout')

@section('title', 'Главная')

@section('page-content')
    <h2 class="title">Мои заявки</h2>
    <div class="card-request--list">
        <x-card-request></x-card-request>
        <x-card-request></x-card-request>
        <x-card-request></x-card-request>
        <x-card-request></x-card-request>
        <x-card-request></x-card-request>
        <x-card-request></x-card-request>
        <x-card-request></x-card-request>
        <x-card-request></x-card-request>
        <x-card-request></x-card-request>
    </div>
@endsection
