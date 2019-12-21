<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
                        <i class="fas fa-user-plus mr-1"></i>
                        Agregar cliente
                    </button>




                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Home</a></li>
                        <li class="breadcrumb-item active">Administrar clientes</li>
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

                    <table class="table table-sm table-striped table-bordered table-hover tablas dt-responsive w-100">
                        <thead class="thead-light">
                            <tr>
                                <th style="width:10px;">#</th>
                                <th>Nombre</th>
                                <th>Documento ID</th>
                                <th>Email</th>
                                <th>Télefono</th>
                                <th>Dirección</th>
                                <th>Fecha nacimiento</th>
                                <th>Total compras</th>
                                <th>Última compra</th>
                                <th>Ingreso al sistema</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $item = null;
                            $valor = null;

                            $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

                            foreach ($clientes as $key => $value) {
                                echo '<tr>
                                        <td>' . ($key + 1) . '</td>
                                        <td>' . $value["nombre"] . '</td>
                                        <td>' . $value["documento"] . '</td>
                                        <td>' . $value["email"] . '</td>
                                        <td>' . $value["telefono"] . '</td>
                                        <td>' . $value["direccion"] . '</td>
                                        <td>' . $value["fecha_nacimiento"] . '</td> 
                                        <td>' . $value["compras"] . '</td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>' . $value["fecha"] . '</td>
                                        <td>
                                            <div class="btn-group">                                            
                                            <button class="btn btn-sm btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="' . $value["id"] . '"><i class="fas fa-edit"></i></button>

                                            <button class="btn btn-sm btn-danger btnEliminarCliente" idCliente="' . $value["id"] . '"><i class="fas fa-times"></i></button>

                                            </div>  

                                        </td>

                                        </tr>';
                            }
                            ?>
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
        MODAL PARA AGREGAR CLIENTES    
================================================-->
<div class="modal fade" data-backdrop="static" keyboard="false" id="modalAgregarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form method="post">
                <!-- INICIO DEL FORMULARIO -->

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-user-plus mr-1"></i> Agregar cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Nombre -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="nuevoCliente" placeholder="Ingresar nombre" required>
                        </div>
                    </div>

                    <!-- Documento ID -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-id-badge"></i>
                                </span>
                            </div>
                            <input class="form-control" type="number" min="0" name="nuevoDocumentoId" placeholder="Ingresar documento" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="far fa-envelope"></i>
                                </span>
                            </div>
                            <input class="form-control" type="email" name="nuevoEmail" placeholder="Ingresar email" required>
                        </div>
                    </div>

                    <!-- Telefono -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-mobile-alt"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="nuevoTelefono" placeholder="Ingresar télefono" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                        </div>
                    </div>

                    <!-- Direccion -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-search-location"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="nuevaDireccion" placeholder="Ingresar dirección" required>
                        </div>
                    </div>

                    <!-- Fecha de nacimiento -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask required>
                        </div>
                    </div>



                </div><!-- modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Cancelar</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i>
                        Guardar
                    </button>
                </div> <!-- modal-footer -->

                <?php
                # Invoco el controlador para crear el cliente
                $crearCliente = new ControladorClientes();
                $crearCliente->ctrCrearCliente();

                ?>

            </form> <!-- FIN FORMULARIO -->



        </div>
    </div>
</div>

<!-- ===================== 
  MODAL PARA EDITAR CLIENTES 
========================= -->
<div class="modal fade" data-backdrop="static" keyboard="false" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form method="post">
                <!-- INICIO DEL FORMULARIO -->

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-edit mr-1"></i> Editar cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Nombre -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="editarCliente" id="editarCliente" required>
                            <input type="hidden" id="idCliente" name="idCliente">
                        </div>
                    </div>

                    <!-- Documento ID -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-id-badge"></i>
                                </span>
                            </div>
                            <input class="form-control" type="number" min="0" name="editarDocumentoId" id="editarDocumentoId" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="far fa-envelope"></i>
                                </span>
                            </div>
                            <input class="form-control" type="email" name="editarEmail" id="editarEmail" required>
                        </div>
                    </div>

                    <!-- Telefono -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-mobile-alt"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="editarTelefono" id="editarTelefono" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                        </div>
                    </div>

                    <!-- Direccion -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-search-location"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="editarDireccion" id="editarDireccion" required>
                        </div>
                    </div>

                    <!-- Fecha de nacimiento -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="editarFechaNacimiento" id="editarFechaNacimiento" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask required>
                        </div>
                    </div>



                </div><!-- modal-body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Cancelar</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i>
                        Guardar cambios
                    </button>
                </div> <!-- modal-footer -->

            </form> <!-- FIN FORMULARIO -->

            <?php

            $editarCliente = new ControladorClientes();
            $editarCliente->ctrEditarCliente();

            ?>



        </div>
    </div>
</div>


<?php
    # ELIMINAR CLIENTE
    $eliminarCliente = new ControladorClientes();
    $eliminarCliente -> ctrEliminarCliente();

?>