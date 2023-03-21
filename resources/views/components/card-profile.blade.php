<a href="{{route('profile', ['id' => $profile->id])}}" class="card-request">
    <div class="card-profile">
        <div class="profile-main">
            <div class="profile-avatar">
                <img class="user-avatar" src="{{asset($profile->avatar)}}" alt="User avatar" />
            </div>
            <p class="profile-nickname">{{$profile->name}}</p>
        </div>
        <p class="card-description">{{$profile->description}}</p>
    </div>
</a>
