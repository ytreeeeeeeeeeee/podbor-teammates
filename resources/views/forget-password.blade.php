@extends('layout')

@section('title', 'Восстановление пароля')

@section('page-content')
    <form class="form password-form" action="{{route('forget-password')}}" method="post">
        @csrf
        @if (Session::has('message'))
            <div class="alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @else
            <h2 class="title">Восстановление пароля</h2>
            <div class="field-wrap">
                <label>
                    Email<span class="req">*</span>
                </label>
                <input name="email"
                       @error('email')data-error="{{json_encode($errors->first('email'))}}" @enderror type="email" required autocomplete="off" value="{{old('email')}}"/>
            </div>
            <button type="submit" class="button-form button-block">Отправить</button>
        @endif
    </form>

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
