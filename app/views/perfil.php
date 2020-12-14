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
  // var_dump($this->mensaje);
  // var_dump($this->datos);

  ?>

  <div class="container row d-flex justify-content-center m-4">
    <div class="col-8">
 

      <div class="card">
        <h4 class="card-header">Perfil</h4>

        <p class="text-center alert alert-<?= $this->mensaje[1]; ?>"><?= $this->mensaje[0]; ?></p>

        <form action="<?= URL . "usuarios/perfil" ?>" method="post" class="card-body">
          <div class="form-group">
            <img src="<?php echo (URL) ?>assets/img/pruebahombre.jpg" class="img-md rounded-circle border">
            <a href="<?php echo (URL) ?>usuarios/foto " class="ml-4 btn btn-primary">Cambiar foto de perfil</a>
          </div>
          <div class="form-row">
            <div class="col form-group">
              <label>Nombre</label>
              <input name="nombre" type="text" class="form-control" value="<?= $this->datos['0']['name'] ?>">
            </div>
            <div class="col form-group">
              <label>Apellidos</label>
              <input name="apellidos" type="text" class="form-control" value="<?= $this->datos['0']['surnames'] ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Email</label>
              <input name="email" type="email" class="form-control" value="<?= $this->datos['0']['email'] ?>">
            </div>
            <div class="form-group col-md-6">
              <label>Teléfono</label>
              <input name="telefono" type="text" class="form-control" value="<?= $this->datos['0']['phone'] ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Dirección</label>
              <input name="direccion" type="text" class="form-control" value="<?= $this->datos['0']['address'] ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Contraseña actual</label>
              <input name="password" type="password" class="form-control" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Nueva contraseña</label>
              <input name="pass" type="password" class="form-control">
            </div>
            <div class="form-group col-md-6">
              <label>Confirmar contraseña</label>
              <input name="passConfirm" type="password" class="form-control">
            </div>
          </div>

          <div class="d-flex justify-content-around">
            <button name="submit" class="btn btn-success ">Guardar</button>
            <a href="<?= URL. "usuarios/perfil" ?>" class="btn btn-info ">Restaurar</a>
          </div>

        </form>

      </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>