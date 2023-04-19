<a href="{{route('request', ['id' => $req->id])}}" class="card-request">
    <div class="card-text">
        <h3 class="subtitle card-subtitle">{{$req->title}}</h3>
        <p class="card-description">{{$req->description}}</p>
    </div>
    <div class="card-author">
        <img class="card-avatar" src="{{asset($req->author->avatar)}}" alt="avatar">
        <p class="nickname">{{$req->author->name}}</p>
    </div>
</a>
