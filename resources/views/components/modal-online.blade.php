<div class="modal">
    <div class="modal-content form">
        <h1 class="title">Найти тиммейта онлайн</h1>
        <h3 class="subtitle online-form-subtitle">Мы будем искать людей которые готовы играть в ту же игру, что и Вы</h3>
        <form action="{{route('online-search')}}" method="post" autocomplete="off">
            @csrf
            <div class="field-wrap">
                <select name="game" class="add-req-game">
                    <option selected="selected">Выберите игру</option>
                    @foreach($games as $game)
                        <option value="{{$game->id}}">{{$game->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="button-form button-block">Начать поиск</button>
        </form>
    </div>
</div>
