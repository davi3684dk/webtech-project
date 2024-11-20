<x-layout>
    @foreach ($games as $game)
        <div class="game-container">
            <h2 class="game-title">{{ $game->title; }}</h2>
            <p>Developer: {{$game->developer;}}</p>
            <p>Publisher: {{$game->publisher;}}</p>
        </div>
    @endforeach
</x-layout>