<?php
    include ("conexion.php");
    if (isset($_POST['codigo'])){
        $id = $_POST['codigo'];
        $cantidad = $_POST['cantidad'];
      
        $SQL="UPDATE visitas SET rechazos='$cantidad' where id='$id'";
        if(!$error= $con-> query($SQL)){
            echo $con->error;
        }
    
    }
    if (isset($_POST['yes'])){
        $id = $_POST['id'];
        echo $id;
        $yes = 1;
        $SQL="UPDATE visitas SET si='$yes' where id='$id'";
        if(!$error= $con-> query($SQL)){
            echo $con->error;
        }
    }

    
    
?>
