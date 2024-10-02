/*var simplemde = new SimpleMDE(
    { 
        element: document.getElementById("description"),
        forceSync: true,
        spellChecker: false
    });*/

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
    let value = this.options[sel.selectedIndex].text;

    let tagParent = document.getElementById("tags");

    const tagDiv = document.createElement("div");
    tagDiv.className = "tag-item";

    const node = document.createTextNode(value);
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