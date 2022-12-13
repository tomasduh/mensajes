<?php
include ('conexion.php');
require ('../vendor/autoload.php');
$objeto = new Conexion();
$conexion = $objeto->Conectar();

class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter{
    public function readCell($column, $row, $worksheetName=''){
        if($row>1){
            return true;
        }
        return false;
    }
}

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
$inputFileName = $_FILES['excel']['tmp_name'];

//Identifica el typo de dato de inputFileName
$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
//Crea
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);

//Leo la funcion para obtener los datos de una celda en especifica mayores al # colocado en la function
$reader ->setReadFilter(new MyReadFilter());
//Carga $inputFileName a un objeto Spreadsheet
$spreadsheet = $reader ->load($inputFileName);
$cantidad = $spreadsheet->getActiveSheet()->toArray();
foreach($cantidad as $row){
    if(isset($row[0])  || isset($row[1]) || isset($row[2]) || isset($row[3]) || isset($row[4]) || isset($row[5]) || isset($row[6]) || isset($row[7]) || 
    isset($row[8]) || isset($row[9]) || isset($row[10])){

        $consulta = "SELECT * FROM empresa where Nombre_emp ='$row[4]'" ;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $mostrar	= $resultado ->fetchAll(); 
        $data=$resultado->rowCount();

        if($data >= 1){

            foreach ($mostrar as $valor){
                $id		= $valor[0];
                $consulta = "insert into tbl_productos(Documento_usr, Nombre_usr, Apellido_usr, Email_usr, Empresa_usr, Cargo_usr, Profesion_usr, Pais_usr, Estado_usr, Direccion_usr, Telefono_usr)
                VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$id','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]')";
                $result = $conexion ->query($consulta);
            }

        }else{
                $mayusculas = strtoupper($row[4]);
                $consulta = "insert into empresa(Nombre_emp) VALUES ('$mayusculas')";
                $result = $conexion ->query($consulta);

                $consulta = "SELECT * FROM empresa where Nombre_emp ='$mayusculas'" ;
                $resultado = $conexion->prepare($consulta);
                $resultado->execute();
                $mostrar	= $resultado ->fetchAll(); 

                foreach ($mostrar as $valor){
                    $id		= $valor[0];
                    $consulta = "insert into tbl_productos(Documento_usr, Nombre_usr, Apellido_usr, Email_usr, Empresa_usr, Cargo_usr, Profesion_usr, Pais_usr, Estado_usr, Direccion_usr, Telefono_usr)
                    VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$id','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]')";
                    $result = $conexion ->query($consulta);
                }
        }
        
    }
}
?>