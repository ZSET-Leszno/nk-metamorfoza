addEventListener("scroll", (event) => {
    if (isInViewport(document.getElementsByClassName('slide')[0])) {
        slides();
    }
});

addEventListener("DOMContentLoaded", async (event) => {
    var pierwszynapis = "Cos tam cos tam";
    writing("header", pierwszynapis, 40);
    await sleep(50 * parseInt(pierwszynapis.length));
    writing("header2", "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", 25);
})

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

function slides() {
    document.getElementById('slide-left').style = "transform: translateX(0); -webkit-transform: translateX(0);";
    document.getElementById('slide-right').style = "transform: translateX(0); -webkit-transform: translateX(0);";
    document.getElementById('slide-left1').style = "transform: translateX(0); -webkit-transform: translateX(0);";
    document.getElementById('slide-right2').style = "transform: translateX(0); -webkit-transform: translateX(0);";
}

async function writing(id, napis, wait) {
    for (var i = 0; i <= napis.length; i++) {
        document.getElementById(id).innerHTML = napis.substring(0, i);
        await sleep(wait);
    }
}