<?php
require_once('../../App/Model/Modelo_principal.inv.model.php');
class updPro extends modelINV {
  public function act_Producto() {
    $id = $_GET['id'];
    $url = 'actualizaProducto/';

    $prod = $_POST['prod'];
    $grup = $_POST['grup'];
    $dura = $_POST['dura'];
    $duran = $_POST['duran'];
    $tipom = $_POST['tipom'];
    $stockm = $_POST['stockm'];
    $stockn = $_POST['stockn'];
    $status = 1;
    $fechaA = date('Y-m-d H:i:s');
    // print_r($fechaA);
    $insert = array(
      'id' => $id,
      'prod' => $prod,
      'grup' => $grup,
      'dura' => $dura,
      'duran' => $duran,
      'tipom' => $tipom,
      'stockm' => $stockm,
      'stockn' => $stockn,
      'status' => $status,
      'fechaA' => $fechaA
    );
    // print_r($insert);
    $guarda = modelINV :: ingrepUpd($insert);
    // exit;
    return $alerta = modelINV :: alertas($url);
  }
}
