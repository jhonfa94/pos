/*================================================ 
        EDITAR CATEGORIA   
================================================*/

$(".tablas").on("click",".btnEditarCategoria",function(){
    var idCategoria = $(this).attr('idCategoria');
    //console.log('Categoria:'+$(this).attr('idCategoria')); 

    var datos = new FormData();
    datos.append("idCategoria",idCategoria);

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {

            $("#editarCategoria").val(response.categoria);
            $("#idCategoria").val(response.id);         
          
          
        }
    });
    

});

/*================================================ 
    ELIMINAR CATEGORIA   
================================================*/
$(".tablas").on("click",".btnEliminarCategoria",function(){
    
    var idCategoria = $(this).attr("idCategoria");

    Swal.fire({
        icon: 'warning',
        title: '¿Está seguro de borrar la Categoría?',
        text: '¡Si no lo está puede cancelar la acción!',
        showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar categoría!'
        
    }).then(function(result){
        
        if (result.value) {
            window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
        }
    })
});
