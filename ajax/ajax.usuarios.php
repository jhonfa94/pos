<?php 
# REQUERIMOS EL CONTROLADOR Y EL MODELO PARA QUE REALICE LA PETICION
require_once '../controllers/usuarios.controlador.php';
require_once '../models/usuarios.modelo.php';


class AjaxUsuarios{


    /* =====================
      EDITAR USUARIO
    ======================= */

    public $idUsuario;

    public function ajaxEditarUsuario(){

        /*
            Solicitamos una respuesta  al controlador 
        */

        $item = "id"; # Especificamos que se evalue la columna id

        $valor = $this->idUsuario;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);

        

    }



}
/* 
    Si la variable pos viene con información podemos ejecutar el metodo
*/
if (isset($_POST['idUsuario'])) {
    
    # Instancio la clase
    $editar = new AjaxUsuarios();
    
    # Se asigna el valor que viene por post a la propiedad idUsuario
    $editar->idUsuario = $_POST['idUsuario'];
    
    # Ejecuto el metodo 
    $editar->ajaxEditarUsuario();
}



?>