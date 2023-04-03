@extends('layout')

@section('title', 'Онлайн-подбор')

@section('page-content')
    <div class="alert" @error('game')data-error="{{json_encode($errors->first('game'))}}" @enderror></div>
    <h2 class="title">Онлайн-подбор</h2>
    <div class="online-content">
        <a href="#" class="button online-search-button edit-button">Начать поиск</a>
        <h3 class="subtitle online-subtitle">Эта функция поможет Вам найти напарника без ожидания публикации вашей заявки</h3>
    </div>
    <x-modal-online :games="$games"></x-modal-online>
@endsection

@section('scripts')
    <script type="text/javascript" src="/public/js/modalWindow.js"></script>
    <script type="text/javascript" src="/public/js/handleErrors.js"></script>
@endsection
