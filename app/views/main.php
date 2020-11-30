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
    if (!UserSession::existCurrentUser()) {
      header("location: ". URL."usuarios/registro");
    }elseif (UserSession::getCurrentUserAdmin()) {
      echo "Administrador";
    }else {
      echo "Hola Profesor del monton";
    }
  ?>

   <?php include 'includes/footer.php'; ?>
</body>
</html>