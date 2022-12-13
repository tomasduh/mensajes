<?php
header('Content-Type: text/html; charset=UTF-8');
include('../bd/conexion.php');

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$correo = $_POST["txtcorreo"];

//Para iniciar sesión

$consulta = "SELECT pass FROM login WHERE correo = '$correo'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->rowCount();

if ($data == 1)
{

$mostrar	= $resultado ->fetchAll(PDO::FETCH_COLUMN, 0); 
$enviarpass 	= $mostrar[0];

$paracorreo 		= $correo;
$titulo				= "Recuperar Password";
$mensaje			= "Su contraseña es:" .$enviarpass;
$tucorreo			="From: xxxx@gmail.com";

	if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
	{
		echo "<script> alert('Contraseña enviada');window.location= '../index.html' </script>";
	}else
	{
		echo "<script> alert('Error');window.location= '../index.html' </script>";
	}
}else{
	echo "<script> alert('Este correo no existe');window.location= '../index.html' </script>";
}
?>