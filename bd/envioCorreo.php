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

if($_POST){

        foreach($empresa as $emp){

            $consulta = "SELECT usr.Email_usr FROM tbl_productos as usr 
            inner join empresa as emp on 
            emp.id_emp = usr.Empresa_usr
            where usr.Empresa_usr=$emp" ;
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->rowCount();
    
            if($data >= 1){
    
                $mostrar	= $resultado ->fetchAll(); 
    
                foreach ($mostrar as $most){
    
                    $paracorreo 		= $most[0];
                    $titulo				= $asunto;
                    $cuerpo			= $mensaje;
                    
                    $mime_boundary="==Multipart_Boundary_x".md5(mt_Rand())."x";
    
                    //construiremos los encabezados de los mensajes 
                    $headers = "From: $paracorreo\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-Type: multipart/mixed;\r\n" .
                    " boundary=\"{$mime_boundary}\"";
                     
                    //comenzaremos el cuerpo del mensaje.
                    $message = " Mensaje :".$cuerpo;
                     
                    //crearemos la parte invisible del cuerpo del mensaje,
                    //tenga en cuenta que insertamos dos guiones delante del límite MIME
                    $message = "Este es un mensaje de varias partes en formato MIME .\n\n" .
                    "--{$mime_boundary}\n" .
                    "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
                    "Content-Transfer-Encoding: 7bit\n\n" .
                    $message . "\n\n";
                    foreach($_FILES['txt_archivo']['tmp_name'] as $key => $tmp_name){
                        //almacenar la información del archivo en variables para facilitar el acceso 
                        $tmp_name   = $_FILES['txt_archivo']['tmp_name'][$key];
                        $type       = $_FILES['txt_archivo']['type'][$key];
                        $name       = $_FILES['txt_archivo']['name'][$key];
                        $size       = $_FILES['txt_archivo']['size'][$key];
                    
                    
                    
                        //verifico si la carga se realizó correctamente
    
                        if (file_exists($tmp_name)){
                            if(is_uploaded_file($tmp_name)){
                    
                                $file = fopen($tmp_name,'rb'); //abro el archivo para una lectura binaria 
                                $dato = fread($file,filesize($tmp_name)); //leer el contenido del archivo en una variable 
                                fclose($file); //cierro el archivo
            
                                //Ahora la codificamos y la dividimos en líneas de longitud aceptables
                                $dato = chunk_split(base64_encode($dato));
            
                            }
                                $message .= "--{$mime_boundary}\n" .
                                "Content-Type: {$type};\n" .
                                " name=\"{$name}\"\n" .
                                "Content-Disposition: attachment;\n" .
                                " filename=\"{$fileatt_name}\"\n" .
                                "Content-Transfer-Encoding: base64\n\n" .
                                $dato . "\n\n";
                        }
                    }
                    $message.="--{$mime_boundary}--\n";   
                            
                    
                    $email = mail($paracorreo,$titulo,$message,$headers);
                if( $email = true ){      
                    echo "<script> alert('Mensaje enviado correctamente'); window.location '../enviar.php' </script>";
                }else{
                    echo "<script> alert('Error al enviar mensaje'); window.location '../enviar.php' </script>";
                }
    
                }
    
                
            $consulta_msj = "INSERT INTO `mensaje`(`id_empresa`, `mensaje`, `fecha`) 
            VALUES ('$emp','$mensaje','$fecha')";
            $result =  $conexion ->query($consulta_msj);
    
    
            }else{
                echo "<script> alert('Error al enviar mensaje'); window.location '../enviar.php' </script>";
            }   
            
            
        }
    
       
}else{
    echo "<script> alert('Correo no existe'); window.location '../enviar.php' </script>";
}
?>