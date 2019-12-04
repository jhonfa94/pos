<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Agregar usuario
                    </button>




                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Home</a></li>
                        <li class="breadcrumb-item active">Administrar usuarios</li>
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

                    <table class="table table-sm table-striped table-bordered table-hover tablas dt-responsive">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Foto</th>
                                <th>Perfil</th>
                                <th>Estado</th>
                                <th>Último login</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Jhon Fabio</td>
                                <td>admin</td>
                                <td><img src="views/img/usuarios/default/anonymous.png" class="img-fluid" width="35"></td>
                                <td>Administrador</td>
                                <td><button class="btn btn-sm btn-success">Activado</button></td>
                                <td>2019-12-03 22:16:16</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Button group">
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>1</td>
                                <td>Jhon Fabio</td>
                                <td>admin</td>
                                <td><img src="views/img/usuarios/default/anonymous.png" class="img-fluid" width="35"></td>
                                <td>Administrador</td>
                                <td><button class="btn btn-sm btn-success">Activado</button></td>
                                <td>2019-12-03 22:16:16</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Button group">
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>1</td>
                                <td>Jhon Fabio</td>
                                <td>admin</td>
                                <td><img src="views/img/usuarios/default/anonymous.png" class="img-fluid" width="35"></td>
                                <td>Administrador</td>
                                <td><button class="btn btn-sm btn-danger">Desactivado</button></td>
                                <td>2019-12-03 22:16:16</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Button group">
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>

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
        MODAL PARA AGREGAR USUARIO      
================================================-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">
                <!-- INICIO DEL FORMULARIO -->

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo usuario</h5>
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
                            <input class="form-control" type="text" name="nuevoNombre" placeholder="Ingresar nombre" required>
                        </div>
                    </div>

                    <!-- Usuario -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="nuevoUsuario" placeholder="Ingresar usuario" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" name="nuevoPassword" placeholder="Ingresar contraseña" required>
                        </div>
                    </div>

                    <!-- PERFIL -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-users"></i>
                                </span>
                            </div>
                            <select class="form-control input-lg" required>
                                <option disabled selected>Seleccione el perfil</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Especial">Especial</option>
                                <option value="Vendedor">Vendedor</option>
                            </select>
                        </div>
                    </div>


                    <!-- subir foto -->
                    <div class="form-group">
                        <div class="panel">SUBIR FOTO:</div>
                        <input type="file" name="nuevaFoto" id="nuevaFoto" class="">
                        <p>Peso máximo de la foto 200 MB</p>
                        <img src="views/img/usuarios/default/anonymous.png" class="img-fluid" width="100">

                    </div>








                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i>
                        Guardar
                    </button>
                </div>
            </form> <!-- FIN FORMULARIO -->

        </div>
    </div>
</div>