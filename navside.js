var nav = 0;


document.getElementById("navsideInfo").innerHTML = document.getElementById("menu").innerHTML;

function navSide() {
    if (navside = document.getElementById('navside').offsetWidth > 0) {
        document.getElementById('navside').style = "";
    } else {
        document.getElementById('navside').style = "width: 70%;";
    }
}