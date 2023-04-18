['scroll', 'DOMContentLoaded'].forEach(function(e) {
    addEventListener(e, (event) => {
    const rect = document.getElementById('cards').getBoundingClientRect();
    if (rect.top < 750) {
        cards();
    }
    const rect2 = document.getElementById('services').getBoundingClientRect();
    if (rect2.top < 650 && document.getElementById('search').value == '') {
        slideIn('slide');
    }
    if (rect2.top < 650 && document.getElementById('services-text').innerHTML == "") {
        writing("services-text", "Zapoznaj się z naszymi usługami:", 25);
    }
    const rect3 = document.getElementById('reviewHeader').getBoundingClientRect();
    if (rect3.top < 650) {
        fadeIn('reviewHeader');
        fadeIn('about');
        fadeIn('reviews');
        fadeIn('map');
    }
});});

addEventListener("DOMContentLoaded", async (event) => {
    var pierwszynapis = "NK Metamorfoza";
    writing("header", pierwszynapis, 40);
    await sleep(45 * parseInt(pierwszynapis.length));
    var druginapis = "Salon Fryzjersko-Kosmetyczny w Lesznie";
    writing("header2", druginapis, 17);
    await sleep(17 * parseInt(druginapis.length));
    fadeIn("arrow");
})

addEventListener("input", (event) => {
    var input = document.getElementById('search').value;
    if (input == "") {
        document.getElementById('services-inner').style = 'transform: translate(0); -webkit-transform: translate(0);';
        document.getElementById('searched').innerHTML = '';
    } else {
        document.getElementById('services-inner').style = 'display: none;';
        var search = new XMLHttpRequest();
        search.onloadstart = function() {
        document.getElementById('searched').innerHTML = '<div style="height: 287px; display: flex; justify-content: center; align-items: center;"><img width="50" src="img/loading-gif.gif"></div>';
        }
        search.onload = function() {
            if (search.responseText == '') {
                document.getElementById('searched').innerHTML = '<div style="justify-content: center;">Brak wyników</div><span style="text-align: center; display: block;"><a style="color: rgb(48, 48, 48);" onclick="hide();">Wyczyść wyszukiwanie</a></span>';
            } else {
                document.getElementById('searched').innerHTML = search.responseText + '<span style="text-align: center; display: block;"><a style="color: rgb(48, 48, 48);" onclick="hide();">Wyczyść wyszukiwanie</a></span>';
            }
        }
        search.open("POST", "search.php");
        search.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        search.send("search=" + input);
    }
});

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
    document.getElementById(id).style = "opacity: 1; transition: 0.75s opacity ;-webkit-transition: 0.75s opacity;";
}

function slideIn(klasa) {
    var slides = document.getElementsByClassName(klasa);
    for (i = 0; i < slides.length; i++) {
        slides[i].style = "transform: translate(0); -webkit-transform: translate(0);";
    }
}

function expand(index) {
    var arrows = document.getElementsByClassName("arrow");
    if (document.getElementById("category" + index).offsetHeight > 0) {
        arrows[index - 1].style = "";
        document.getElementById("category" + index).style = "";
    } else {
        var list = document.getElementById("category" + index).children;
        var height = 0;
        for (i = list.length - 1; i >= 0; i--) {
            height += list[i].offsetHeight;
        }
        document.getElementById("category" + index).style.maxHeight = height + "px";
        arrows[index - 1].style = "transform: rotate(-135deg); -webkit-transform: rotate(-135deg); margin-bottom: -20px";
    }
}

function nextSlide() {
    var list = document.getElementsByClassName('review');
    var index = parseInt(document.getElementById("reviewId").innerHTML);
    if (list.length - 1 == index) {
        document.getElementById("reviewId").innerHTML = 0;
        list[list.length - 1].classList.remove("review-active");
        list[0].classList.add("review-active");
    } else {
        document.getElementById("reviewId").innerHTML = index + 1;
        list[index].classList.remove("review-active");
        list[index + 1].classList.add("review-active");
    }
}

function previousSlide() {
    var list = document.getElementsByClassName('review');
    var index = parseInt(document.getElementById("reviewId").innerHTML);
    if (index == 0) {
        document.getElementById("reviewId").innerHTML = list.length - 1;
        list[0].classList.remove("review-active");
        list[list.length - 1].classList.add("review-active");
    } else {
        document.getElementById("reviewId").innerHTML = index - 1;
        list[index].classList.remove("review-active");
        list[index - 1].classList.add("review-active");
    }
}

document.getElementsByClassName('review')[0].classList.add("review-active");

function hide() {
    document.getElementById('search').value = '';
    document.getElementById('services-inner').style = 'transform: translate(0); -webkit-transform: translate(0);';
    document.getElementById('searched').innerHTML = '';
}