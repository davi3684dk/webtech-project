<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/main.css")}}">
    <script defer src="{{asset("scripts/main.js")}}"></script>
</head>
<body>
    <header>
        <h1>IGDB</h1>
        <div class="nav-container">
            <nav>
                <ul>
                    <li>
                        <a href="{{route("index")}}">Home</a>
                    </li>
                    <li>
                        <a href="">Games</a>
                    </li>
                    @guest
                    <li class="nav-right">
                        <a href="{{route("show-login")}}">Log In</a>    
                    </li>   
                    @endguest

                    @auth
                    <li class="nav-right">
                        <a href="{{route("create")}}">Add Game</a>
                    </li>

                    <li class="nav-right">
                        <form action="{{route("logout")}}" method="POST">
                            @csrf
                            <input type="submit" value="Logout">
                        </form>
                    </li>   
                    @endauth
                </ul>
            </nav>
        </div>
    </header>
    <main>
        {{$slot}}
    </main>
    <footer>
        <a href="https://github.com/davi3684dk/webtech-project">
            Source
        </a>
    </footer>
</body>
</html>