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

window.onresize = function(event) {
    document.getElementById("contentContainer").style.height = window.innerHeight - 45 + "px";
};

window.addEventListener('load', loaded(), false);