/* ===================== 
  FOTO DEL USUARIO 
========================= */


$('.nuevaFoto').change(function (e) {
    e.preventDefault();

    var imagen = this.files[0];
    //console.log("Imagen "+imagen);

    /* ===================== 
      VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG 
    ========================= */
    if (imagen['type'] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaFoto").val('');
        //Mandamos alerta de de que el archivo no es una imagen
        Swal.fire({
            icon: 'error',
            title: '¡La imagen debe estar en formato JPG o PNG!',
            showConfirmButton: true,
            confirmButtonText: 'Cerrar',
            closeOnConfirm: false

        })

    } else if (imagen['size'] > 2000000) {
        /* los 2000000 equivalen a 2mb 
            Teniendo en cuenta: 
            - 2 MB
            - 2.000 KB
            - 2.000.000 bytes
        */
        $(".nuevaFoto").val('');
        $('.previsualizar').attr("src", '');

        Swal.fire({
            icon: 'warning',
            title: '¡La imagen no debe pesar más de 2 MB ',
            showConfirmButton: true,
            confirmButtonText: 'Cerrar',
            closeOnConfirm: false

        })

    } else {

        var datosImgaen = new FileReader;
        datosImgaen.readAsDataURL(imagen);

        $(datosImgaen).on("load", function (event) {

            var rutaImagen = event.target.result;
            $('.previsualizar').attr("src", rutaImagen);

        })


    }



});

/*================================================ 
        EDITAR USUARIO   
================================================*/
$('.btnEditarUsuario').click(function (e) {
    e.preventDefault();

    var idUsuario = $(this).attr("idUsuario");

    console.log(idUsuario);

    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({
        type: "POST",
        url: "ajax/ajax.usuarios.php",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log("respuesta: " + response
            );


            $("#editarNombre").val(response.nombre);
            $("#editarUsuario").val(response.usuario);
            $("#passwordActual").val(response.password);
            $("#fotoActual").val(response.foto);
            $("#editarPerfil").val(response.perfil);
            $("#editarPerfil").html(response.perfil);

            if (response.foto != '') {
                $(".previsualizar").attr("src",response.foto);
            }


        }
    });



});


