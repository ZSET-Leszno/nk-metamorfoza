addEventListener("scroll", (event) => {
    dark();
    if (isInViewport(document.getElementsByClassName('slide')[0])) {
        console.log("s");
        slides();
    }
});

addEventListener("DOMContentLoaded", (event) => {
    dark();
})


function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

function dark() {
    var maxHeight = screen.height;
    var scrollHeight = window.scrollY;
    var dark = maxHeight / (maxHeight - scrollHeight * 0.5) * 0.7 ;
    document.getElementById("dark").style = "background-color: rgba(0, 0, 0, "+ dark +");"
}

function slides() {
    console.log("s");
    document.getElementById('slide-left').style = "transform: translateX(0); -webkit-transform: translateX(0);";
    document.getElementById('slide-right').style = "transform: translateX(0); -webkit-transform: translateX(0);";
    document.getElementById('slide-left1').style = "transform: translateX(0); -webkit-transform: translateX(0);";
    document.getElementById('slide-right2').style = "transform: translateX(0); -webkit-transform: translateX(0);";
}