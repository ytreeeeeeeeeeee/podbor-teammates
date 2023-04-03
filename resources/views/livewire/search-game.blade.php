<div>
{{--    <form method="get">--}}
        <div class="field-wrap">
            <input type="text" autocomplete="off" placeholder="Поиск" wire:model="term"/>
        </div>
{{--    </form>--}}
    <p>{{$term}}</p>
    <div class="games-list">
        @if($games->isEmpty())
            <h3 class="subtitle">По вашему запросу ничего не найдено</h3>
        @else
            @foreach($games as $game)
                <x-game-card :game="$game"></x-game-card>
            @endforeach
        @endif
    </div>
</div>
