<?php
  require_once('Static/ConstGlobal.php');
?>
<header>
  <nav class="sombra">
    <ul class="ul1">
      <li class="prodt">
        <a href="<?php echo SRVURL; ?>dashboard/">
          <img class="logo" src="/Style/img/icon-rest.png" alt="icono-restaurante">
        </a>
      </li>
      <li class="prodt">
        Producto
        <ul class="ul2">
          <li class="prod">
            <a href="<?php echo SRVURL; ?>nuevoProducto/">
              Nuevo Producto
            </a>
          </li>
          <li class="prod">
            <a href="<?php echo SRVURL;?>ingresaProducto/">
              Ingresar Producto
            </a>
          </li>
          <li class="prod">
            <a href="<?php echo SRVURL;?>actualizaProducto/">
              Actualizar Producto
            </a>
          </li>
        </ul>
      </li>
      <li class="prodt">
        <a href="<?php echo SRVURL;?>eliminarProducto/">
          Eliminar Producto
        </a>
      </li>
      <li class="prodt">
        <a href="<?php echo SRVURL;?>reportes/">
          Reportes
        </a>
      </li>
    </ul>
  </nav>
</header>
