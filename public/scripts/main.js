/*var simplemde = new SimpleMDE(
    { 
        element: document.getElementById("description"),
        forceSync: true,
        spellChecker: false
    });*/

fetch("/api")
    .then(resp => {
        if (resp.status == 200) {return resp.json();}
        else { throw new Error(resp); }})
    .then(games => {

        games.forEach(game => {
            const gameContainer = document.createElement("div");
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
                    <a href="/user/${game.userId}">
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

function submitClicked() {
    let inputs = document.getElementById("form").querySelectorAll("input,textarea");
    let alertStr = "";
    
    for (let index = 0; index < inputs.length; index++) {
        const element = inputs[index];
        if (element.type == "file" || element.type == "submit")
            continue;

        alertStr += element.name + ": " + element.value + "\n";
    }

    alert(alertStr);
}

document.getElementById("tags-dropdown").addEventListener("change", function () {
    let sel = document.getElementById("tags-dropdown");
    let value = this.options[sel.selectedIndex].value;

    let tagParent = document.getElementById("tags");

    const tagDiv = document.createElement("div");
    tagDiv.className = "tag-item";

    const node = document.createTextNode(this.options[sel.selectedIndex].text);
    const removebtn = document.createElement("button");

    const hiddenIn = document.createElement("input");
    hiddenIn.name = "tag[]";
    hiddenIn.value = value;
    hiddenIn.hidden = true;
    
    removebtn.className = "tag-remove-btn";
    removebtn.innerHTML = "✖"
    removebtn.addEventListener("click", e => {
        e.preventDefault();

        tagParent.removeChild(tagDiv);
    });


    tagDiv.appendChild(node);
    tagDiv.appendChild(removebtn);
    tagDiv.appendChild(hiddenIn);

    tagParent.appendChild(tagDiv);

    sel.value = "addtag";
});

document.getElementById("tags-dropdown").value = "addtag";

function deleteClicked() {
    return confirm('Are you sure you want to remove the game?');
}
