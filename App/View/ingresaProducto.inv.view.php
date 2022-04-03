<?php
  require_once('Static/nav.inv.view.php');
  require_once('App/Controller/funcion_DB.inv.function.php');
  $url = $_SERVER[REQUEST_URI];
  // echo ($url);

  $conn = new PDO (IVDB);
  // var_dump($conn);
  $op1 = $conn -> query("SELECT [PK_IdProducto] as id, UPPER([Nombre_Producto]) as nombre FROM [Inventario].[dbo].[Productos] where status = 1 order by nombre");
  $op1 = $op1 -> fetchAll();

?>

<main class="contenido-t">
  <h3 class="hs">Ingresar producto a sistema</h3>
  <form class="form" action="<?php echo SRVURL; ?>App/Ajax/funcion-ingresaProductoAjax.php?url=<?php echo $url; ?>" method="POST">
    <div class="contenido--form sombra">
      <legend class="leg-f flex">Ingrese la cantidad del producto</legend>

      <div class="flex">
        <label for="prod">Producto:</label>
        <select class="flex-c" name="prod" id="prod" required title="Indique el producto a ingresar">
          <option hidden value="">--Seleccione--</option>
          <?php foreach ($op1 as $opp): ;?>
          <option value="<?php echo $opp['id']; ?>">
            <?php echo $opp['nombre']; ?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="flex">
        <label for="grup">Num Cantidad:</label>
        <input class="flex-c" type="number" min="1" name="numc" id="numc" required title="Indique la duración del producto"> <!--onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" -->
      </div>

      <div class="flex">
        <label for="dura">Fecha Ingreso:</label>
        <input class="flex-c" type="date" name="feci" id="feci" required title="Indique la duración del producto"> <!--onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" -->
      </div>

      <div class="flex">
        <label for="texa">Notas:</label>
        <textarea class="flex-c" name="texa" id="texa" rows="7" cols="70"></textarea>
      </div>

      <div class="btn">
        <input class="boton boton--primario" type="submit" value="Guardar">
      </div>

    </div>
  </form>
</main>
