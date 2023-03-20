@extends('layout')

@section('title', 'Панель администратора')

@section('page-content')
    <h2 class="title">Панель администратора</h2>
    <h3 class="title">Заявки, ожидающие подтверждения</h3>
    <div class="card-request--list">
        @foreach($reqs as $req)
            <x-card-request :req="$req"></x-card-request>
        @endforeach
    </div>
@endsection

@section('scripts')

@endsection
