<?php
session_start();
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="shortcut icon" href="views/img/plantilla/icono-negro.png" type="image/x-icon">

  <title>Inventory System</title>

  <!--================================================ 
        PUGINS DE CSS
   ================================================-->

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
 

  <!--================================================ 
          PLUGINS JAVASCRIPT   
  ================================================-->

  <!-- jQuery -->
  <script src="views/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="views/plugins/datatables/jquery.dataTables.js"></script>
  <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- Sweearlet2 -->
  <script src="views/plugins/sweetalert2/sweetalert2.all.min.js"></script>


</head>

<body class="hold-transition sidebar-mini">


  <?php
  if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == 'ok') {

    echo '<div class="wrapper">';

    /* ===================== 
          CABEZOTE 
        ========================= */
    include 'modulos/cabezote.php';

    /* ===================== 
          MENU 
        ========================= */
    include 'modulos/menu.php';

    /* ===================== 
          CONTENIDO 
        ========================= */
    if (isset($_GET['ruta'])) {

      if (
        $_GET['ruta'] == 'inicio' ||
        $_GET['ruta'] == 'usuarios' ||
        $_GET['ruta'] == 'categorias' ||
        $_GET['ruta'] == 'productos' ||
        $_GET['ruta'] == 'clientes'  ||
        $_GET['ruta'] == 'ventas' ||
        $_GET['ruta'] == 'crear-venta' ||
        $_GET['ruta'] == 'reportes' ||
        $_GET['ruta'] == 'salir'
      ) {

        include "modulos/" . $_GET['ruta'] . ".php";
      } else {
        include "modulos/error404.php";
      }
    } else {

      include "modulos/inicio.php";
    }



    /* ===================== 
          FOOTER 
        ========================= */
    include 'modulos/footer.php';

    echo '</div> '; #<!-- ./wrapper -->

  } else {
    echo '<div class="login-page">';
    include 'modulos/login.php';
    echo '</div>';
  }


  ?>








  <script src='views/js/plantilla.js'></script>
</body>

</html>