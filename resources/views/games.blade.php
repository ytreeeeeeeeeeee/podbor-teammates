@extends('layout')

@section('title', 'Игры')

@section('page-content')
    <h2 class="title">Поиск по играм</h2>
    <livewire:search-game>
@endsection

@section('scripts')
    @livewireScripts
@endsection
