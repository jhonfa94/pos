<div id="back"></div> <!-- ID PARA LA IMAGEN DEL LOGIN  -->
<div class="login-box">
  <div class="login-logo">
    <img src="views/img/plantilla/logo-blanco-bloque.png" class="img-fluid" style="padding:30px 100px 0px 100px;">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingresar al sistema</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="ingUsuario" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="ingPassword" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>

        <?php

          $login = new ControladorUsuarios();
          $login->ctrIngresoUsuario();


        ?>


      </form>


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->