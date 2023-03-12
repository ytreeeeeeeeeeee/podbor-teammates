<a href="#" class="card-request">
    <div class="card-text">
        <h3 class="subtitle">{{$req->title}}</h3>
        <p class="card-description">{{$req->description}}</p>
    </div>
    <div class="card-author">
        <img class="card-avatar" src="/{{$req->author->avatar}}" alt="avatar">
        <p class="nickname">{{$req->author->name}}</p>
    </div>
</a>
