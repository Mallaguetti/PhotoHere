var pyi = 10;

window.onscroll = function(){
    var pyn = window.pageYOffset;
    if (pyi > pyn){
        document.getElementById("nav").style.backgroundColor = "#00000000";
    } else {
        document.getElementById("nav").style.backgroundColor = "#314e8b80";
    }
}