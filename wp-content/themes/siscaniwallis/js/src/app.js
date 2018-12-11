console.log('jaaaaaaaa');
$('.carousel').carousel();

function onMouse(id) {
    console.log(id);
    var x = id.getElementsByTagName("img")[0];
    x.style.visibility = "visible";
    console.log(x, 'overin');
}

function onMouseOut(id){
    console.log(id);
    var x = id.getElementsByTagName("img")[0];
    x.style.visibility = "hidden";
    console.log(x, 'overout');
}