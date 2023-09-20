function diAlgo(){
    alert("El one piece es real");
}
diAlgo();
function cambiaPic() {
    var image = document.getElementById('myFPImage');
    if (image.src.match("verde")) {
        image.src = "https://geekflare.com/wp-content/uploads/2021/09/520401-pure-black-background-wallpaper.jpg";
    } else {
        image.src = "https://previews.123rf.com/images/mariia24/mariia242105/mariia24210500129/169291480-fondo-clave-de-croma-de-pantalla-verde-ilustraci%C3%B3n-de-stock-vectorial.jpg";
    }
}
function myFunction(){
    var x = document.getElementById("mytxt");
    x.style.fontSize = "25px";
    x.style.color = "red";
}
function clicFotogramas(){
    var image = document.getElementById('imagFotograma');
    if (image.src.match("78691387")) {
        image.src = "https://thumbs.dreamstime.com/z/elegant-cool-side-view-serious-young-african-man-formalwear-fighting-someone-standing-isolated-white-43593253.jpg";
    } else if(image.src.match('43593253')) {
        image.src = "https://thumbs.dreamstime.com/b/portrait-asian-businessman-punching-something-portrait-asian-businessman-punching-something-posing-isolated-over-white-113558342.jpg";
    } else if(image.src.match('113558342')) {
        image.src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAGXxitMe51MwtxB89TMHCtXkdvQ8tsjYwsJ7a2BrFdYe3sbDnpoIAQIKnnv14UWrmTdI&usqp=CAU";
    } else {
        image.src = "https://thumbs.dreamstime.com/b/businessman-acting-like-punching-someone-white-background-facing-challenges-tough-competition-fighting-spirit-78691387.jpg";
    }
}
function verificarRespuesta(respuesta, preguntaId) {
    var pregunta = document.getElementById(preguntaId);
    if (respuesta) {
        pregunta.classList.remove('error');
        pregunta.classList.add('acierto');
    } else {
        pregunta.classList.remove('acierto');
        pregunta.classList.add('error');
    }
}