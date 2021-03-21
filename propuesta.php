
<?php
include ("conexion.php");
$id = $_REQUEST["id"];
$sql =  "SELECT * from preguntas where id='$id'";

if ($resultado = $con->query($sql)){
    if ($resultado->num_rows > 0){
        $fila=$resultado->fetch_assoc();
        $pregunta = $fila["pregunta"];
        $suplica = $fila["suplica"];
        $usuario = $fila["usuario"];
    }
}
else{
    header("Location: index.html");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/propuesta.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title><?php echo $pregunta; ?></title>
</head>
<body>
    <header>
        <div class="header">
            <h1>Una propuesta interesante 7w7</h1>
        </div>
    </header>


    <div class="body">
    <div class="main">
        <div class="contenedor">
            <div class="contenedor-titulo">
                <h2><?php echo $pregunta; ?></h2>
            </div>
            <div class="contenedor-cuerpo">

                <button onclick="ajaxTrue()" id="boton-si" class="button button-si"> SI :D</button>
                
                <button onclick="ajaxFalse(); cambiar()" id="boton-no" class="button button-no"> No :c</button>
                <div id="mensaje" class="mensaje">
                    <p>sabia que dirias que si :3</p>
                </div>
                <div id="porfavor" class="mensaje2"></div>
            </div>

        </div>
    </div>
    <?php
        if (isset($_REQUEST["nombre"])){
            $victima = $_REQUEST["nombre"];
            $si = 0;   
            $rechazos = 0;
            $id_new = rand(1,1000000);
            $SQL="INSERT INTO visitas (id, victima, id_pregunta, si, rechazos) VALUES('$id_new', '$victima', '$id', '$si', '$rechazos')";	
            if(!$error= $con-> query($SQL)){
                echo $con->error;
            }
        }else{ ?>

            <div id="escribe-tu-nombre"class="escribe-tu-nombre">
                <div class="row ventana">
                    <div class="ventana-titulo">
                        <p class="text-center my-3 h3"> Escribe tu nombre por favor</p><hr>
                    </div>
                    <div class="ventana-cuerpo">
                        <div class="row form-gruop formulario ">
                            <div class="col-12 col-md-10 mb-4 mx-auto">
                                <label class="col-12 col-md-6 ml-3" for="id_nombre">Escribe tu nombre:</label>
                                <input type="text" name="nombre" class="col-12 col-md-8" id="id_nombre" placeholder="Tu nombre es..."   require>
                                                        
                                <a onclick="obtenerDatos()" class="btn sudmit"> enviar </a>   
                            </div>
                        </div>
                        <script>
                            function obtenerDatos(){
                                let ventana = document.getElementById("escribe-tu-nombre");
                                nombre = document.getElementById("id_nombre").value;
                                window.location.href = window.location.href + "&nombre=" + nombre;
                            }
                        </script>
                    </div>
                </div>
            </div>
        
        <?php } ?>
        </div>
    <script>
        var cantidad = 1;
        var suplica = "<?php echo $suplica; ?> ";
        function ajaxTrue(){
            $.ajax({
                type: "POST",
                url: "funcion.php",
                data: {
                    "yes" : "yes",
                    "id" : <?php echo $id_new; ?>
                },
                success: function(data){
                    console.log(data);
                }
            });
        }
        
        function ajaxFalse(){
            $.ajax({
                type: "POST",
                url: "funcion.php",
                data: {
                    "codigo" : <?php echo $id_new; ?>,
                    "cantidad": cantidad,
                },
                success: function(data){
                    console.log(data);
                }
            });
            cantidad += 1;
        }

        function numeroRandom(min, max) {
            return Math.floor(Math.random() * (max - min)) + min;
        }

        botonNo = document.getElementById("boton-no");
        botonSi = document.getElementById("boton-si");
        mensaje = document.getElementById("mensaje");
        porFavor =document.getElementById("porfavor");

        botonNo.addEventListener("mouseover", ()=>{
            porFavor.style.display = "block";
            porFavor.innerHTML += suplica;
            function cambiarPosicion(x, y){
                nuevaPosicion = `
                    top: ${x}%;
                    left: ${y}%;
                `;
                return nuevaPosicion;
            }
            ajaxFalse();
            let x = numeroRandom(0,100);
            let y = numeroRandom(0,100);
            botonNo.style = cambiarPosicion(x, y);
        });

        function cambiar(){
            porFavor.style.display = "block";
            porFavor.innerHTML += suplica;
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
        }

        botonSi.addEventListener("click", ()=>{
            mensaje.style.display = "block";
            botonNo.style.display = "none";
            botonSi.style.display = "none";
            porFavor.style.display = "none";
            setTimeout( function() { window.location.href = "https://instagram.com/lugically_cosmic" }, 5000 );
        });
        
    </script>

     <footer>
        
    </footer>
</body>
</html>