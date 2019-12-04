<?php

class ControladorUsuarios
{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	public function ctrIngresoUsuario()
	{

		if (isset($_POST["ingUsuario"])) {

			if (
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
			) {

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);


				if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]) {

					$_SESSION["iniciarSesion"] = "ok";

					header("Location: inicio");


					/* echo '<script>

						window.location = "inicio";

					</script>'; */
				} else {

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
				}
			}
		}
	}

	/* ===================== 
	  REGISTRO DE USUARIO 
	========================= */
	static public function ctrCrearUsuario()
	{
		if (isset($_POST['nuevoNombre'])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
			) {

				$tabla = "usuarios";

				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array(
					"nombre" => $_POST["nuevoNombre"],
					"usuario" => $_POST["nuevoUsuario"],
					"password" => $_POST['nuevoPassword'],
					"perfil" => $_POST["nuevoPerfil"],
					"foto" => 'foto'
				);

				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

				if ($respuesta == 'ok') {
					echo "
						<script>
							Swal.fire({
								icon: 'success',
								title: '¡El usuario ha sido guardado correctamente!',						
								showConfirmButton: true,
								confirmButtonText: 'Cerrar',
								closeOnConfirm: false
								
							}).then((result)=>{

								if(result.value){
									window.location = 'usuarios';
								}

							})
						</script>
					";
				}
			} else {
				echo "
				<script>
					Swal.fire({
						icon: 'error',
						title: '¡El usuario no puede ir vacio o llevar caracteres especiales!',						
						showConfirmButton: true,
						confirmButtonText: 'Cerrar',
						closeOnConfirm: false
						
					}).then((result)=>{

						if(result.value){
							window.location = 'usuarios';
						}

					})
				</script>
				";
			}
		}
	}
}
