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
console.log('Holaaaaa prueba js');

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJhcHAtanMuanMiXSwic291cmNlc0NvbnRlbnQiOlsiY29uc29sZS5sb2coJ2phJyk7XG4kKCcuY2Fyb3VzZWwnKS5jYXJvdXNlbCgpO1xuXG5mdW5jdGlvbiBvbk1vdXNlKGlkKSB7XG4gICAgY29uc29sZS5sb2coaWQpO1xuICAgIHZhciB4ID0gaWQuZ2V0RWxlbWVudHNCeVRhZ05hbWUoXCJpbWdcIilbMF07XG4gICAgeC5zdHlsZS52aXNpYmlsaXR5ID0gXCJ2aXNpYmxlXCI7XG4gICAgLy8gY29uc29sZS5sb2coeCwgJ292ZXJpbicpO1xufVxuXG5mdW5jdGlvbiBvbk1vdXNlT3V0KGlkKXtcbiAgICBjb25zb2xlLmxvZyhpZCk7XG4gICAgdmFyIHggPSBpZC5nZXRFbGVtZW50c0J5VGFnTmFtZShcImltZ1wiKVswXTtcbiAgICB4LnN0eWxlLnZpc2liaWxpdHkgPSBcImhpZGRlblwiO1xuICAgIC8vIGNvbnNvbGUubG9nKHgsICdvdmVyb3V0Jyk7XG59XG5cbmZ1bmN0aW9uIG92ZXJCZ0JsYWNrKGlkKXtcbiAgICB2YXIgeCA9IGlkLmdldEVsZW1lbnRzQnlDbGFzc05hbWUoXCJiZy1ibGFja1wiKTtcbiAgICB4WzBdLmNsYXNzTmFtZSArPSBcIiBhY3RpdmUtYmctYmxhY2tcIjtcbiAgICBjb25zb2xlLmxvZyh4LCAnYXF1aWlpJyk7XG59XG5cbmZ1bmN0aW9uIG91dEJnQmxhY2soaWQpe1xuICAgIHZhciB4ID0gaWQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZShcImFjdGl2ZS1iZy1ibGFja1wiKTtcbiAgICB4WzBdLmNsYXNzTGlzdC5yZW1vdmUoXCJhY3RpdmUtYmctYmxhY2tcIik7XG59XG5cbi8vIGZ1bmN0aW9uIGhhbmRsZXIoZXYpIHtcbi8vICAgICB2YXIgciA9ICQoZXYpLmZpbmQoXCIuaW1nLWhvdmVyXCIpXG4vLyAgICAgY29uc29sZS5sb2coci50YXJnZXQsICdSQUZBQUEnKTtcblxuLy8gfVxuLy8gJChcIi5jYXJkXCIpLm1vdXNlb3ZlcihoYW5kbGVyKTtcbmNvbnNvbGUubG9nKCdIb2xhYWFhYSBwcnVlYmEganMnKTtcbiJdLCJmaWxlIjoiYXBwLWpzLmpzIn0=
