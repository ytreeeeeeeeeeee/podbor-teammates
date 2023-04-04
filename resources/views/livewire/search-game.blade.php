<div>
    <div class="field-wrap">
        <input type="text" autocomplete="off" placeholder="Поиск" wire:model="term"/>
    </div>
    <div class="games-list">
        @if($games->isEmpty())
            <h3 class="subtitle null-search">По вашему запросу ничего не найдено</h3>
        @else
            @foreach($games as $game)
                <x-game-card :game="$game"></x-game-card>
            @endforeach
        @endif
    </div>
</div>
