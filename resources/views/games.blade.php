@extends('layout')

@section('title', 'Игры')

@section('page-content')
    <h2 class="title">Поиск по играм</h2>
    <livewire:search-game>
@endsection

@section('scripts')
    <script src="{{ asset('public/vendor/livewire/livewire.js?id=90730a3b0e7144480175') }}"></script>
    @livewireAssets
{{--    @livewireScripts--}}
@endsection
