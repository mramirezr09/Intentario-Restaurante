<?php
  require('../../App/Controller/funcion_DB.inv.function.php');

  class modelINV {

    protected function conexionDB() { //indicamos que la funcion es de tipo protected para poder usar las variables y subclases
      $connect = new PDO (IVDB); //creamos un objeto de tipo PDO propio del lenguaje php para realizar conexion a DB
      if ($connect) {
        // echo 'Conexion exitosa';
      }
      else {
        echo "No se pudo conectar, favor de validar";
      }
      return $connect; //retorna la conexion
    }

    protected function conexionSQLServer() {
      $consqls = sqlsrv_connect(SERVER,CONNINF);
      return $consqls;
    }

    protected function insertP($array){
      $insert_sql = self :: conexionDB() -> prepare(
        "INSERT INTO [Inventario].[dbo].[Productos] (
          [FK_IdGrupo]
          ,[FK_IdMedida]
          ,[FK_IdDuracion]
          ,[Nombre_Producto]
          ,[Duracion_Num]
          ,[Stock_Maximo]
          ,[Stock_Minimo]
          ,[Status]
          ,[Fecha_Actualiza]
        )
        VALUES (
          :grup,
          :tipom,
          :dura,
          :prod,
          :duran,
          :stockm,
          :stockn,
          :status,
          :fechaA
        )
      ");
      $insert_sql -> bindparam (":grup",$array['grup']);
      $insert_sql -> bindparam (":tipom",$array['tipom']);
      $insert_sql -> bindparam (":dura",$array['dura']);
      $insert_sql -> bindparam (":prod",$array['prod']);
      $insert_sql -> bindparam (":duran",$array['duran']);
      $insert_sql -> bindparam (":stockm",$array['stockm']);
      $insert_sql -> bindparam (":stockn",$array['stockn']);
      $insert_sql -> bindparam (":status",$array['status']);
      $insert_sql -> bindparam (":fechaA",$array['fechaA']);
      // print_r($array['fechaA']);

      // print_r($insert_sql);
      $insert_sql -> execute();// ejecuta consulta
		  return $insert_sql;
      // exit;
    }

    protected function ingrepUpd($array){
      $act_sql = self :: conexionDB() -> prepare(//SET LANGUAGE SPANISH
        "UPDATE [Inventario].[dbo].[Productos]
        SET
          [FK_IdGrupo] = :grup,
          [FK_IdMedida] = :tipom,
          [FK_IdDuracion] = :dura,
          [Nombre_Producto] = :prod,
          [Duracion_Num] = :duran,
          [Stock_Maximo] = :stockm,
          [Stock_Minimo] = :stockn,
          [Status] = :status,
          [Fecha_Actualiza] = :fechaA
        WHERE PK_IdProducto = :id"
      );
      $act_sql -> bindparam (":grup",$array['grup']);
      $act_sql -> bindparam (":tipom",$array['tipom']);
      $act_sql -> bindparam (":dura",$array['dura']);
      $act_sql -> bindparam (":prod",$array['prod']);
      $act_sql -> bindparam (":duran",$array['duran']);
      $act_sql -> bindparam (":stockm",$array['stockm']);
      $act_sql -> bindparam (":stockn",$array['stockn']);
      $act_sql -> bindparam (":status",$array['status']);
      $act_sql -> bindparam (":fechaA",$array['fechaA']);
      $act_sql -> bindparam (":id",$array['id']);
      // print_r($array);
      $act_sql -> execute();// ejecuta consulta
      // print_r($act_sql);
		  return $act_sql;
      // echo sqlsrv_errors();
    }

    protected function ingreP($array){
      $insert_sql = self :: conexionDB() -> prepare(
        "INSERT INTO [Inventario].[dbo].[Stock_Producto] (
          [FK_IdProducto]
          ,[Stock_Producto]
          ,[Fecha_Ingreso]
    	    ,[Notas]
          ,[Status]
          ,[Fecha_Actualiza]
        )
        VALUES (
          :prod,
          :numc,
          :feci,
          :texa,
          :status,
          :fechaA
        )
      ");
      $insert_sql -> bindparam (":prod",$array['prod']);
      $insert_sql -> bindparam (":numc",$array['numc']);
      $insert_sql -> bindparam (":feci",$array['feci']);
      $insert_sql -> bindparam (":texa",$array['texa']);
      $insert_sql -> bindparam (":status",$array['status']);
      $insert_sql -> bindparam (":fechaA",$array['fechaA']);

      $insert_sql -> execute();// ejecuta consulta
		  return $insert_sql;
      // print_r($insert_sql);
    }

    protected function alertas($vista){
      $alerta = '
        <script>
          alert("Datos Guardados con Exito!");
          window.location.assign("'.SRVURL.$vista.'");
          pause;
        </script>
      ';
      // exit;
      return $alerta;
    }
  }
