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