<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php

include('../bd/conexion.php');
/* Inicializar sesión */
session_start();

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$correo = $_POST["txtcorreo"];
$pass = $_POST["txtpassword"];

//Para iniciar sesión
if(!empty($correo) && !empty($pass)){
$consulta = "SELECT * FROM login WHERE correo ='$correo' and pass = '$pass'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->rowCount();
$session=$resultado->fetchAll();

	if ($data == 1) {
		$_SESSION['id_usuario'] = $session[0];
		?>
		<script>window.location= '../enviar.php' </script>
		<?php
	}else{
		?>
	<script>
	Swal.fire({
		title: 'Tu correo o contraseña son incorrectos',
		text: "Te vamos a redirigir al login",
		icon: 'error',
		showCancelButton: false,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'OK'
		}).then((result) => {
			if (result.isConfirmed) {(
			window.location= '../index.php'
			)}
		})			
	</script>
		<?php
	}
}

?>
</body>
</html>
