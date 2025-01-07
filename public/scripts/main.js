/*var simplemde = new SimpleMDE(
    { 
        element: document.getElementById("description"),
        forceSync: true,
        spellChecker: false
    });*/

if (window.location.pathname == "/games") {
    fetch("/api")
    .then(resp => {
        if (resp.status == 200) {return resp.json();}
        else { throw new Error(resp); }})
    .then(games => {

        games.forEach(game => {
            const gameContainer = document.createElement("a");
            gameContainer.href = "/games/" + game.id;
            gameContainer.className = "game-container";

            gameContainer.innerHTML = 
            `
                <h2 class="game-title">${game.title}</h2>
                <img src="https://image.api.playstation.com/vulcan/img/rnd/202010/2217/p3pYq0QxntZQREXRVdAzmn1w.png" alt="" class="game-cover-image">
                <ul>
                    <li>
                        Developer:
                        <p>${game.developer}</p>
                    </li>
                    <li>
                        Publisher:
                        <p>${game.publisher}</p>
                    </li>
                </ul>
                <div class="game-user">
                    <a href="/user/${game.user_id}">
                        <img src="/user.png" alt="" width="16" class="user-icon">
                        ${game.user.name}
                    </a>
                    <p>
                        <img src="/clock.png" alt="" width="16" class="user-icon">
                        ${game.year}
                    </p>
                </div>
            `;
            document.getElementById("games-list").appendChild(gameContainer)
        });
    });
}


function deleteClicked() {
    return confirm('Are you sure you want to remove the game?');
}
