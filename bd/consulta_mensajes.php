<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$consulta_mensaje ="SELECT emp.Nombre_emp,msj.mensaje,msj.fecha FROM mensaje as msj
inner join empresa as emp on 
emp.id_emp = msj.id_empresa";
$resultado = $conexion->prepare($consulta_mensaje);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion=null;
?>