<?php
  require_once('Static/nav.inv.view.php');
  require_once('App/Controller/funcion_DB.inv.function.php');
  $url = $_SERVER[REQUEST_URI];

  $conn = new PDO (IVDB);
  // print_r(IVDB);
  // exit;
  $op2 = $conn -> query("SELECT [PK_IdGrupo_Producto] as id, [Nombre_Grupo] as nombre FROM [Inventario].[dbo].[Grupo_Producto] order by nombre");
  $op2 = $op2 -> fetchAll();

  $op1 = $conn -> query("SELECT [PK_IdDuracion] as id, UPPER([Nombre_Duracion]) as nombre FROM [Inventario].[dbo].[Duracion] order by id");
  $op1 = $op1 -> fetchAll();

  $op3 = $conn -> query("SELECT [PK_IdMedida] as id, [Nombre_Medida] as nombre FROM [Inventario].[dbo].[Medida]");
  $op3 = $op3 -> fetchAll();
?>

<main class="contenido-t">
  <h3 class="hs">Nuevo Producto</h3>
  <form class="form" action="<?php echo SRVURL; ?>App/Ajax/funcion-nuevoProductoAjax.php?url=<?php echo $url; ?>" method="POST">
    <div class="contenido--form sombra">
      <legend class="leg-f flex">Ingrese los datos del nuevo producto</legend>

      <div class="flex">
        <label for="prod">Producto:</label>
        <input class="flex-c" type="text" name="prod" id="prod" required style="text-transform: uppercase;" title="Indique el nombre del producto">
      </div>

      <div class="flex">
        <label for="grup">Grupo:</label>
        <select class="flex-c" name="grup" id="grup" required title="Indique el grupo de alimentos">
          <option hidden value="">--Seleccione--</option>
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
          <option hidden value="">--Seleccione--</option>
          <?php foreach ($op1 as $opd): ;?>
          <option value="<?php echo $opd['id']; ?>">
            <?php echo(utf8_encode($opd['nombre'])); ?>
          </option>
          <?php endforeach; ?>
        </select>
        <input class="flex-select-input" type="number" min="1" max="12" name="duran" id="duran" required title="Indique la duración del producto"> <!--onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" -->
      </div>

      <div class="flex">
        <label for="tipom">Tipo Medida:</label>
        <select class="flex-c" name="tipom" id="tipom" required title="Indique el tipo de medida">
          <option hidden value="">--Seleccione--</option>
          <?php foreach ($op3 as $opm): ;?>
          <option value="<?php echo $opm['id']; ?>">
            <?php echo $opm['nombre']; ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="flex">
        <label for="stock">Máximo Stock:</label>
        <input class="flex-c" type="number" id="stockm" name="stockm" min="1" value="30" required title="Indique el maximo de stock recomendado">
      </div>
      <div class="flex">
        <label for="stock">Minimo Stock:</label>
        <input class="flex-c" type="number" id="stockn" name="stockn" min="1" value="5" required title="Indique el minimo de stock recomendado">
      </div>

      <div class="btn">
        <input class="boton boton--primario" type="submit" value="Guardar">
      </div>

    </div>
  </form>
</main>
