<?php

/* =====================
  REQUERIMOS EL CONTROLADOR Y MODELO DE PRODUCTOS
======================= */

require_once '../controllers/productos.controlador.php';
require_once '../models/productos.modelo.php';

class AjaxProductos
{

    /* =====================
      GENERAR CODIGO A PARTIR DEL CODIGO DE LA CATEGORIA
    ======================= */
    public $idCategoria;

    public function ajaxCrearCodigoProducto()
    {
        $item = "id_categoria";
        $valor = $this->idCategoria;

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);
    }
}

/* =====================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA 
======================= */
if (isset($_POST['idCategoria'])) {

    $codigoProducto = new AjaxProductos();
    $codigoProducto->idCategoria = $_POST['idCategoria'];
    $codigoProducto->ajaxCrearCodigoProducto();
}
