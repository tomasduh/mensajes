<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT emp.Nombre_emp, usr.Empresa_usr, usr.Nombre_usr, usr.Apellido_usr, usr.Telefono_usr, usr.Email_usr FROM tbl_productos as usr 
inner join empresa as emp on 
emp.id_emp = usr.Empresa_usr";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>