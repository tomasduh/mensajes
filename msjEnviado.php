<?php  
require_once 'twilio-php-main/src/Twilio/autoload.php'; 
include('bd/conexion.php');
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$empresa = $_POST['txtempresa'];
$mensaje = $_POST['txtmensaje'];
$asunto = $_POST['txtasunto'];
$archivo = $_POST['txtarchivo'];
 
if(isset($_POST['enviarWhatsApp'])){
    foreach($empresa as $emp){
        $consulta = "SELECT usr.Telefono_usr FROM tbl_productos as usr 
        inner join empresa as emp on 
        emp.id_emp = usr.Empresa_usr
        where emp.id_emp=$emp";
use Twilio\Rest\Client; 
 
$sid    = "ACb9bf33c470cd7cacb76426360979e24f"; 
$token  = "6d1d634381833bf2184508f97ed203b0"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("whatsapp:+573172839069", // to 
                           array( 
                               "from" => "whatsapp:+14155238886",       
                               "body" => $mensaje
                           ) 
                  ); 
 
print($message->sid);
}

?>