@extends('layout')

@section('title', 'Все заявки')

@section('page-content')
    <h2 class="title">Заявки пользователей</h2>
    <div class="card-request--list">
        @foreach($reqs as $req)
            @include('components.card-request', ['req' => $req])
{{--            @livewire('card-request', ['req' => $req])--}}
{{--            <livewire:card-request :req="$req" />--}}
{{--            <x-card-request :req="$req"></x-card-request>--}}
{{--            @component("components.card-request", [":req" => $req])<x-card-request></x-card-request>@endcomponent--}}
        @endforeach

    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="/resources/js/endlessScroll.js"></script>
@endsection
