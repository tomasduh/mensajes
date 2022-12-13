<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="./css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="./Style/style.css" rel="stylesheet" type="text/css">
    <link href="./Style/body.css" rel="stylesheet" type="text/css">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!--    Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>

    <style>
        table.dataTable thead {
            background: linear-gradient(to right, #4A00E0, #8E2DE2);
            color:white;
        }
    </style>
    
    <script src="./Json/icons.js"></script>

    <title>Mensajes</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
    <button id="sidebarCollapse" class="btn navbar-btn">
      <i class="fas fa-lg fa-bars"></i>
    </button>
    <a class="navbar-brand" href="">
      <h3 id="logo">Centro de distribucion de mensajes</h3>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

    </div>
  </nav>

  <div class="wrapper fixed-left">
    <nav id="sidebar">
      <nav id="botones">
    <ul class="navbar-nav ml-auto">
      <br>
            <li class="nav-item active">
              <a class="nav-link" id="link" href="./enviar.php">
              <i class="fas fa-envelope fa-1x"></i>
              Enviar mensaje<span class="sr-only">(current) </span></a>
            </li>
            <br>
            <li class="nav-item active">
              <a class="nav-link" id="link" href="./historial.php">
              <i class="fas fa-list fa-1x"></i>
              Historial de mensajes<span class="sr-only">(current) </span></a>
            </li>
            <br>
            <li class="nav-item active">
              <a class="nav-link" id="link" href="./agregar.php">
              <i class="fas fa-user-plus fa-1x"></i>
              Agregar contacto<span class="sr-only">(current) </span></a>
            </li>
            <br>
            <li class="nav-item active">
              <a class="nav-link" id="link" href="./contactos.php">
              <i class="fas fa-address-book "></i>
              Lista de contactos<span class="sr-only">(current) </span></a>
            </li>

            <div class="out">
            <li class="nav-item active">
            <a class="nav-link" id="link" href="./ingreso/cerrar.php">
              <i class="fas fa-sign-out-alt"></i>
              LogOut<span class="sr-only">(current) </span></a>
            </li>
            </div>
          </ul>
    </nav>
    </nav>