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
  // var_dump($this->referencia);
  ?>
  <div class="container row d-flex justify-content-center m-4">

    <div class="card col ">
      <div class="card-header row d-flex justify-content-between">
        <h4 class="col">Chat</h4>
        <div></div>
      </div>

      <div class="card-body row mt-5 d-flex justify-content-between">
        
        <?php foreach ($this->datos as $mensaje) {
          if ($mensaje['from_users_id'] == UserSession::getCurrentUserID()) { //cambiar por mirar si el emisor es el logeado →
        ?>
            <div class="col-5">
            </div>
            <div class="col-7 alert alert-success d-flex justify-content-end">
              <?= $mensaje['enviador']. ": " . $mensaje['message'] ?>
            </div>
          <?php } else { ?>
            <div class="col-7 alert alert-secondary ">
            <?= $mensaje['enviador']. ": " . $mensaje['message'] ?>
            </div>
            <div class="col-5">
            </div>
        <?php }
        } ?>

      </div>
        <form class="card-footer row" action="<?= URL . "usuarios/sendmessage/" . $this->referencia[0] ?>" method="post">
        <div class="input-group m-4">
			    <input name="message" type="text" class="form-control" placeholder="Nuevo mensaje">
			    <div class="input-group-append">
			      <button class="btn btn-primary" type="submit" name="submit">
			        <i class="fa fa-send"></i>
			      </button>
			    </div>
		    </div>
        </form>

    </div>
  </div>
  <?php include 'includes/footer.php'; ?>
</body>

</html>