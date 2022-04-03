<?php
require_once('../../App/Model/Modelo_principal.inv.model.php');
require_once('funcion_DB.inv.function.php');
require_once('../../Static/ConstGlobal.php');

  class sesionCon extends modelINV {
    public function iniciarSesion() {

      $user = $_POST['user'];
      $pass = $_POST['pass'];

      $conDB = modelINV :: conexionSQLServer(); //genera la conexion a la DB
      $query = "
      SELECT
        [Login]
        ,[Pass]
        ,[Status]
      FROM [Inventario].[dbo].[Usuarios]
      WHERE
        Login = '$user' and
        Pass = '$pass' and
        status = 1
      ";
      // print_r($query);

      $redycon = sqlsrv_query($conDB,$query,PARAMS,OPTION); //realiza la consulta ala DB
      $numFilas = sqlsrv_num_rows($redycon); //cuenta el numero de filas que regresa la consulta
      // var_dump($redycon);

      if ($numFilas == 1) { //si el numero de filas resultado de la consulta es igual a 1
        $vista = SRVURL."dashboard/"; //me da acceso al sistema
      }
      else {
        $vista = SRVURL."sesion/"; //si no hay resultado me regresa a la vista de sesion
      }
      return $respuesta = '<script>window.location.assign("'.$vista.'")</script>';
    }
  }
