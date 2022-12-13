<?php 
/* Inicializar sesión */
session_start();
/* Validar sesión */
$data = $_SESSION['id_usuario'];
if (isset($data)) {
  /* Redirigir en caso de que la sesión exista */
    header("Location: enviar.php");
  }

?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Login</title>
     <link rel="stylesheet" href="Style/login.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="cajafuera">
    <div class="formulariocaja">
       <div  class="botondeintercambiar">
            <button type="button" class="botoncambiarcaja" onclick="loginvai()" id="vaibtnlogin">Login</button>
        </div>
     <!--    <div id="btnvai"></div>
             <button type="button" class="botoncambiarcaja" onclick="registrarvai()" id="vaibtnregistrar">Registrar</button>
		-->
		<!--Formulario para el login -->
        <form id="frmlogin" class="grupo-entradas" method="POST" action="ingreso/login.php">
		<div class="logovai"><img src="img/logo coex.png"></div>
		<b><i class="fa-solid fa-envelope"></i> Correo</b>
        <input type="email" class="cajaentradatexto" name="txtcorreo" required>
		<b><i class="fa-solid fa-key"></i> Contraseña</b>
        <input type="password" class="cajaentradatexto" name="txtpassword" required>
        <div class="checkboxvai"><a onclick="abrirform()">Recuperar contraseña</a></div>
        <button type="submit" class="botonenviar" name="btnloginx">Iniciar sesión</button>
        </form>
		<!--Formulario para registrar -->
        <form id="frmregistrar" class="grupo-entradas" method="POST" action="login/registrar.php">
			<b>&#128231; Correo</b>
        <input type="email" class="cajaentradatexto" required 
		name="txtcorreo">
			<b>&#128274; Contraseña</b>
        <input type="password" class="cajaentradatexto" required name="txtpassword">
			</i>&#128100;<b> Nombre</b>
			 <input type="text" class="cajaentradatexto" required name="txtnombre">
        <div class="checkboxvai"><input type="checkbox"> Acepto los términos y condiciones de uso.</div>
        <button type="submit" class="botonenviar" name="btnregistrarx">Registrar</button>
        </form>
        </div>
    </div>
    <script>
    var x = document.getElementById("frmlogin");
    //var y = document.getElementById("frmregistrar");
    var z = document.getElementById("btnvai");
	var textcolor1=document.getElementById("vaibtnlogin");
	var textcolor2=document.getElementById("vaibtnregistrar");
	textcolor1.style.color="white";
	textcolor2.style.color="black";

       /* function registrarvai()
		{
			
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
			textcolor1.style.color="black";
			textcolor2.style.color="white";
	
        }*/
            function loginvai()
		{
			
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
			textcolor1.style.color="white";
			textcolor2.style.color="black";

        }
		
		function abrirform() {
  document.getElementById("formrecuperar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formrecuperar").style.display = "none";
}
    </script>
<div class="caja_popup" id="formrecuperar">
  <form action="ingreso/recuperar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Recuperar contraseña</th></tr>
            <tr> 
                <td><b><i class="fa-solid fa-envelope"></i> Correo</b></td>
                <td><input type="email" name="txtcorreo" required class="cajaentradatexto"></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()" class="txtrecuperar">Cancelar</button>
				   <input class="txtrecuperar" type="submit" name="btnrecuperar" value="Enviar" onClick="javascript: return confirm('¿Deseas enviar tu contraseña a tu correo?');">
			</td>
            </tr>
        </table>
    </form>
	</div>
</body>
</html>