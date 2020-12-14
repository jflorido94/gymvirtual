<!-- ******Barra de navegacion superior******* -->

<!--Navbar -->
<!-- <nav class="mb-1 navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="#">GYM Virtual</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555" aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="#">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Calendario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Reservas</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item m-1">
        <a class="nav-link" href="#">
          <i class="fa fa-envelope"></i> Mensajes
        </a>
      </li>
      <li class="nav-item avatar dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar.jpg" class="rounded-circle" alt="avatar image" width="40" height="40">
          Usuario
        </a>
        <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdownMenuLink-55">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav> -->
<!--/.Navbar -->



<header class="section-header ">
  <nav class="navbar navbar-main navbar-expand-lg navbar-light bg">
    <div class="container">
      <a class="navbar-brand" href=<?php echo (URL) ?>><img src="<?php echo (URL) ?>assets/img/logo1.png"></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav ml-auto mr-sm-2 mt-3 mt-lg-2">
          <li class="nav-item mr-3">
            <a class="nav-link" href=<?php echo (URL) ?>>Home</a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link" href="<?php echo (URL) ?>horario">Calendario</a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link" href="<?php echo (URL) ?>reservas">Reservas</a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link" href="<?php echo (URL) ?>usuarios">Usuarios</a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link" href="<?php echo (URL) ?>actividades">Actividades</a>
          </li>
      <?php if (!UserSession::existCurrentUser()) { ?>
            <li class="nav-item mr-3">
              <a class="nav-link btn btn-primary text-light" href="<?php echo (URL) ?>usuarios/login">Iniciar</a>
            </li>
        </ul>
      <?php } else { ?>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <span class="nav-link dropdown-toggle" role="button" data-toggle="dropdown">
              <img class="icon icon-md rounded-circle mr-2" src="<?php echo (URL) ?>assets/img/pruebahombre.jpg"> <?php echo UserSession::getCurrentUser() ?>
            </span>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo (URL) ?>usuarios/perfil/my">Perfil</a>
              <!-- <a class="dropdown-item" href="#">Account Settings</a> -->
              <a class="dropdown-item" href="mensajes/my">Mensajes</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo (URL . "usuarios/end") ?>">Cerrar sesión</a>
            </div>
          </li>
        </ul>
      <?php } ?>
      </div>
    </div>
  </nav>
</header>


<!-- ******Inicio de la pagina web****** (se cierra en el footer) -->
<div class="pagweb container">