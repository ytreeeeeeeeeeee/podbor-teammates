@extends('layout')

@section('title', 'Регистрация/авторизация')

@section('page-content')
    <p>{{$errors}}</p>
    <div class="form">
        <ul class="tab-group">
            <li class="tab active"><a class="tab-link" href="#signup">Регистрация</a></li>
            <li class="tab"><a class="tab-link" href="#login">Авторизация</a></li>
        </ul>
        <div class="tab-content">
            <div id="signup">
                <h1 class="title reg-title">Зарегистрироваться</h1>
                <form action="{{route('signup')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="field-wrap">
                        <label>
                            Никнейм<span class="req">*</span>
                        </label>
                        <input name="name" @error('name')data-error="{{json_encode($errors['name'])}}" @enderror type="text" required autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label>
                            Email<span class="req">*</span>
                        </label>
                        <input name="email" @error('email')data-error="{{json_encode($errors->first('email'))}}" @enderror type="email" required autocomplete="off"/>
                    </div>
                    <div class="field-wrap">
                        <label>
                            Пароль<span class="req">*</span>
                        </label>
                        <input name="password" @error('password')data-error="{{json_encode($errors['password'])}}" @enderror type="password" required autocomplete="off"/>
                    </div>
                    <div class="field-wrap">
                        <textarea name="description" @error('description')data-error="{{json_encode($errors['description'])}}" @enderror class="reg-description" required placeholder="Описание" autocomplete="off"></textarea>
                    </div>
                    <div class="field-wrap">
                        <select name="country" class="reg-country">
                            <option selected="selected">Выберите страну</option>
                            <option value="RU">Россия</option>
                        </select>
                    </div>
                    <button type="submit" class="button-form button-block">Зарегистрироваться</button>
                </form>
            </div>
            <div id="login">
                <h1 class="title reg-title">Добро пожаловать!</h1>
                <form action="/" method="post">
                    <div class="field-wrap">
                        <label>
                            Email<span class="req">*</span>
                        </label>
                        <input type="email" required autocomplete="off"/>
                    </div>
                    <div class="field-wrap">
                        <label>
                            Пароль<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off"/>
                    </div>
                    <button class="button-form button-block">Войти</button>
                </form>
            </div>
        </div>
    </div>

    <template>
        <div id="template-error" class="error-table">
            <div class="error-table-header">
                Error
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
    <script type="text/javascript" src="/resources/js/signup.js"></script>
    <script type="text/javascript" src="/resources/js/handleErrors.js"></script>
@endsection
