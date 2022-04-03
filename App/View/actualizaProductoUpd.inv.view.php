<?php
  require_once('Static/nav.inv.view.php');
  require_once('App/Controller/funcion_DB.inv.function.php');
  $id = $_GET['id'];
  // $url = $_SERVER[REQUEST_URI];

  $con = sqlsrv_connect(SERVER,CONNINF);
  // echo $id;
  $query = "
    SELECT
	   t1.[PK_IdProducto],
	   t1.Nombre_Producto as 'nombrep',
     t1.FK_IdGrupo as 'grup',
	   t2.Nombre_Grupo as 'grupn',
     t1.FK_IdDuracion as 'dur',
	   UPPER(t3.Nombre_Duracion) as 'durn',
	   t1.Duracion_Num as 'duran',
     t1.FK_IdMedida as 'med',
     UPPER(t4.Nombre_Medida) as 'medn',
     t1.[Stock_Maximo] as 'stockm',
     t1.Stock_Minimo as 'stockn'
    FROM [Inventario].[dbo].[Productos] t1
	   left join [dbo].[Grupo_Producto]t2 on t2.PK_IdGrupo_Producto = t1.FK_IdGrupo
     left join [dbo].[Duracion]t3 on t3.PK_IdDuracion = t1.FK_IdDuracion
     left join [dbo].[Medida]t4 on t4.PK_IdMedida = t1.FK_IdMedida
    WHERE PK_IdProducto = $id
  ";
  // print_r($query);

  $rest = sqlsrv_query($con,$query,PARAMS,OPTION);
  while($r=sqlsrv_fetch_array($rest)){
    $prod = $r['nombrep'];
    $grup = $r['grup'];
    $grupn = $r['grupn'];
    $dur = $r['dur'];
    $durn = $r['durn'];
    $duran = $r['duran'];
    $med = $r['med'];
    $medn = $r['medn'];
    $stockm = $r['stockm'];
    $stockn = $r['stockn'];
  }
  // print_r($grup);
  $conn = new PDO (IVDB);
  // var_dump($conn);
  $op2 = $conn -> query("SELECT [PK_IdGrupo_Producto] as id, UPPER([Nombre_Grupo]) as nombre FROM [Inventario].[dbo].[Grupo_Producto] order by nombre");
  $op2 = $op2 -> fetchAll();

  $op1 = $conn -> query("SELECT [PK_IdDuracion] as id, UPPER([Nombre_Duracion]) as nombre FROM [Inventario].[dbo].[Duracion] order by id");
  $op1 = $op1 -> fetchAll();

  $op3 = $conn -> query("SELECT [PK_IdMedida] as id, UPPER([Nombre_Medida]) as nombre FROM [Inventario].[dbo].[Medida]");
  $op3 = $op3 -> fetchAll();

?>

<main class="contenido-t">
  <h3 class="hs">Editar Producto</h3>
  <form class="form" action="<?php echo SRVURL.'App/Ajax/funcion-actualizaProductoUpdAjax.php/?id='.$id?>" method="POST">
    <div class="contenido--form sombra">
      <legend class="leg-f flex">Ingrese los datos del nuevo producto <span style="padding-left: 2rem;">Id Producto <?php echo $id ?></span></legend>

      <div class="flex">
        <label for="prod">Producto:</label>
        <input class="flex-c" type="text" name="prod" id="prod" required style="text-transform: uppercase;" title="Indique el nombre del producto" value="<?php echo $prod ?>">
      </div>

      <div class="flex">
        <label for="grup">Grupo:</label>
        <select class="flex-c" name="grup" id="grup" required title="Indique el grupo de alimentos">
          <option hidden  value="<?php echo $grup ?>"><?php echo $grupn ?></option>
          <?php foreach ($op2 as $opg): ;?>
          <option value="<?php echo $opg['id']; ?>">
            <?php echo $opg['nombre']; ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="flex">
        <label for="dura">Caducidad:</label>
        <select class="flex-select-input" name="dura" id="dura" required title="Indique la duración del producto">
          <option hidden value="<?php echo $dur ?>"><?php echo $durn ?></option>
          <?php foreach ($op1 as $opd): ;?>
          <option value="<?php echo $opd['id']; ?>">
            <?php echo(utf8_encode($opd['nombre'])); ?>
          </option>
          <?php endforeach; ?>
        </select>
        <input class="flex-select-input" type="number" min="1" max="12" name="duran" id="duran" required title="Indique la duración del producto" value="<?php echo $duran ?>">
      </div>

      <div class="flex">
        <label for="tipom">Tipo Medida:</label>
        <select class="flex-c" name="tipom" id="tipom" required title="Indique el tipo de medida">
          <option hidden value="<?php echo $med ?>"><?php echo $medn ?></option>
          <?php foreach ($op3 as $opm): ;?>
          <option value="<?php echo $opm['id']; ?>">
            <?php echo $opm['nombre']; ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="flex">
        <label for="stock">Máximo Stock:</label>
        <input class="flex-c" type="number" id="stockm" name="stockm" min="1" required title="Indique el maximo de stock recomendado" value="<?php echo $stockm ?>">
      </div>
      <div class="flex">
        <label for="stock">Minimo Stock:</label>
        <input class="flex-c" type="number" id="stockn" name="stockn" min="1" required title="Indique el minimo de stock recomendado" value="<?php echo $stockn ?>">
      </div>

      <div class="btn">
        <input class="boton boton--primario" type="submit" value="Guardar">
      </div>

    </div>
  </form>
</main>
