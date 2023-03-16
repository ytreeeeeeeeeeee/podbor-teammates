@extends('layout')

@section('title', 'Все заявки')

@section('page-content')
    <h2 class="title">Заявки по игре {{$game->title}}</h2>
    <div class="card-request--list" data-page="game-reqs">
        @foreach($reqs as $req)
            @include('components.card-request', ['req' => $req])
        @endforeach

    </div>
@endsection

{{--@section('scripts')--}}
{{--    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>--}}
{{--    <script type="text/javascript" src="/js/endlessScroll.js"></script>--}}
{{--@endsection--}}
