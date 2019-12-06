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
        /* Solicitamos una respuesta  al controlador */

        $item = "id"; # Especificamos que se evalue la columna id

        $valor = $this->idUsuario;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);        

    }

    /* ===================== 
      ACTIVAR USUARIO 
    ========================= */ 
    public $activarUsuario;
    public $activarId;

    public function ajaxActivarUsuario(){

        $tabla = "usuarios";

        $item1 = "estado"; //coluan de la base de datos
        $valor1 = $this->activarUsuario;

        $item2 = "id";
        $valor2 = $this->activarId;

       # SOLICITAMOS DIRECTAMENTE AL MODELO 
       $respuesta  = ModeloUsuarios::mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);


    }




}
/* 
    Si la variable pos viene con información podemos ejecutar el metodo
    EDITAR USUARIO
*/
if (isset($_POST['idUsuario'])) {
    
    # Instancio la clase
    $editar = new AjaxUsuarios();
    
    # Se asigna el valor que viene por post a la propiedad idUsuario
    $editar->idUsuario = $_POST['idUsuario'];
    
    # Ejecuto el metodo 
    $editar->ajaxEditarUsuario();
}


/* ===================== 
  ACTIVAR USUARIO 
========================= */ 
if (isset($_POST['activarUsuario'])) {
    #Instanciamos la clase
    $activarUsuario = new AjaxUsuarios();

    #Asignamos variables
    $activarUsuario->activarUsuario = $_POST['activarUsuario'];
    $activarUsuario->activarId = $_POST['activarId'];

    #EJECUTAMOS EL METODO
    $activarUsuario->ajaxActivarUsuario();




}



?>