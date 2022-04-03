<?php
  ob_start(); //alacena el buffer
  try {
    require('App/Controller/funcion_inicio.inv.function.php');
    require_once('Static/ConstGlobal.php');
    $inicio = new iniciar_Sesion(); //se instancia un objeto de la clase inicio
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, inital-scale=1.0">
  <meta name="author" content="Mauricio Ramírez Rojas">
  <meta name="description" content="Sistema de Gestion de Inventarios">
  <link rel="stylesheet" href="/Style/normalize.css">
  <link rel="stylesheet" href="/Style/global.css">
  <link rel="stylesheet" href="/Style/nav.css">
  <link rel="stylesheet" href="/Style/footer.css">
  <link rel="stylesheet" href="/Style/inicio.css">
  <link rel="stylesheet" href="/Style/alerta.css">
  <link rel="stylesheet" href="/Style/formularios.css">
  <link rel="stylesheet" href="/Style/dashboard.css">
  <link rel="stylesheet" href="/Style/tablas.css">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap"  crossorigin="crossorigin" as="font">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
  <title>Inventarios</title>
</head>
<body>
  <?php
    $inicio -> inicio_sesion(); //se accede al metodo __sesion del objeto inicio
    require_once('Static/footer.inv.view.php');
  ?>
  <script src="../JS/modernizr.js"></script>
  <!-- <script src="../JS/alerta.js"></script> -->
  <script src="../../JS/JQuery/jquery-3.6.0.min.js"></script>
  <script src="../../JS/jQuery.dashboard.js"></script>
  <script src="../../JS/jQuery.productoupd.js"></script>
  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</body>
<?php
  }
  catch (Exception $e) {
    echo 'Ocurrio un error, favor de notificar al Administrador del sitio!';
  }
?>
</html>
