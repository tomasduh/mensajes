<?php

//multiple_update.php

include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {

    $consulta = "DELETE FROM empresa WHERE id_emp = $id";		
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();

 }
}

?>