<?php
  require ('../../Static/ConstGlobal.php');
  $prod = $_POST['prod'];

  if($prod != '') {
    // echo $user;
    // echo $pass;
    require('../../App/Controller/Controller-nuevoProducto.php');
    $inp = new insertPro();
    echo $inp -> insertar_Producto();
  }
  else {
    require_once('../../App/View/nuevoProducto.inv.view.php');
    echo "No hay campos definidos...";
  }
