<?php
include ("conexion.php");
$id = $_REQUEST["id"];
$sql =  "SELECT * from usuarios where id='$id'";

if ($resultado = $con->query($sql)){
    if ($resultado->num_rows > 0){
        $fila=$resultado->fetch_assoc();
        $nombre = $fila["nombre"];
    }
}
else{
    header("Location: index.php");
}

$query = "SELECT * FROM  preguntas WHERE usuario=$id ";
$resultado = $con->query($query);
if (!$resultado->num_rows>0) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nombre; ?></title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   </head>
<body>
    <header>
    
        <div class="header">
    
            <h1>preguntas raras</h1>
    
        </div>
          
    </header>
    <div class="main">
        <div class="contenedor">

            <div class="sub-titulo">

                <h2 class="my-3 text-center">vamos a checar que paso mientras no estabas</h2><hr>

            </div>

            <div class="row cuerpo">
                <?php 
                while ($fila = $resultado->fetch_assoc()) {
                    $pregunta=$fila['pregunta'];
                    $suplica=$fila['suplica'];
                    $victima=$fila['victima'];
                    $id=$fila['id'];
                ?>
    
                <div class="col-12 my-2 cuerpo-links border">
                
                    <div class="col-md-10 mx-auto cuerpo-links-titulo">
        
                        <h3 class=" text-center mt-2">Compártelo con quien quieres</h3><hr>
                
                    </div>

                    <div class="cuerpo-links-compartir">
                        <div class="cuerpo-links-compartir-victima">
                            <p>
                                Comparte este link a la persona que elegiste para la pregunta:<br>
                                <a href="#">http://localhost/quieres-ser-mi-novia¿/propuesta.php?id=<?php echo $id; ?>&nombre=<?php echo $victima; ?></a>
                            </p>
        
                        </div>
                        <div class="cuerpo-links-compartir-amigos">
                            <p>
                                Tambien puedes compartir este link para que cualquier amigo tuyo entre :D (la unica diferencia es que antes de entrar le pedira el nombre):<br>
                                <a href="#">http://localhost/quieres-ser-mi-novia¿/propuesta.php?id=<?php echo $id; ?> </a>
                            </p>
                        </div>
                       
                    </div>
                   
                </div>

                <div class="col-12 my-2 cuerpo-visitas border">
                    <div class="cuerpo-visitas-titulo">
                    <h3 class=" text-center mt-2">Tus visitas</h3><hr>
                
                    </div>
                    <div class="row">
                    
                        <?php
                        $sql =  "SELECT * FROM visitas where id_pregunta='$id'";    
                        if ($resultad = $con->query($sql)){
                            while ($fila = mysqli_fetch_array($resultad)){
                                $nombre=$fila["victima"];
                                $si=$fila["si"];
                                $rechazos=$fila["rechazos"];
                                if ($si == 0){
                                    $si = "pero luego dijo que si :D";
                                }else{
                                    $si = "y salio de la pagina antes de decir que si :C";
                                }
                        ?>
                    
                    
                        <div class="border col-10 col-md-5 border mx-auto my-3">
                            
                            
                            <p class="p-2"> <?php echo $nombre; ?> entro a la pagina te rechazo <?php echo $rechazos; ?> veces <?php echo $si; ?> </p>
                           
                        </div>
                            
                        <?php }} ?>
                    
                    </div>

                </div>  
                

                <?php } ?>
            
            </div>
    
    
        </div>
    </div>

</body>
</html>



    