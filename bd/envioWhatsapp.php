<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

session_start();
$data = $_SESSION['id_usuario'];
if (!isset($data)) {
  header("Location: index.php");
}

date_default_timezone_set('America/Bogota');
$fecha=date("Y-m-d H:i:s");


$empresa = $_POST['hidden_id'];
$mensaje = $_POST['txtmensaje'];
$asunto = $_POST['txtasunto'];

/* Envio de mensajes por medio de whatsapp */
require_once '../twilio/src/Twilio/autoload.php'; 
use Twilio\Rest\Client;

if($_POST){

    foreach($empresa as $emp){       
        $consulta = "SELECT usr.Telefono_usr FROM tbl_productos as usr 
        inner join empresa as emp on 
        emp.id_emp = usr.Empresa_usr
        where emp.id_emp=$emp";
 
        $sid    = "ACb9bf33c470cd7cacb76426360979e24f"; 
        $token  = "6d1d634381833bf2184508f97ed203b0"; 
        $twilio = new Client($sid, $token); 
        
        $message = $twilio->messages 
                  ->create("whatsapp:+573174965575", // to 
                           array(
                               "from" => "whatsapp:+14155238886",       
                               "body" => "*$asunto*\n"."$mensaje"
                               )
                  );  
        $consulta = "INSERT INTO `mensaje`(`id_empresa`, `mensaje`, `fecha`) 
        VALUES ('$emp','$mensaje','$fecha')";
        $result =  $conexion ->query($consulta);

 
    print($message->sid);
    }
}else{
    echo "<script> alert('Correo no existe'); window.location '../enviar.php' </script>";
}
?>