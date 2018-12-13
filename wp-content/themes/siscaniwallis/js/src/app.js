console.log('ja');
$('.carousel').carousel();

function onMouse(id) {
    console.log(id);
    var x = id.getElementsByTagName("img")[0];
    x.style.visibility = "visible";
    // console.log(x, 'overin');
}

function onMouseOut(id){
    console.log(id);
    var x = id.getElementsByTagName("img")[0];
    x.style.visibility = "hidden";
    // console.log(x, 'overout');
}

function overBgBlack(id){
    var x = id.getElementsByClassName("bg-black");
    x[0].className += " active-bg-black";
    console.log(x, 'aquiii');
}

function outBgBlack(id){
    var x = id.getElementsByClassName("active-bg-black");
    x[0].classList.remove("active-bg-black");
}

// function handler(ev) {
//     var r = $(ev).find(".img-hover")
//     console.log(r.target, 'RAFAAA');

// }
// $(".card").mouseover(handler);