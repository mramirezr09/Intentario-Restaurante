<?php
  require ('../../Static/ConstGlobal.php');
  $id = $_GET['id'];
  $prod = $_POST['prod'];
  // echo $id;
  if($prod != '' && $id != '') {
    // echo $user;
    // echo $pass;
    require('../../App/Controller/Controller-actualizaProducto.php');
    $inp = new updPro();
    echo $inp -> act_Producto();
  }
  else {
    echo "No hay campos definidos...";
    // require_once('../../App/View/actualizaProducto.inv.view.php');
    // return ;
  }
