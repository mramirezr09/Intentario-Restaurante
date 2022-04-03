<?php
  require('../../App/Controller/funcion_DB.inv.function.php');
  $con = sqlsrv_connect(SERVER,CONNINF);

  $query= "
    SELECT
      upper(t1.[Nombre_Producto]) as 'Producto',
  	  t1.[Stock_Maximo] as 'Stock_Ideal'
  	  ,sum(t2.[Stock_Producto]) as 'En_Stock'
  	  ,t1.[Stock_Maximo]-sum(t2.[Stock_Producto]) as 'Por_Comprar'
  	  ,t1.Stock_Minimo
    FROM [Inventario].[dbo].[Productos] t1
      left join [dbo].[Stock_Producto] t2 on t2.FK_IdProducto = t1.PK_IdProducto
    GROUP BY
	    t1.Nombre_Producto,
	    t1.Stock_Maximo,
	    t1.Stock_Minimo
    HAVING
      t1.Stock_Minimo >= sum(t2.[Stock_Producto])
  ";
  // print_r($query);
  $query=sqlsrv_query($con,$query,PARAMS,OPTION);
  // print_r($inve);
  $res=sqlsrv_num_rows($query);
  // print_r($res);
  $num = $res;
  if ($num>0) {
    $n = 1;
?>
<div class="cont-t sombra">
  <table class="table">
    <thead>
      <tr class="titles">
        <th class="titles-head">N°</th>
        <th class="titles-head">Producto</th>
        <th class="titles-head">Stock Ideal</th>
        <th class="titles-head">En Stock</th>
        <th class="titles-head">Por Comprar</th>
        <th class="titles-head">Revisar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($r=sqlsrv_fetch_array($query)) {
        $producto = $r['Producto'];
        $stock_Ideal = $r['Stock_Ideal'];
        $en_Stock = $r['En_Stock'];
        $por_Comprar = $r['Por_Comprar'];
        ?>
        <tr class="row">
          <td class="row-cont"><?php echo $n ++;?></td>
          <td class="row-cont"><?php echo $producto;?></td><!--  Mau puñetas -->
          <td class="row-cont"><?php echo $stock_Ideal;?></td>
          <td class="row-cont"><?php echo $en_Stock;?></td>
          <td class="row-cont"><?php echo $por_Comprar;?></td>
          <td class="row-cont">
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                <line x1="16" y1="5" x2="19" y2="8" />
              </svg>
            </a>
          </td>
        </tr>
        <?php
      } //en while
      ?>
    </tbody>
  </table>
  <?php
}
else {
  ?>
  <div>
    <strong>Aviso!</strong> Excelente, No hay productos en compra urgente!
  </div>
  <?php
}
?>
</div>
