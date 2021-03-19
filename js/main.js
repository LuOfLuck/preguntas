function numeroRandom(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}
botonNo = document.getElementById("boton-no");
botonSi = document.getElementById("boton-si");
mensaje = document.getElementById("mensaje");
porFavor =document.getElementById("porfavor");

mensaje.style.display = "none";
porFavor.style.display = "none";
botonNo.addEventListener("mouseover", ()=>{
    function cambiarPosicion(x, y){
        nuevaPosicion = `
            top: ${x}%;
            left: ${y}%;
        `;
        return nuevaPosicion;
    }
    let x = numeroRandom(0,100);
    let y = numeroRandom(0,100);
    botonNo.style = cambiarPosicion(x, y);
});
botonNo.addEventListener("click", ()=>{
    porFavor.style.display = "block";
    porFavor.innerHTML += "Por Favor :c "
    function cambiarPosicion(x, y){
        nuevaPosicion = `
            top: ${x}%;
            left: ${y}%;
        `;
        return nuevaPosicion;
    }
    let x = numeroRandom(0,100);
    let y = numeroRandom(0,100);
    botonNo.style = cambiarPosicion(x, y);

});

botonSi.addEventListener("click", ()=>{
    mensaje.style.display = "block";
    botonNo.style.display = "none";
    botonSi.style.display = "none";
    porFavor.style.display = "none";
    setTimeout( function() { window.location.href = "https://instagram.com/lugically_cosmic" }, 5000 );
});