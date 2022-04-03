<?php // Definicion de MSSQL
  define('SERVER', 'DESKTOP-KVPNC2P\SRVDSBM');// Instancia Productiva
  //define('SERVER', 'SRVDBSQL\PRUEBATI');
  define('BBDD_MSSQL','Inventario');

  define('USER','dsbm');// Usuario Productivo
  define('PASS_','Black666');

  /*
  define('USER','UsVisionCorp');/
  define('PASS_','123qwe');
  */

  define('PARAMS',array());
  define('OPTION',array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));


  define('CONNINF',array("Database"=>BBDD_MSSQL,"Uid"=>USER,"Pwd"=>PASS_));


  define ('IVDB','odbc:Driver={SQL Server}; Server='.SERVER.'; Database='.BBDD_MSSQL.'; Uid='.USER.'; Pwd='.PASS_);

  define ('METHOD','AES-256-CBC');
  define ('SECRET_KEY','@SCLP$ppro123!"#');
  define ('SECRET_IV','123');

?>
