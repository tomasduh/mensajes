<?php 
session_start();
$data = $_SESSION['id_usuario'];
if (!isset($data)) {
  header("Location: index.php");
}
include ("template/cabecera.php"); 
include ("bd/conexion.php");
$objeto = new Conexion();
$conexion = $objeto->Conectar();
?>

    <div id="content">
      <div class="row">
      <div class="col-1"></div>


      <!-- Formulario de agregar usuario-->
      
        <div class="col-5">
        <form id="frmUsuario">
          <h4>Agregar usuario</h4>
          <div class="mb-1">
            <label for="" class="form-label">Documento</label>
            <input type="number" name="numDocumento" id="numDocumento" class="form-control" placeholder="Numero de documento" aria-describedby="helpId">
          </div>
          <div class="row g-2">
            <div class="col-md">
              <div class="mb-1">
                <label for="" class="form-label">Nombre</label>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Nombre del usuario" aria-describedby="helpId">
              </div>
            </div>
            <div class="col-md">
              <div class="mb-1">
                <label for="" class="form-label">Apellido</label>
                <input type="text" name="txtApellido" id="txtApellido" class="form-control" placeholder="Apellido del usuario" aria-describedby="helpId">
              </div>
            </div>
          </div>  
          <div class="mb-1">
            <label for="" class="form-label">Email</label>
            <input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="correo electronico" aria-describedby="helpId">
          </div>
          <div class="row g-2">
            <div class="col-md">
              <div class="mb-1">
                <label for="" class="form-label">Pais</label>
                <input type="text" name="txtPais" id="txtPais" class="form-control" placeholder="Pais del usuario" aria-describedby="helpId">
              </div>
            </div>
            <div class="col-md">
              <div class="mb-1">
                <label for="" class="form-label">Departamento - Estado</label>
                <input type="text" name="txtEstado" id="txtEstado" class="form-control" placeholder="Estado del usuario" aria-describedby="helpId">
              </div>
            </div>
          </div>
        

          <label for="" class="form-label">Empresa</label>
          <select class="form-select" aria-label="Default select example" id="Empresa" name="Empresa">
          <option hidden="">---Seleccione la Empresa ---</option>
            <?php 
              $consulta = "SELECT * FROM empresa";
              $resultado = $conexion->prepare($consulta);
              $resultado->execute();
              $data=$resultado->fetchAll();       
             foreach ($data as $valores) {
               echo '<option value='.$valores['id_emp'].'>'.$valores['Nombre_emp'].'</option>';
             }
            ?>
          </select>

          <div class="row g-2">
            <div class="col-md">
              <div class="mb-1">
                <label for="" class="form-label">Cargo</label>
                <input type="text" name="txtCargo" id="txtCargo" class="form-control" placeholder="Cargo del usuario" aria-describedby="helpId">
              </div>
            </div>
            <div class="col-md">
              <div class="mb-1">
                <label for="" class="form-label">Profesion</label>
                <input type="text" name="txtProfesion" id="txtProfesion" class="form-control" placeholder="Profesion del usuario" aria-describedby="helpId">
              </div>
            </div>
          </div>  

          <div class="mb-1">
            <label for="" class="form-label">Direccion</label>
            <input type="text" name="txtDireccion" id="txtDireccion" class="form-control" placeholder="Direccion de usuario" aria-describedby="helpId">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Numero Celular</label>
            <input type="number" name="numTelefono" id="numTelefono" class="form-control" placeholder="Codigo de pais y numero" aria-describedby="helpId">
          </div>
            <button aling="center" class="btn btn-dark" href="#" role="button">Agregar Usuario</button>
          </form>
        </div>
      

      <div class="col-5"> 
      <!-- Formulario de agregar Emrpesa-->
      <h4>Agregar Empresa</h4>
      <form id="frmEmpresa">
        <div class="mb-3">
          <label for="" class="form-label">Nombre</label>
          <input type="text" name="txtNombreEmpresa" id="txtNombreEmpresa" class="form-control" placeholder="Nombre de la empresa" aria-describedby="helpId">
        </div>
        <button aling="center" class="btn btn-dark" href="#" role="button">Agregar Empresa</button>

             <!-- Poner campo de excel para agregar empresas masivas, TENER EN CUENTA CAMPOS COMO NIT TELEFONO Y CORREO DE LA EMPRESA -->



        <br><br>
      </form>
        <!-- Metodo para subir usuarios pro medio de excel-->
        <div class="mb-3">
          <hr>
          <br>
          <form id="frmExcel">
          <h4 >Agregar lista de usuarios por excel</h4>
          <input type="file" id="txt_archivo" name="txt_archivo" class="form-control">                
            </form>
        </div>
        <button class="btn btn-dark" style="width:100%" onclick="Cargar_Excel()">Importar</button>
      </div>
      <div class="col-1"></div> 
    </div>


<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./Json/script.js"></script>
    <script src="./js/bootstrap.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->



<!-- VALIDACION DE DOCUMENTO -->
<script>
document.getElementById("txt_archivo").addEventListener("change", () => {
        var fileName = document.getElementById("txt_archivo").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).
        toLowerCase();
        if(extFile=="xlsx" || extFile=="xlsb" || extFile=="xlsm" || extFile=="xltx"){
            //To do
        }else{
            Swal.fire("MENSAJE DE ADVERTENCIA", "SOLO SE ACEPTAN DOCUMENTOS EXCEL - USTED SUBIO UN ARCHIVO CON EXTENCION "+extFile, "Warning");
            document.getElementById("txt_archivo").value="";
        }

});

function Cargar_Excel(){
        let archivo = document.getElementById('txt_archivo').value;
        let frmExc = document.querySelector("#frmExcel");
        if(archivo.length==0){
            return Swal.fire("Mensaje de advertencia", "Seleccione un archivo", "warning");
        }
        let formData = new FormData();
        let excel = $("#txt_archivo")[0].files[0];
        formData.append('excel',excel);
        $.ajax({
            url: './bd/leerExcel.php',
            type: 'POST',
            data:formData,
            contentType:false,
            processData:false,
            success:function(resp){              
              Swal.fire("ARCHIVO SUBIDO CORRECTAMENTE", "","success");
              frmExc.reset();
            }
        });
        return false;
}   

//Validacion del formulario USUARIO
if(document.querySelector("#frmUsuario")){
  let frmRegistro = document.querySelector("#frmUsuario");
  frmRegistro.onsubmit = function(e){
    e.preventDefault();
    fntGuardar();

  }
  async function fntGuardar(){
    var varDocumento = document.querySelector("#numDocumento").value;
    let strNombre = document.querySelector("#txtNombre").value;
    let strApellido = document.querySelector("#txtApellido").value;
    let strEmail = document.querySelector("#txtEmail").value;
    let strPais = document.querySelector("#txtPais").value;
    let strEstado = document.querySelector("#txtEstado").value;
    var varEmpresa = document.getElementById("Empresa").value;
    let strCargo = document.querySelector("#txtCargo").value;
    let strProfesion = document.querySelector("#txtProfesion").value;
    let strDireccion = document.querySelector("#txtDireccion").value;
    var varTelefono = document.querySelector("#numTelefono").value;
    
    if(varDocumento == '' || strNombre == '' || strApellido == '' || strEmail == '' || strPais == '' || strEstado == '' || varEmpresa == '' || strDireccion == '' 
    || varTelefono == '' || strCargo == '' || strProfesion == ''){ //Validacion de que los campos no esten vacios
      
      return Swal.fire("MENSAJE DE ADVERTENCIA LLENAR TODOS LOS CAMPOS", "", "warning");
    }

    try {
      const data = new FormData(frmRegistro);
      let resp = await fetch("bd/insertarUsuario.php",{
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: data
      });
      Swal.fire("USUARIO AGREGADA CORRECTAMENTE", "","success");
      frmRegistro.reset();
      json = await resp.json();
      if(json.status){
        swal("Guardar",json.msg,"success");
        frmRegistro.reset();
      }else{
        swal("Guardar",json.msg,"error");
      }
    } catch (err) {
      console.log("ocurrio un error: "+err);
    }

  }

}

//Validacion del formulario Empresa

if(document.querySelector("#frmEmpresa")){
let frmRegistro1 = document.querySelector("#frmEmpresa");
frmRegistro1.onsubmit = function(e){
  e.preventDefault();
  fntGuardarEmp();
}
async function fntGuardarEmp(){
  let strNombreEmp = document.querySelector("#txtNombreEmpresa").value;

  if(strNombreEmp == ''){ //Validacion de que los campos no esten vacios
    
    return Swal.fire("MENSAJE DE ADVERTENCIA LLENAR TODOS LOS CAMPOS", "","warning");
  }

  try {
    const data = new FormData(frmRegistro1);
    let resp = await fetch("bd/insertarEmpresa.php",{
      method: 'POST',
      mode: 'cors',
      cache: 'no-cache',
      body: data
    });
    Swal.fire("EMPRESA AGREGADA CORRECTAMENTE", "","success");
    frmRegistro1.reset();
    json = await resp.json();
    if(json.status){
      swal("Guardar",json.msg,"success");
      frmRegistro1.reset();
    }else{
      swal("Guardar",json.msg,"error");
    }
  } catch (err) {
    console.log("ocurrio un error: "+err);
  }

}

}

</script>


    </div>    
  </body>
</html>