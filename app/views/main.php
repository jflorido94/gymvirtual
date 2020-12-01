<!DOCTYPE html>
<html lang="es">
<head>
  <?php
    include 'includes/head.php';
  ?>

</head>
<body>
  <?php 
    if (!UserSession::existCurrentUser()) {
      header("location:". URL."usuarios/login");
    }
    include 'includes/header.php';
    
    if (UserSession::getCurrentUserAdmin()) {
      echo "Administrador";
    }else {
      echo "Hola Profesor del monton";
    } 
    include 'includes/footer.php'; ?>
</body>
</html>