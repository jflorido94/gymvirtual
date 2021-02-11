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
        <h4 class="">Actividades</h4>
        <a href="<?= URL . "actividades/add"?>" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo</a>
      </div>

      <table class="table table-hover table-sm">

        <thead class="">
          <tr>
            <!-- <th>#</th> -->
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Aforo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($this->datos as $row) {
            if ($row['id'] != "1") { ?>
              <tr>
                <!-- <td><?= $row['id'] ?></td> -->
                <td><?= $row['name'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><?= $row['capacity'] ?></td>
                <?php if (UserSession::getCurrentUserAdmin()) { ?>
                <td>
                  <div class="btn-group">
                    <!-- <a class="btn btn-outline-success btn-sm" href="<?= URL . "actividades/detalles/" . $row['id'] ?>"><i class="fa fa-search"></i></a> -->
                    <!-- <?php if (UserSession::getCurrentUserAdmin()) { ?> -->
                      <a class="btn btn-outline-primary btn-sm" href="<?= URL . "actividades/editar/" . $row['id'] ?>"> <i class="fa fa-edit"></i></a>
                      <a class="btn btn-outline-danger btn-sm" href="<?= URL . "actividades/borrar/" . $row['id'] ?>"><i class="fa fa-trash"></i></a>
                    <!-- <?php } ?> -->
                  </div>
                </td>
                <?php } ?>
            <?php
            }
          } ?>
              </tr>
        </tbody>
      </table>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>
</body>

</html>