addEventListener("scroll", (event) => {
    const rect = document.getElementById('cards').getBoundingClientRect();
    if (rect.top < 650) {
        cards();
    }
});

addEventListener("DOMContentLoaded", async (event) => {
    var pierwszynapis = "NK Metamorfoza";
    writing("header", pierwszynapis, 40);
    await sleep(50 * parseInt(pierwszynapis.length));
    writing("header2", "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", 25);
})

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function cards() {
    var cards = document.getElementsByClassName('card');
    for (i = 0; i < cards.length; i++) {
        cards[i].style = "transform: scale(1); -webkit-transform: scale(1);";
    }
}

async function writing(id, napis, wait) {
    for (var i = 0; i <= napis.length; i++) {
        document.getElementById(id).innerHTML = napis.substring(0, i);
        await sleep(wait);
    }
}