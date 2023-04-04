@extends('layout')

@section('title', 'Восстановление пароля')

@section('page-content')
    @if (Session::has('message'))
        <div class="alert alert-error" data-error="{{json_encode(Session::get('message'))}}"></div>
    @endif
    <form class="form password-form" action="{{route('reset-password')}}" method="post">
        @csrf
        <h2 class="title reset-title">Восстановление пароля</h2>
        <div class="field-wrap">
            <label>
                Email<span class="req">*</span>
            </label>
            <input name="email" type="email" required readonly autocomplete="off" value="{{$email}}"/>
        </div>
        <input class="no-visible" type="text" name="token" readonly value="{{$token}}">
        <div class="field-wrap">
            <label>
                Пароль<span class="req">*</span>
            </label>
            <input name="password" type="password" required autocomplete="off"/>
        </div>
        <div class="field-wrap">
            <label>
                Подтверждение пароля<span class="req">*</span>
            </label>
            <input name="password_confirm" type="password" required autocomplete="off"/>
        </div>
        <button type="submit" class="button-form button-block">Отправить</button>
    </form>
    
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
    <script type="text/javascript" src="/public/js/signup.js"></script>
    <script type="text/javascript" src="/public/js/handleErrors.js"></script>
@endsection
