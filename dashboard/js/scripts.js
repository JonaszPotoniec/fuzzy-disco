var sideBar;
var burgerCheckbox;

function loaded( ) {
    sideBar = document.getElementById("sideBar");
    burgerCheckbox = document.getElementById("burgerCheckbox");
    openSideBar();
    document.getElementById("contentContainer").style.height = window.innerHeight - 45 + "px";
}

function openSideBar(){
    if(burgerCheckbox.checked){
        sideBar.classList.add("sideBarOpen");
    }else{
        sideBar.classList.remove("sideBarOpen");
    }
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

window.onresize = function(event) {
    document.getElementById("contentContainer").style.height = window.innerHeight - 45 + "px";
};

window.addEventListener('load', loaded(), false);

if(getParameterByName('tab') != undefined)
    loadModule(getParameterByName('tab'));