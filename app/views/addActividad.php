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
        <h4 class="card-header">Nueva Actividad</h4>

        <p class="text-center alert alert-<?php echo $this->mensaje[1]; ?>"><?php echo $this->mensaje[0]; ?></p>

        <form class="card-body" action="<?php echo URL ?>actividades/add" method="post">


          <div class="form-group form-row">
            <label class="col-md-2 col-form-label">Nombre</label>
            <div class="col-sm-5">
              <input name="nombre" class="form-control" placeholder="Nombre" type="text">
            </div>

            <label class="col-md-2 col-form-label">Aforo</label>
            <div class="col-sm-2">
              <input name="capacidad" type="number" class="form-control" placeholder="00">
            </div>

          </div>

          <div class="form-group form-row">
            <label class="col-md-2 col-form-label">Descripción</label>
            <div class="col-sm-9">
              <input name="descripcion" class="form-control" placeholder="Descripción" type="text">
            </div>
          </div>


          <div class="form-row mb-2">
            <div class="col-sm-9 offset-sm-2">
              <button name="submit" type="submit" class="btn btn-primary">Añadir</button>
            </div>
          </div>

        </form> <!-- card-body end .// -->
      </div>

    </div>
  </div>

  <?php include 'includes/footer.php'; ?>
</body>

</html>