<div class="modal modal-request">
    <div class="modal-content form">
        <h1 class="title without-mt">Найден напарник!</h1>
        <div class="user-profile">
            <h2 class="title without-mt profile-name-online">{{$profile->name}}</h2>
            <div class="user-info">
                <div class="user-graph">
                    <div class="user-imgs">
                        <img class="user-avatar" src="{{asset($profile->avatar)}}" alt="avatar"/>
                        <img class="user-flag" src="https://www.countryflagicons.com/FLAT/64/{{$profile->country}}.png" alt="flag"/>
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
            <div id="decision-teammate" class="no-visible"></div>
            <div class="buttons" id="online-buttons">
                <form id="decision-online-form">
                    @csrf
                    <button id="online-button" type="submit" class="approve button" name="action" value="approve">Принять</button>
                    <button id="online-button" type="submit" class="ban button" name="action" value="ban">Отклонить</button>
                </form>
            </div>
        </div>
    </div>
</div>
