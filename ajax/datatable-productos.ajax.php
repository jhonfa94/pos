<?php

/* ===================== 
  CONTROLADORES Y MODELOS REQUERIDOS PARA EL AJAX 
========================= */
#Productos
require_once '../controllers/productos.controlador.php';
require_once '../models/productos.modelo.php';

#Categorias
require_once '../controllers/categorias.controlador.php';
require_once '../models/categorias.modelo.php';

class TablaProductos
{

    /* ===================== 
          MOSTRAR LA TABLA DE PRODUCTOS 
    ========================= */


    public function mostrarTablaProductos()
    {
        $item = null;
        $valor = null;

        $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

        #$imagen = "<img src='views/img/productos/default/anonymous.png' class='img-fluid' width='40'>";
        #$botones = "<div class='btn-group' role='group' aria-label='Button group'><button class='btn btn-sm btn-warning'><i class='fas fa-edit'></i></button><button class='btn btn-sm btn-danger'><i class='fas fa-times'></i></button></div>"; 

        /* $datosJson2 = '
            {
                "data": [
                [
                    "1",
                    "22",
                    "3",
                    "4",
                    "5",
                    "6",
                    "7",
                    "8",
                    "9",
                    "10"
                ],
                [
                    "11",
                    "2",
                    "3",
                    "4",
                    "5",
                    "6",
                    "7",
                    "8",
                    "9",
                    "10"
                ]
            
                
                ]
            }
       '; */

        $datosJson = '
            {
                "data": [';
            for ($i=0; $i < count($productos) ; $i++) { 
                /* ===================== 
                  TRAEMOS LA IMAGEN 
                ========================= */ 
                $imagen = "<img src='".$productos[$i]['imagen']."'  width='40'>";

                /* ===================== 
                  TRAEMOS LA CATEGORIA  
                ========================= */ 
                $item = "id";
                $valor = $productos[$i]['id_categoria'];
                $categorias = ControladorCategorias::ctrMostrarCategorias($item,$valor);

                /* ===================== 
                  EVALUAMOS EL STOCK 
                ========================= */ 
                if ($productos[$i]['stock'] <= 10) {
                    $stock = "<button class='btn btn-danger'>".$productos[$i]['stock']."</button>";
                } else if($productos[$i]['stock']  > 11 && $productos[$i]['stock'] <=15){
                    $stock = "<button class='btn btn-warning'>".$productos[$i]['stock']."</button>";                    
                }else {                    
                    $stock = "<button class='btn btn-success'>".$productos[$i]['stock']."</button>";
                }                
                

                /* ===================== 
                  TRAEMOS LAS ACCIONES 
                ========================= */ 
                $botones = "<div class='btn-group' role='group' aria-label='Button group'><button class='btn btn-sm btn-warning btnEditarProducto' idProducto='".$productos[$i]['id']."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fas fa-edit'></i></button><button class='btn btn-sm btn-danger btnEliminarProducto' idProducto='".$productos[$i]['id']."' codigo='".$productos[$i]['codigo']."' imagen='".$productos[$i]['imagen']."' ><i class='fas fa-times'></i></button></div>";
                                
                $datosJson .='
                    [
                        "'.($i+1).'",
                        "'.$imagen.'",
                        "'.$productos[$i]['codigo'].'",
                        "'.$productos[$i]['descripcion'].'",
                        "'.$categorias['categoria'].'",
                        "'.$stock.'",
                        "'.$productos[$i]['precio_compra'].'",
                        "'.$productos[$i]['precio_venta'].'",
                        "'.$productos[$i]['fecha'].'",
                        "'.$botones.'"
                    ],';                
            }   

        #Eliminamos la ultima coma para no tener problema en el json    
          $datosJson = substr($datosJson, 0, -1);     
            
                
        $datosJson .='    ]
            }
       ';
    
     
      echo $datosJson;
    }
}


/* ===================== 
  ACTIVAR AL TABLA DE PRODUCTOS 
========================= */
$activarProductos = new TablaProductos();
$activarProductos->mostrarTablaProductos();
