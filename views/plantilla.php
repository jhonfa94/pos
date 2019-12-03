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

  <title>Inventory System</title>

  <!--================================================ 
        PUGINS DE CSS
   ================================================-->

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!--================================================ 
          PLUGINS JAVASCRIPT   
  ================================================-->

  <!-- jQuery -->
  <script src="views/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>


</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php
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
      include 'modulos/contenido.php'; 

      /* ===================== 
        FOOTER 
      ========================= */ 
      include 'modulos/footer.php'; 

    ?>



  </div>
  <!-- ./wrapper -->




  <script src='views/js/plantilla.js'></script>
</body>

</html>