<?php
require_once('../../App/Model/Modelo_principal.inv.model.php');
class ingrePro extends modelINV {
  function ingresa_Producto() {
    $url = $_GET['url'];

    $prod = $_POST['prod'];
    $numc = $_POST['numc'];
    $feci = $_POST['feci'];
    $texa = $_POST['texa'];
    $status = 1;
    $fechaA= date('Y-m-d H:i:s');
    // var_dump($tipom);
    $insert = array(
      'prod' => $prod,
      'numc' => $numc,
      'feci' => $feci,
      'texa' => $texa,
      'status' => $status,
      'fechaA' => $fechaA
    );
    // print_r($insert);
    $guarda = modelINV :: ingreP($insert);
    return $alerta = modelINV :: alertas($url);
  }
}
