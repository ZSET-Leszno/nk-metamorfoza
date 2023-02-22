function przyciemnienie() {
    var maxHeight = screen.height;
    var scrollHeight = window.scrollY;
    if (scrollHeight > 20) {
        var dark = 0.3 - (scrollHeight * 0.00025);
        console.log(maxHeight);
        document.getElementById("dark").style = "backdrop-filter: brightness(" + dark + "); -webkit-backdrop-filter: brightness(" + dark + ");";
    } else if (scrollHeight >= maxHeight || 0.3 - (scrollHeight * 0.00025) < 0) {
        document.getElementById("dark").style = "backdrop-filter: brightness(0); -webkit-backdrop-filter: brightness(0);";
    } else {
        document.getElementById("dark").style = "";
    }
}

addEventListener("scroll", (event) => {
    przyciemnienie();
});
