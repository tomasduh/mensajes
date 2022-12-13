<?php


if($_POST){
    if(empty($_POST['txtNombreEmpresa'])){
        $arrResponse = array('status' => false, 'msg' => 'Error de datos');
    }else{
        $strNombre = ucwords(trim($_POST['txtNombreEmpresa']));

        function insetEmp(string $nombre){
            include_once '../bd/conexion.php';
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();

            $consulta = "insert into empresa(Nombre_emp)
            VALUES ('{$nombre}')";
            $result =  $conexion ->query($consulta);
            $result = $result->fetchObject();
            return $result;
        }


        $arrEmp = insetEmp($strNombre);
        print_r($arrEmp);
        if($arrEmp->id){
            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente');
        }else{
            $arrResponse = array('status' => false, 'msg' => 'Error al guardar');
        }


        
        die();
    }
}
       
?>