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
  // var_dump($this->datos);
  // var_dump($this->mensaje);
  ?>
  <div class="container row d-flex justify-content-center m-4">

    <div class="card col ">
      <div class="card-header row d-flex justify-content-between">
        <h4 class="">Usuarios</h4>
        <div></div>
      </div>

      <table class="table table-hover">

        <thead class="">
          <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <!-- <th>Apellidos</th> -->
            <th>DNI</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Admin</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->datos as $row) { ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= $row['login'] ?></td>
              <td><?= $row['name'] . " " . $row['surnames'] ?></td>
              <td><?= $row['nif'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['phone'] ?></td>
              <td><?= $row['address'] ?></td>
              <td><?= ($row['rol_id'] == 1) ? '<i class="fa fa-check-circle"></i>' : '<i class="fa fa-times-circle"></i>' ?></td>
              <td>
                <div class="btn-group">
                  <!-- <a class="btn btn-success btn-sm" href="<?= URL . "incidencias/detinc/" . $row['id'] ?>"> <i class="fa fa-key"></i></a> -->
                  <a class="btn btn-primary btn-sm" href="<?= URL . "incidencias/detinc/" . $row['id'] ?>"> <i class="fa fa-key"></i></a>
                  <a class="btn btn-dark btn-sm" href="<?= URL . "incidencias/meninc/" . $row['id'] ?>"><i class="fa fa-comments"></i></a>
                  <a class="btn btn-danger btn-sm" href="<?= URL . "incidencias/delinc/" . $row['id'] ?>"><i class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>
</body>

</html>