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

    <x-error-table></x-error-table>
@endsection

@section('scripts')
    <script type="text/javascript" src="/public/js/signup.js"></script>
    <script type="text/javascript" src="/public/js/handleErrors.js"></script>
@endsection
