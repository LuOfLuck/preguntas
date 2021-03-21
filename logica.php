<?php
include ("conexion.php"); 

$nombre = $_REQUEST["nombre"];

if (empty($_REQUEST["pregunta"])){
    $pregunta = "¿quieres ser mi novia?";
}
else{
    $pregunta = $_REQUEST["pregunta"];
}

if (empty($_REQUEST["suplica"])){
    $suplica = "Por favor :c";
}
else{
    $suplica = $_REQUEST["suplica"];
}

if (empty($_REQUEST["victima"])){ 
    header("Location: index.php");
}else{
    $victima = $_REQUEST["victima"];
}

$id = rand(1,1000000);


$SQL="INSERT INTO usuarios (nombre, id) VALUES('$nombre', '$id')";	
if(!$error= $con-> query($SQL)){
	echo $con->error;
}
else{
    
    $SQL="INSERT INTO preguntas (pregunta, suplica, victima, usuario) VALUES('$pregunta', '$suplica','$victima', '$id')";    
    if(!$error= $con-> query($SQL)){
        echo $con->error;
    }
    else{
        header("Location: ver-perfil.php?id=$id");
    }
}

?>