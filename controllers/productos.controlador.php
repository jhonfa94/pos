<?php

class ControladorProductos
{

  /* =====================
      MOSTRAR PRODCUTOS
    ======================= */
  static public function ctrMostrarProductos($item, $valor)
  {

    $tabla = "productos";

    $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

    return $respuesta;
  }

  /* ===================== 
      ALMACENAR PRODUCTO 
    ========================= */
  static public function ctrCrearProducto()
  {

    if (isset($_POST['nuevaDescripcion'])) {

      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
        preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
        preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) &&
        preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])
      ) {

        $ruta = "views/img/productos/default/anonymous.png";


        $tabla = "productos";
        $datos = array("id_categoria" => $_POST["nuevaCategoria"],
							   "codigo" => $_POST["nuevoCodigo"],
							   "descripcion" => $_POST["nuevaDescripcion"],
							   "stock" => $_POST["nuevoStock"],
							   "precio_compra" => $_POST["nuevoPrecioCompra"],
							   "precio_venta" => $_POST["nuevoPrecioVenta"],
                 "imagen" => $ruta);
                 
        $respuesta = ModeloProductos::mdlIngresarProducto($tabla,$datos);

        if($respuesta == "ok"){

					echo'<script>

						swal({
							  icon: "success",
							  title: "El producto ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "productos";

										}
									})

						</script>';

				}






      } else {
        echo '<script>

					Swal.fire({
						  icon: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							  window.location = "productos";

							}
						})

			  	</script>';
      }
    }
  }
}
