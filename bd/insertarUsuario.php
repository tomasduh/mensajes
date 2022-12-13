<?php


if($_POST){
    if(empty($_POST['numDocumento']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtEmail']) || empty($_POST["Empresa"]) || empty($_POST['txtPais']) || empty($_POST['txtEstado'])
        || empty($_POST['txtDireccion']) || empty($_POST['numTelefono']) || empty($_POST['txtCargo']) || empty($_POST['txtProfesion'])){
        $arrResponse = array('status' => false, 'msg' => 'Error de datos');
    }else{
        $numDocumento = trim($_POST['numDocumento']);
        $strNombre = ucwords(trim($_POST['txtNombre']));
        $strApellido = ucwords(trim($_POST['txtApellido']));
        $strEmail = strtolower(trim($_POST['txtEmail']));
        $numEmpresa = trim($_POST['Empresa']);
        $strCargo = strtolower(trim($_POST['txtCargo']));
        $strProfesion = strtolower(trim($_POST['txtProfesion']));
        $strPais = ucwords(trim($_POST['txtPais']));
        $strEstado = ucwords(trim($_POST['txtEstado']));
        $strDireccion = ucwords(trim($_POST['txtDireccion']));
        $numTelefono = trim($_POST['numTelefono']);

        function insetUsuario(int $documento, string $nombre, string $apellido, string $email, int $empresa, string $cargo, string $profesion, string $pais, string $estado, string $direccion, int $telefono){
            include_once '../bd/conexion.php';
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();

            $consulta = "insert into tbl_productos(Documento_usr, Nombre_usr, Apellido_usr, Email_usr, Empresa_usr, Cargo_usr, Profesion_usr, Pais_usr, Estado_usr, Direccion_usr, Telefono_usr)
            VALUES ('{$documento}','{$nombre}','{$apellido}','{$email}','{$empresa}','{$cargo}','{$profesion}','{$pais}','{$estado}','{$direccion}','{$telefono}')";
            $result =  $conexion ->query($consulta);
            $result = $result->fetchObject();
            return $result;
        }


        $arrUsuario = insetUsuario($numDocumento, $strNombre, $strApellido, $strEmail, $numEmpresa, $strCargo, $strProfesion, $strPais, $strEstado, $strDireccion, $numTelefono);
        print_r($arrUsuario);
        if($arrUsuario->id){
            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente');
        }else{
            $arrResponse = array('status' => false, 'msg' => 'Error al guardar');
        }


        
        die();
    }
}
       
?>
