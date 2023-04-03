@extends('layout')

@section('title', 'Добавить заявку')

@section('page-content')
    <div class="form add-req-form">
        <h1 class="title add-req-title">Добавить заявку</h1>
        <form action="{{route('add-req-post')}}" method="post" autocomplete="off">
            @csrf
            <div class="field-wrap">
                <label>
                    Заголовок<span class="req">*</span>
                </label>
                <input name="title"
                       @error('title')data-error="{{json_encode($errors->first('title'))}}"
                       @enderror type="text" required autocomplete="off"
                       value="{{old('title')}}"/>
            </div>
            <div class="field-wrap">
                <textarea name="description"
                      @error('description')data-error="{{json_encode($errors->first('description'))}}"
                      @enderror class="reg-description" required placeholder="Описание"
                      autocomplete="off">{{old('description')}}</textarea>
            </div>
            <div class="field-wrap">
                <select name="game" class="add-req-game">
                    <option selected="selected">Выберите игру</option>
                    @foreach($games as $game)
                        <option value="{{$game->id}}">{{$game->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="button-form button-block">Подать заявку</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="/public/js/signup.js"></script>
    <script type="text/javascript" src="/public/js/handleErrors.js"></script>
@endsection
