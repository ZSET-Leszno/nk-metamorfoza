addEventListener("scroll", (event) => {
    const rect = document.getElementById('cards').getBoundingClientRect();
    if (rect.top < 650) {
        cards();
    }
    const rect2 = document.getElementById('information').getBoundingClientRect();
    if (rect2.top < 650) {
        slideIn('slide');
    }
});

addEventListener("DOMContentLoaded", async (event) => {
    var pierwszynapis = "NK Metamorfoza";
    writing("header", pierwszynapis, 40);
    await sleep(45 * parseInt(pierwszynapis.length));
    var druginapis = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
    writing("header2", druginapis, 17);
    await sleep(17 * parseInt(druginapis.length));
    fadeIn("arrow");
})

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function cards() {
    var cards = document.getElementsByClassName('card');
    for (i = 0; i < cards.length; i++) {
        cards[i].classList.remove('pre-card');
    }
}

async function writing(id, napis, wait) {
    for (var i = 0; i <= napis.length; i++) {
        document.getElementById(id).innerHTML = napis.substring(0, i);
        await sleep(wait);
    }
}

function fadeIn(id) {
    document.getElementById(id).style = "opacity: 1; transition: 0.75s opacity ;-webkit-transition: 0.75s;";
}

function slideIn(klasa) {
    var slides = document.getElementsByClassName(klasa);
    for (i = 0; i < slides.length; i++) {
        slides[i].style = "transform: translate(0); -webkit-transform: translate(0);";
    }
}