@extends('layout')

@section('title', 'Регистрация/авторизация')

@section('page-content')
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
                        <input name="name" @error('name')data-error="{{json_encode($errors->first('name'))}}"
                               @enderror type="text" required autocomplete="off" value="{{old('name')}}"/>
                    </div>
                    <div class="field-wrap">
                        <label>
                            Email<span class="req">*</span>
                        </label>
                        <input name="email"
                               @error('email') @if(request()->query('tab') == 'signup') data-error="{{json_encode($errors->first('email'))}}"
                               @endif @enderror type="email" required autocomplete="off" value="{{old('email')}}"/>
                    </div>
                    <div class="field-wrap">
                        <label>
                            Пароль<span class="req">*</span>
                        </label>
                        <input name="password"
                               @error('password') @if(request()->query('tab') == 'signup') data-error="{{json_encode($errors->first('password'))}}"
                               @endif @enderror type="password" required autocomplete="off"
                               value="{{old('password')}}"/>
                    </div>
                    <div class="field-wrap">
                        <textarea name="description"
                                  @error('description')data-error="{{json_encode($errors->first('description'))}}"
                                  @enderror class="reg-description" required placeholder="Описание"
                                  autocomplete="off">{{old('description')}}</textarea>
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
                <form action="{{route('login')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="field-wrap">
                        <label>
                            Email<span class="req">*</span>
                        </label>
                        <input name="email"
                               @error('auth_error')data-error="{{json_encode($errors->first('auth_error'))}}" @enderror type="email" required autocomplete="off" value="{{old('email')}}"/>
                    </div>
                    <div class="field-wrap">
                        <label>
                            Пароль<span class="req">*</span>
                        </label>
                        <input name="password"
                               @error('auth_error') data-error="{{json_encode($errors->first('auth_error'))}}" @enderror type="password" required autocomplete="off"/>
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
    <script type="text/javascript" src="/public/js/signup.js"></script>
    <script type="text/javascript" src="/public/js/handleErrors.js"></script>
@endsection
