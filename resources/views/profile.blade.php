@extends('layout')

@section('title', $profile->name)

@section('page-content')
    <div class="alert" @error('avatar')data-error="{{json_encode($errors->first('avatar'))}}" @enderror></div>
    <h2 class="title">{{$profile->name}}</h2>
    <div class="user-profile">
        <div class="user-info">
            <div class="user-graph">
                <div class="user-imgs">
                    <img class="user-avatar" src="{{asset($profile->avatar)}}" alt="avatar"/>
                    <img class="user-flag" src="https://www.countryflagicons.com/FLAT/64/RU.png" alt="flag"/>
                </div>
                <div class="user-categories">
                    <p class="user-role">{{$profile->role->title}}</p>
                    <p class="user-status">{{$profile->status->title}}</p>
                </div>
            </div>
            <div class="user-text">
                <p class="user-description">{{$profile->description}}</p>
                @if($profile->steam_link)
                    <div class="user-steam">
                        <img src="/resources/images/icons8-steam.svg" alt="steam icon"/>
                        <a class="user-steam--link" href="{{$profile->steam_link}}">Ссылка на профиль стим</a>
                    </div>
                @endif
                @if($profile->discord_link)
                    <div class="user-discord">
                        <img src="/resources/images/icons8-discord.svg" alt="discord icon"/>
                        <p class="user-discord--link">{{$profile->discord_link}}</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="buttons">
            @if(Auth::user()->id != $profile->id)
                <a class="button" href="#">Написать сообщение</a>
            @else
                <a class="button edit-profile">Редактировать</a>
                <a class="button" href="#">Удалить</a>
            @endif
        </div>
    </div>

    <x-modal-edit-profile :profile="$profile"></x-modal-edit-profile>

    <template>
        <div id="template-error" class="alert-table">
            <div class="error-table-header">
                There were some problems when updating the profile
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
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/resources/js/modalWindow.js"></script>
@endsection
