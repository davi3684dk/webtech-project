<x-layout>
    @if (isset($profile))
        <h1 class="profile-name">{{$profile->name}}</h1>
    @endif

    <div class="games-flex-box">
        @foreach ($games as $game)
        <div class="game-container">
            <h2 class="game-title">{{ $game->title }}</h2>

            <img src="https://image.api.playstation.com/vulcan/img/rnd/202010/2217/p3pYq0QxntZQREXRVdAzmn1w.png" alt="" class="game-cover-image">

            <ul>
                <li>
                    Developer:
                    <p>{{ $game->developer }}</p>
                </li>
                <li>
                    Publisher:
                    <p>{{ $game->publisher }}</p>
                </li>
            </ul>

            <div class="game-user">
                <a href="{{route("user.profile", $game->user)}}">
                    <img src="{{asset("user.png")}}" alt="" width="16" class="user-icon">
                    {{$game->user->name}}
                </a>
                <p>
                    <img src="{{asset("clock.png")}}" alt="" width="16" class="user-icon">
                    {{$game->year}}
                </p>
                @auth
                    @if ($game->user == Auth::user())
                        <form action="{{route("games.delete", $game)}}" method="POST" onsubmit="return deleteClicked()">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="submit" id="submit" value="Delete">
                        </form>
                    @endif
                @endauth
            </div>

        </div>
        @endforeach
    </div>

</x-layout>