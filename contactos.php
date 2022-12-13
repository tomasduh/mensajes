<?php 
include ("template/cabecera.php"); 
session_start();
$data = $_SESSION['id_usuario'];
if (!isset($data)) {
  header("Location: index.php");
}
?>
    <div id="content">
        <table id="tablaUsuarios" class="table table-light table-striped" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Empresa</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>                                
                    <th>Correo</th>  
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="./Json/script.js"></script>
    <script src="./js/bootstrap.js"></script>
      
<!--    Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
      
    <script>
      $(document).ready(function() {
          $('#tablaUsuarios').DataTable( {
            "ajax":{
                "url": "bd/consulta.php",
                "dataSrc":""
            },
            "columns":[
                {"data": "Nombre_emp"},
                {"data": "Nombre_usr"},
                {"data": "Apellido_usr"},
                {"data": "Telefono_usr"},
                {"data": "Email_usr"},
            ]  
          });
      });
    </script>
      
    </div>    
  </body>
</html>