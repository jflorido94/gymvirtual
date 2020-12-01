<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  include 'includes/head.php';
  ?>
</head>

<body>
  <?php
  include 'includes/header.php';
  ?>

  <div class="container row d-flex justify-content-center m-4">
    <div class="col-8">

      
      <div class="card">
        <h4 class="card-header">Registro</h4>
        
        <p class="text-center alert alert-<?php echo $this->mensaje[1]; ?>"><?php echo $this->mensaje[0]; ?></p>

          <form class="card-body" action="<?php echo URL ?>usuarios/registro" method="post">

            <div class="form-group form-row">
              <label class="col-md-3 col-form-label">Nombre</label>
              <div class="col">
                <input name="nombre" type="text" class="form-control" placeholder="Nombre">
              </div>
              <div class="col">
                <input name="apellidos" type="text" class="form-control" placeholder="Apellidos">
              </div>
            </div>

            <div class="form-group form-row">
              <label class="col-md-3 col-form-label">DNI</label>
              <div class="col-sm-9">
                <input name="dni" class="form-control" placeholder="12345678-A" type="text">
              </div>
            </div>

            <div class="form-group form-row">
              <label class="col-md-3 col-form-label">Teléfono</label>
              <div class="col-sm-9">
                <input name="telefono" class="form-control" placeholder="Teléfono" type="text">
              </div>
            </div>

            <div class="form-group form-row">
              <label class="col-md-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input name="email" type="email" class="form-control" placeholder="ejemplo@gmail.com">
              </div>
            </div>


            <div class="form-group form-row">
              <label class="col-md-3 col-form-label">Dirección</label>
              <div class="col">
                <input name="direccion" type="text" class="form-control" placeholder="Calle, Número, Población">
              </div>
            </div>

            <div class="form-group form-row">
              <label class="col-md-3 col-form-label">Usuario</label>
              <div class="col-sm-9">
                <input name="usuario" class="form-control" placeholder="Usuario" type="text">
              </div>
            </div>

            <div class="form-group form-row">
              <label class="col-md-3 col-form-label">Contraseña</label>
              <div class="col-6">
                <input name="password" type="password" class="form-control mb-3" placeholder="Contraseña">
                <input name="passconfirm" type="password" class="form-control" placeholder="Confirmar contraseña">
              </div>
            </div>


            <div class="form-row mb-2">
              <div class="col-sm-9 offset-sm-3">
                <button name="submit" type="submit" class="btn btn-primary">Registrar</button>
              </div>
            </div>

          </form> <!-- card-body end .// -->
        <div class="card-footer text-center">¿Tienes una cuenta? <a href="<?php echo URL ?>usuarios/login">Inicia sesión</a></div>
      </div>

    </div>
  </div>

  <?php include 'includes/footer.php'; ?>
</body>

</html>