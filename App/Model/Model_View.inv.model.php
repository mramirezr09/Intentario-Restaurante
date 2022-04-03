<?php
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_WARNING & ~E_NOTICE);
	// if(!isset($_SESSION)) {
	// 	// session_start(array('name'=>'INV'));
	// }

	class vistas {
    //los funciones del modelo son protegidas
		protected function arreglo_Vistas($vista) {

      $listaURL = array('inicio','sesion','login','bienvenido','error','dashboard','nuevoProducto','ingresaProducto','actualizaProducto','actualizaProductoUpd','eliminaProducto','reportes');

			if(in_array($vista, $listaURL)) {
				if(is_file("APP/View/".$vista.".inv.view.php")) { //is_file indica si en la ruta contiene la variable
					$vistaR = "APP/View/".$vista.".inv.view.php";
				}
				else {
					$vistaR = "sesion";
				}
			}
			elseif($vista == "sesion") {
				$vistaR = "sesion";
			}
			elseif($vista == "index") {
				$vistaR = "sesion";
			}
			else {
				$vistaR = "sesion";
			}
			return $vistaR;
		}
	}
