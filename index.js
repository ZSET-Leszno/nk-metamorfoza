function przyciemnienie() {
    var maxHeight = screen.height;
    var scrollHeight = window.scrollY;
    var dark = maxHeight / (maxHeight - scrollHeight) * 0.3 ;
    document.getElementById("dark").style = "background-color: rgba(0, 0, 0, "+ dark +");"
}

addEventListener("scroll", (event) => {
    przyciemnienie();
});

addEventListener("DOMContentLoaded", (event) => {
    przyciemnienie();
})