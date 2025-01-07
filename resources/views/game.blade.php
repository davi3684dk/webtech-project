<x-layout>
    <div class="game-content">
        <h1>{{$game -> title}}</h1>

        <div class="game-top">
            <div class="game-info">
                <table style="width:100%">
                    <tr class="small-attribute">
                        <td style="width:35%">RELEASE YEAR:</td>
                        <td>{{$game -> year}}</td>
                    </tr>
                    <tr class="small-attribute">
                        <td>DEVELOPER:</td>
                        <td>{{$game -> developer}}</td>
                    </tr>
                    <tr class="small-attribute">
                        <td>PUBLISHER:</td>
                        <td>{{$game -> publisher}}</td>
                    </tr>
                </table>
                <br>

                <p>Price: {{$game->price}}$</p>
    
                <h3>Tags</h3>
                <div class="game-info-taglist">
                    @foreach ($game->tags()->get() as $tag)
                        <div class="game-info-tag">{{$tag->name}}</div>
                    @endforeach
                </div>
                
                <div class="game-user">
                    <a href="{{route("user.profile", $game->user)}}">
                        <img src="{{asset("user.png")}}" alt="" width="16" class="user-icon">
                        {{$game->user->name}}
                    </a>

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
            <div class="game-cover">
                <img src="https://image.api.playstation.com/vulcan/img/rnd/202010/2217/p3pYq0QxntZQREXRVdAzmn1w.png" alt=""> 
            </div>
            
        </div>

        <div class="game-bottom">
            <h2>About</h2>
            <p>{{$game->description}}</p>
        </div>

    </div>


</x-layout>