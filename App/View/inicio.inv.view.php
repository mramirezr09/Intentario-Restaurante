<?php
  require_once('App/Controller/funcion_inicio.inv.function.php');

  $oi = New iniciar_Sesion();
  $vista = $oi -> vistas(); //ejecuta la funcion y valida si la vista existe

  if($vista == 'sesion' || $vista == 'error') {
    if($vista == 'sesion') {
      require_once('App/View/sesion.inv.view.php');
    }
    else {
      require_once('App/View/error.inv.view.php');
    }
  }
  else {
    // if(!isset($_SESSION)) {
    //   session_start(array('name'=>'INV'));
    // }
    require_once($vista);
  }
