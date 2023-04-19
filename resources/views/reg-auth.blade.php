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
                <h1 class="title reg-title">Регистрация</h1>
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
                            <option selected disabled hidden>Выберите страну</option>
                            <option value="RU">Россия</option>
                            <option value="BY">Беларусь</option>
                            <option value="KZ">Казахстан</option>
                            <option value="DE">Германия</option>
                            <option value="FR">Франция</option>
                            <option value="PL">Польша</option>
                            <option value="US">США</option>
                            <option value="IT">Италия</option>
                            <option value="CN">Китай</option>
                            <option value="NL">Нидерланды</option>
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
                    <p class="forgot"><a href="{{route('forget-password-page')}}">Забыли пароль?</a></p>
                    <button class="button-form button-block">Войти</button>
                </form>
            </div>
        </div>
    </div>

    <x-error-table></x-error-table>
@endsection

@section('scripts')
    <script type="text/javascript" src="/public/js/signup.js"></script>
    <script type="text/javascript" src="/public/js/handleErrors.js"></script>
@endsection
