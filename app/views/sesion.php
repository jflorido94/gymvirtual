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
    <div class="col-6">


      <div class="card">
        <h4 class="card-header">Iniciar sesión</h4>

        <p class="text-center alert alert-<?php echo $this->mensaje[1]; ?>"><?php echo $this->mensaje[0]; ?></p>

        <form class="card-body" action="<?php echo URL ?>usuarios/login" method="post">

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
              </div>
              <input name="usuario" class="form-control" placeholder="Usuario" type="text">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              </div>
              <input name="password" class="form-control" placeholder="Contraseña" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input">
              <div class="custom-control-label"> Mantener sesión iniciada </div>
            </label>
          </div>
          <div class="form-group">
            <button name="submit" type="submit" class="btn btn-primary btn-block"> Iniciar sesión </button>
          </div>
          <div class="form-group">
            <a href="#">Recordar contraseña</a>
          </div>

          <p class="text-center my-4">Iniciar sesión con:</p>
          <div class="text-center mb-3">
            <a href="#" class="btn btn-primary rounded-circle "> <i class="fa fa-facebook"></i> </a>
            <a href="#" class="btn btn-danger rounded-circle "> <i class="fa fa-google"></i> </a>
            <a href="#" class="btn btn-info rounded-circle "> <i class="fa fa-twitter"></i> </a>
          </div>
        </form>
        <div class="card-footer text-center">¿No tienes una cuenta? <a href="<?php echo URL ?>usuarios/registro">Registraté</a></div>
      </div>
    </div>


  </div>
  </div>

  <?php include 'includes/footer.php'; ?>
</body>

</html>