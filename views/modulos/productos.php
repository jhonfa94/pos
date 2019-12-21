<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
                        Agregar producto
                    </button>




                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Home</a></li>
                        <li class="breadcrumb-item active">Administrar productos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- ===================== 
              AGREGAR FILAS Y COLUMNAS PARA EL DESARROLLO 
            ========================= -->
            <div class="row">

                <div class="col-sm-12">

                    <table class="table table-sm table-striped table-bordered table-hover dt-responsive tablaProductos  " width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Imagen</th>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Categoría</th>
                                <th>Stock</th>
                                <th>Precio de compra</th>
                                <th>Precio de venta</th>
                                <th>Agregado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>                        
                        <tbody>

                        </tbody>
                    </table>


                </div><!-- col-sm-12 -->



            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--================================================ 
        MODAL PARA AGREGAR PRODUCTO      
================================================-->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">
                <!-- INICIO DEL FORMULARIO -->

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- ENTRADA PARA SELECCIONAR LA CATEGORÍA -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-th"></i>
                                </span>
                            </div>
                            <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                                <option disabled selected>Seleccione la categoría</option>
                                <?php 
                                    $item = null;
                                    $valor = null;

                                    $categorias = ControladorCategorias::ctrMostrarCategorias($item,$valor);

                                    foreach ($categorias as $key => $value) {
                                        echo '
                                            <option value="'.$value['id'].'">'.$value['categoria'].'</option>
                                        '; 
                                    }




                                ?>
                            </select>
                        </div>
                    </div>



                    <!-- ENTRADA PARA EL CÓDIGO -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-code"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" required readonly>
                        </div>
                    </div>

                    <!-- ENTRADA PARA LA DESCRIPCION -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fab fa-product-hunt"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="nuevaDescripcion" placeholder="Ingresar descripción" required>
                        </div>
                    </div>




                    <!-- ENTRADA PARA EL STOCK -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-check"></i>
                                </span>
                            </div>
                            <input class="form-control" type="number" name="nuevoStock" min="0" placeholder="Ingresar stock" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- ENTRADA PARA EL PRECIO COMPRA -->

                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-arrow-up"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="number" step="any" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0" placeholder="Precio de compra" required>
                            </div>

                        </div>



                        <!-- ENTRADA PARA EL PRECIO VENTA -->
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-arrow-down"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="number" step="any" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" placeholder="Precio de venta" required>

                            </div>


                        </div> <!-- col-sm-6 -->

                    </div>

                    <div class="form-group row">
                        <!-- CHECKBOX PARA PORCENTAJE -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="checkboxPrimary1" checked class="porcentaje" ><!-- checked -->
                                    <label for="checkboxPrimary1">
                                        Utilizar porcentaje
                                    </label>
                                </div>
                            </div>
                        </div> <!-- col-sm-12 -->

                        <div class="col-sm-6">

                            <div class="input-group mb-3">
                                <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" aria-label="Username" aria-describedby="basic-addon1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- subir foto -->
                    <div class="form-group">
                        <div class="panel">SUBIR IMAGEN:</div>
                        <input type="file" name="nuevaImagen" id="nuevaImagen" class="nuevaImagen">
                        <p>Peso máximo de la foto 2 MB</p>
                        <img src="views/img/productos/default/anonymous.png" class="img-fluid previsualizar" width="100">

                    </div>








                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i>
                        Guardar Producto
                    </button>
                </div>

                <?php 
                    /* =====================
                    SE EJECUTA EL COTROLADOR PARA GUARDAR EL PRODUCTO
                    ======================= */
                    $productos = new ControladorProductos();
                    $productos->ctrCrearProducto();
                
                ?>

            </form> <!-- FIN FORMULARIO -->

        </div>
    </div>
</div>

<!--================================================ 
        MODAL PARA EDITAR PODUCTO   
================================================-->
<div class="modal fade" id="modalEditarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">
                <!-- INICIO DEL FORMULARIO -->

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- ENTRADA PARA SELECCIONAR LA CATEGORÍA -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-th"></i>
                                </span>
                            </div>
                            <select class="form-control input-lg"  name="editarCategoria" required readonly>
                                <option did="editarCategoria"></option>                                
                            </select>
                        </div>
                    </div>



                    <!-- ENTRADA PARA EL CÓDIGO -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-code"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" id="editarCodigo" name="editarCodigo"  required readonly>
                        </div>
                    </div>

                    <!-- ENTRADA PARA LA DESCRIPCION -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fab fa-product-hunt"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" id="editarDescripcion" name="editarDescripcion"  required>
                        </div>
                    </div>




                    <!-- ENTRADA PARA EL STOCK -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-check"></i>
                                </span>
                            </div>
                            <input class="form-control" type="number" id="editarStock" name="editarStock" min="0"  required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- ENTRADA PARA EL PRECIO COMPRA -->

                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-arrow-up"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="number" step="any" id="editarPrecioCompra" name="editarPrecioCompra" min="0"  required>
                            </div>

                        </div>



                        <!-- ENTRADA PARA EL PRECIO VENTA -->
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fas fa-arrow-down"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="number" step="any" id="editarPrecioVenta" name="editarPrecioVenta" min="0" readonly  required> 

                            </div>


                        </div> <!-- col-sm-6 -->

                    </div>

                    <div class="form-group row">
                        <!-- CHECKBOX PARA PORCENTAJE -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" id="checkboxPrimary1" checked class="porcentaje" ><!-- checked -->
                                    <label for="checkboxPrimary1">
                                        Utilizar porcentaje
                                    </label>
                                </div>
                            </div>
                        </div> <!-- col-sm-12 -->

                        <div class="col-sm-6">

                            <div class="input-group mb-3">
                                <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" aria-label="Username" aria-describedby="basic-addon1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">%</span>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- subir foto -->
                    <div class="form-group">
                        <div class="panel">SUBIR IMAGEN:</div>
                        <input type="file" name="nuevaImagen" id="editarImagen" class="nuevaImagen">
                        <p>Peso máximo de la foto 2 MB</p>
                        <img src="views/img/productos/default/anonymous.png" class="img-fluid previsualizar" width="100">

                        <input type="hidden" name="imagenActual" id="imagenActual">

                    </div>








                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i>
                        Guardar Cambios
                    </button>
                </div>

                <?php 
                    /* =====================
                    SE EJECUTA EL COTROLADOR PARA GUARDAR LOS CAMBIOS DEL PRODUCTO
                    ======================= */
                    /* $productos = new ControladorProductos();
                    $productos->ctrEditarProducto(); */
                
                ?>

            </form> <!-- FIN FORMULARIO -->

        </div>
    </div>
</div>