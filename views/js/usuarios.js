/* ===================== 
  FOTO DEL USUARIO 
========================= */

$(".nuevaFoto").change(function(e) {
  e.preventDefault();

  var imagen = this.files[0];
  //console.log("Imagen "+imagen);

  /* ===================== 
      VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG 
    ========================= */
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevaFoto").val("");
    //Mandamos alerta de de que el archivo no es una imagen
    Swal.fire({
      icon: "error",
      title: "¡La imagen debe estar en formato JPG o PNG!",
      showConfirmButton: true,
      confirmButtonText: "Cerrar",
      closeOnConfirm: false
    });
  } else if (imagen["size"] > 2000000) {
    /* los 2000000 equivalen a 2mb 
            Teniendo en cuenta: 
            - 2 MB
            - 2.000 KB
            - 2.000.000 bytes
        */
    $(".nuevaFoto").val("");
    $(".previsualizar").attr("src", "");

    Swal.fire({
      icon: "warning",
      title: "¡La imagen no debe pesar más de 2 MB ",
      showConfirmButton: true,
      confirmButtonText: "Cerrar",
      closeOnConfirm: false
    });
  } else {
    var datosImgaen = new FileReader();
    datosImgaen.readAsDataURL(imagen);

    $(datosImgaen).on("load", function(event) {
      var rutaImagen = event.target.result;
      $(".previsualizar").attr("src", rutaImagen);
    });
  }
});

/*================================================ 
        EDITAR USUARIO   
================================================*/
$(document).on("click", ".btnEditarUsuario", function() {
  

  var idUsuario = $(this).attr("idUsuario");

  //console.log(idUsuario);

  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({
    type: "POST",
    url: "ajax/usuarios.ajax.php",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(response) {
      //console.log("respuesta: " + response);

      $("#editarNombre").val(response.nombre);
      $("#editarUsuario").val(response.usuario);
      $("#passwordActual").val(response.password);
      $("#fotoActual").val(response.foto);
      $("#editarPerfil").val(response.perfil);
      $("#editarPerfil").html(response.perfil);

      if (response.foto != "") {
        $(".previsualizar").attr("src", response.foto);
      }
    }
  });
});

/* ===================== 
  ACTIVAR USUARIO 
========================= */
$(document).on("click", ".btnActivar", function() {
  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario");

  console.log("IdUsuario => " + idUsuario);
  console.log("estadoUsuario => " + estadoUsuario);

  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
      if (window.matchMedia("(max-width:767px)").matches) {
        swal({
          title: "El usuario ha sido actualizado",
          type: "success",
          confirmButtonText: "¡Cerrar!"
        }).then(function(result) {
          if (result.value) {
            window.location = "usuarios";
          }
        });
      }
    }
  });

  if (estadoUsuario == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estadoUsuario", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activado");
    $(this).attr("estadoUsuario", 0);
  }
});

/* ===================== 
  REVISAR SI EL USUARIO YA ESTA REGISTRADO 
========================= */

$("#nuevoUsuario").change(function(e) {
  e.preventDefault();

  $(".alert").remove();

  var usuario = $(this).val();

  var datos = new FormData();
  datos.append("validarUsuario", usuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(response) {
      //console.log('Respuesta'+ response);
      if (response) {
        $("#nuevoUsuario")
          .parent()
          .after(
            '<div class="alert alert-warning" role="alert">Este usuario ya existe en la base de datos </div>'
          );
        $("#nuevoUsuario").val("");
      }
    }
  });
});

/*================================================ 
        ELIMINAR USUARIO   
================================================*/
$(document).on("click", ".btnEliminarUsuario", function() {
  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

  Swal.fire({
    icon: "warning",
    title: "¿Está seguro de borrar el usuario?",
    text: "¡Si no lo está puede cancelar la accíón!",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar usuario!"
  }).then(function(result) {
    if (result.value) {
      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario +"&fotoUsuario=" +fotoUsuario;

     

    }
  });
});
