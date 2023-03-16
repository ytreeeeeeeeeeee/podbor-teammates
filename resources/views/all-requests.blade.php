@extends('layout')

@section('title', 'Все заявки')

@section('page-content')
    <h2 class="title">Заявки пользователей</h2>
    <div class="card-request--list" data-page="all-reqs">
        @foreach($reqs as $req)
            @include('components.card-request', ['req' => $req])
        @endforeach

    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
    <script type="text/javascript" src="/resources/js/endlessScroll.js"></script>
@endsection
