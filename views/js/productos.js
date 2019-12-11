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