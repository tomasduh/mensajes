<?php

include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

if(isset($_POST["hidden_id"]))
{

    $name = $_POST['name'];

    $id = $_POST['hidden_id'];

    for($count = 0; $count < count($id); $count++)
    {
        $data = array(
            ':name'   => $name[$count],
            ':id'   => $id[$count]
           );
        $consulta = "
        UPDATE empresa 
        SET Nombre_emp = :name
        WHERE id_emp = :id
        ";	
        $resultado = $conexion->prepare($consulta);	
        $resultado->execute($data);
        
 }
}
?>