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
        <div class="container">
            
              <h4>Envio de mensajes</h4>   
              <form id="frmEnvio" enctype="multipart/form-data">   
              
              <div class="row g-2">
              <div class="col-md-12">
              <?php 

              //bucle para la imprecion de check box

              ?>
              <input type="button"  id="multiple_update" class="btn btn-success" value="Actualizar" />
              <input type="button" name="boton" id="multiple_delete" class="btn btn-danger" value="Eliminar" />
              <input type="button"  id="refresh" class="btn btn-warning" value="Refrescar" />
              <div class="mensajes">
                <table style="text-align: center" id="datatablempresa" class="table table-light table-striped" style="width:100%">
	                <thead class="thead-dark" >
                    <tr>
                        <th width="15%">Seleccione</th>
                        <th width="84%">Nombre</th>
                        <th width="1%"></th>
                    </tr>
	              </thead>
                  <tbody>
                  </tbody>
                  <tfoot class="thead-dark">
                    <tr>
                        <th width="15%">Seleccione</th>
                        <th width="84%">Nombre</th>
                        <th width="1%"></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              </div>
              </div>
              <br>
              
              <div class="mb-1">
                <label for="" class="form-label">Asunto</label>
                <input type="text" name="txtasunto" id="txtasunto" class="form-control" placeholder="Nombre del usuario" aria-describedby="helpId">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Cuerpo del mensaje</label>
                <textarea class="form-control" name="txtmensaje" id="txtmensaje" rows="3" placeholder="ingrese el mensaje que quiere enviar"></textarea>
              </div>
              <input type="file" id="txt_archivo" name="txt_archivo[]" class="form-control" multiple="true">
              <br>
              <button name="enviarCorreo" type="submit" class="btn btn-dark btn-lg" href="#" role="button">Enviar Correo Electronico</button>
              <button name="enviarWhatsApp" type="button" id="whatsapp" class="btn btn-dark btn-lg" href="#" role="button">Enviar Mensaje WhatsApp</button>    
              </form>     
            </div>
        
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
<!--    Datatables-->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
  <script>

$(document).ready(function(){  
    
    function fetch_data()
    {
        $.ajax({
            url:"bd/consulta_empresas.php",
            method:"POST",
            dataType:"json",
            success:function(data)
            {
                var html = '';
                for(var count = 0; count < data.length; count++)
                {
                    html += '<tr>';
                    html += '<td><input type="checkbox" id="'+data[count].id_emp+'" data-name="'+data[count].Nombre_emp+'" class="check_box"  /></td>';
                    html += '<td>'+data[count].Nombre_emp+'</td></tr>';
                }
                $('tbody').html(html);
            }
        });
    }

    fetch_data();

    $(document).on('click', '.check_box', function(){
            var html = '';
            if(this.checked)
            {
                html = '<td><input type="checkbox" id="'+$(this).attr('id')+'" data-name="'+$(this).data("name")+'" class="check_box" checked /></td>';
                html += '<td><input type="text" id="name" name="name[]" class="form-control" value="'+$(this).data("name")+'" /></td>';
                html += '<td><input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';    
            }
            else
            {
                html = '<td><input type="checkbox" id="'+$(this).attr('id')+'" data-name="'+$(this).data('name')+'" class="check_box" /></td>';
                html += '<td>'+$(this).data('name')+'</td>';           
            }
            $(this).closest('tr').html(html);
    });

            $('#multiple_update').click(function(e){
                $.ajax({
                    url:'bd/actualizar_empresa.php',
                    method:'POST',
                    data:$("#frmEnvio").serialize(),
                    success:function()
                    {
                        fetch_data();
                    }
                }); 
            });

  $('#multiple_delete').click(function(){
  
  if(confirm("Are you sure you want to delete this?"))
  {
  var id = [];

  $(':checkbox:checked').each(function(i){
      id[i] = $(this).attr('id');
  });

  if(id.length === 0) //tell you if the array is empty
  {
      alert("Please Select atleast one checkbox");
  }
  else
  {

      $.ajax({
      url:'bd/eliminar_empresa.php',
      method:'POST',
      data:{id:id},
      success:function()
      {
        fetch_data();
      }

      });
  }

  }
  else
  {
  return false;
  }
}); 

//Metodo para eliminar el contenido de la pagina
$('#refresh').click(function(e){
    let frmRegistro = document.querySelector("#frmEnvio");
    fetch_data();
    frmRegistro.reset();
});

//Validacion del formulario Mensajes
$('#whatsapp').click(function(e){
        var id = [];

        $(':checkbox:checked').each(function(i){
            id[i] = $(this).attr('id');
        });

                
        let strAsunto = document.querySelector("#txtasunto").value;
        let strMensaje = document.querySelector("#txtmensaje").value;
        if(id.length === 0 || strAsunto == '' || strMensaje == '' ){ //Validacion de que los campos no esten vacios
      
            return Swal.fire("DEBES LLENAR TODOS LOS CAMPOS", "", "warning");
                
        }else{
            $.ajax({
                url:'bd/envioWhatsapp.php',
                method:'POST',
                data:$("#frmEnvio").serialize(),
                success:function()
                {
                    Swal.fire("Mensaje enviado correctamente", "","success");
                }
            }); 
        }
});
            
if(document.querySelector("#frmEnvio")){
                let frmRegistro = document.querySelector("#frmEnvio");
                frmRegistro.onsubmit = function(e){
                e.preventDefault();
                fntGuardarMsj();
                }
                async function fntGuardarMsj(){
                 
                var id = [];

                $(':checkbox:checked').each(function(i){
                    id[i] = $(this).attr('id');
                });

                
                let strAsunto = document.querySelector("#txtasunto").value;
                let strMensaje = document.querySelector("#txtmensaje").value;
                if(id.length === 0 || strAsunto == '' || strMensaje == '' ){ //Validacion de que los campos no esten vacios
      
                return Swal.fire("DEBES LLENAR TODOS LOS CAMPOS", "", "warning");
                }

                try {
                const data = new FormData(frmRegistro);
                let resp = await fetch("bd/envioCorreo.php",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data,
                    
                });
                Swal.fire("Mensaje enviado correctamente", "","success");

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




});
</script>
</div>    
  </body>
</html>
