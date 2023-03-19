<div class="modal">
    <div class="modal-content form">
        <h1 class="title edit-title">Редактирование профиля</h1>
        <form action="{{route('edit-profile', ['id' => Auth::user()->id])}}" method="post" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="field-wrap">
                <label>
                    Никнейм
                </label>
                <input name="name" @error('name')data-error="{{json_encode($errors->first('name'))}}"
                       @enderror type="text" required autocomplete="off" value="{{$profile->name}}"/>
            </div>
            <div class="field-wrap">
                <textarea name="description"
                          @error('description')data-error="{{json_encode($errors->first('description'))}}"
                          @enderror class="reg-description" required placeholder="Описание"
                          autocomplete="off">{{$profile->description}}</textarea>
            </div>
            <div class="field-wrap">
                <label>
                    Ссылка на steam-профиль
                </label>
                <input name="steam_link" @error('steam_link')data-error="{{json_encode($errors->first('steam_link'))}}"
                       @enderror type="text" autocomplete="off" value="{{$profile->steam_link}}"/>
            </div>
            <div class="field-wrap">
                <label>
                    Ссылка на discord
                </label>
                <input name="discord_link" @error('discord_link')data-error="{{json_encode($errors->first('discord_link'))}}"
                       @enderror type="text" autocomplete="off" value="{{$profile->discord_link}}"/>
            </div>
            <div class="field-wrap">
                <input class="no-border" name="avatar" type="file" autocomplete="off"/>
            </div>
            <button type="submit" class="button-form button-block">Обновить профиль</button>
        </form>
    </div>
</div>
