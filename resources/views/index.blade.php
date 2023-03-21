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

    <template>
        <div id="template-error" class="alert-table">
            <div class="error-table-header">
                Access rights error
            </div>
            <div class="error-table-body">
                <div class="error-row">
                    <div class="error-cell">
                        <i class="fa fa-exclamation-circle"></i>
                    </div>
                    <div id="error-text" class="error-cell">
                    </div>
                </div>
            </div>
        </div>
    </template>
@endsection

@section('scripts')
    <script type="text/javascript" src="/resources/js/handleErrors.js"></script>
@endsection
