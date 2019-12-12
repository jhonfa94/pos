/* ===================== 
  CARGAR LA TABLA DINAMICA DE PRODUCTOS
========================= */ 
/* $.ajax({
    type: "GET",
    url: "ajax/datatable-productos.ajax.php",
    
    success: function (response) {
        console.log("respuesta: "+ response);
        
    }
}); */

$('.tablaProductos').DataTable( {
    "ajax": "ajax/datatable-productos.ajax.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );

/*================================================ 
	CAPTURANDO LA CATEWGORIA PARA ASIGNAR EL CÓDIGO   
================================================*/
$("#nuevaCategoria").change(function(){
	
	var idCategoria = $(this).val();

	var datos = new FormData();
  	datos.append("idCategoria", idCategoria);
	
	$.ajax({
		type: "POST",
		url: "ajax/productos.ajax.php",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success: function (response) {

			//Si la respuesta viene vacia
			if (!response) {
				var nuevoCodigo = idCategoria+"01";
				$('#nuevoCodigo').val(nuevoCodigo);				
			}else{
				var nuevoCodigo = Number(response.codigo)+1;
				$('#nuevoCodigo').val(nuevoCodigo);

			}
			

		}
	});

});

/* ===================== 
  AGREGANDO PRECIO DE VENTA 
========================= */
$("#nuevoPrecioCompra").change(function(){	

	if ($('.porcentaje').prop("checked")) {
		var valorPorcentaje = $(".nuevoPorcentaje").val();
		//console.log("Valor porcentaje: "+valorPorcentaje);

		var porcentaje = Number(($("#nuevoPrecioCompra").val() * valorPorcentaje / 100)) + Number($("#nuevoPrecioCompra").val());
		//console.log("Porcentaje => "+porcentaje);
		
		$("#nuevoPrecioVenta").val(porcentaje);
		$("#nuevoPrecioVenta").prop("readonly",true);	
		
	} 

});

/* ===================== 
  CAMBIO DE PORCENTAJE 
========================= */ 

$(".nuevoPorcentaje").change(function(){

	if ($('.porcentaje').prop("checked")) {
		if ($('.porcentaje').prop("checked")) {
			var valorPorcentaje = $(".nuevoPorcentaje").val();
				
			var porcentaje = Number(($("#nuevoPrecioCompra").val() * valorPorcentaje / 100)) + Number($("#nuevoPrecioCompra").val());
			//console.log("Porcentaje => "+porcentaje);			
			$("#nuevoPrecioVenta").val(porcentaje);
			$("#nuevoPrecioVenta").prop("readonly",true);				
		} 
	} 

});

/* ===================== 
  INTERACTUANDO CON EL PORCENTAJE
========================= */ 
$(".porcentaje").on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
		//alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
		$("#nuevoPrecioVenta").prop("readonly",true);
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
		//alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
		$("#nuevoPrecioVenta").prop("readonly",false);
    }
});

/*================================================ 
	SUBIENDO LA FOTO DEL PRODUCTO   
================================================*/
$(".nuevaImagen").change(function(e) {
	e.preventDefault();
  
	var imagen = this.files[0];
	//console.log("Imagen "+imagen);
  
	/* ===================== 
		VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG 
	  ========================= */
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
	  $(".nuevaImagen").val("");
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
	  $(".nuevaImagen").val("");
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
   EDITAR PRODUCTO   	
================================================*/
$(".tablaProductos tbody").on("click","button.btnEditarProducto",function(){

	//console.log("IdProducto"+$(this).attr('idProducto'));

	var idProducto = $(this).attr("idProducto");

	var datos = new FormData();
	datos.append("idProducto",idProducto);

	$.ajax({
		type: "POST",
		url: "ajax/productos.ajax.php",
		data: datos,
		cache:false,
		contentType:false,
		processData:false,
		dataType: "json",
		success: function (response) {
			
			var datosCategoria = new FormData();
			datosCategoria.append("idCategoria",response.id_categoria);

			$.ajax({
				type: "POST",
				url: "ajax/categorias.ajax.php",
				data: datosCategoria,
				cache:false,
				contentType:false,
				processData:false,
				dataType: "json",
				success: function (response) {
					$("#editarCategoria").val(respuesta.id);
                  	$("#editarCategoria").html(respuesta.categoria);
					
				}
			});

			$("#editarCodigo").val(response.codigo);

           $("#editarDescripcion").val(response.descripcion);

           $("#editarStock").val(response.stock);

           $("#editarPrecioCompra").val(response.precio_compra);

           $("#editarPrecioVenta").val(response.precio_venta);

           if(response.imagen != ""){

           	$("#imagenActual").val(response.imagen);

           	$(".previsualizar").attr("src",  response.imagen);

           }
			
		}
	});

	
});