<a href="{{route('game-reqs', ['id' => $game->id])}}" class="game-card">
    <img class="game-img" src="{{$game->image}}" alt="game logo" />
    <h3 class="subtitle">{{$game->title}}</h3>
</a>
