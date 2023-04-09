@extends('layout')

@section('title', 'Главная')

@section('page-content')
    <div class="alert" @error('alert')data-error="{{json_encode($errors->first('alert'))}}" @enderror></div>
    <h2 class="title">Заявки пользователей</h2>
    <div class="card-request--list">
        @foreach($reqs as $req)
            <x-card-request :req="$req"></x-card-request>
        @endforeach
    </div>

    <x-error-alert></x-error-alert>
@endsection

@section('scripts')
    <script type="text/javascript" src="/public/js/handleErrors.js"></script>
@endsection
