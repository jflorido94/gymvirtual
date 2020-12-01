<?php

class usuarios extends controlador
{

  function __construct()
  {
    if (UserSession::existCurrentUser()) {
      header("location: " . URL);
    }
    parent::__construct();
    $this->vista->mensaje = ["", ""];
  }

  //---Registro--- 


  public function registro()
  {

    if (isset($_POST['submit'])) {
      if ($_POST["passconfirm"] == $_POST["password"]) {
        $nuevousuario = [
          'nombre'     => $_POST['nombre'],
          'apellidos'  => $_POST['apellidos'],
          'dni'        => $_POST['dni'],
          'telefono'   => $_POST['telefono'],
          'email'      => $_POST['email'],
          'direccion'  => $_POST['direccion'],
          'usuario'    => $_POST['usuario'],
          'password'   => sha1($_POST['password'])
        ];
        $resultado = $this->modelo->insert($nuevousuario);
        if ($resultado['correcto']) {
          $mensaje = ["Registro realizado correctamente, espere a que un administrador acepte su solicitud", "success"];
        } else {
          $mensaje = [$resultado['datos'], "danger"];
        }
      } else {
        $mensaje = ["Registro no realizado, contraseñas no coincidentes", "danger"];
      }
      $this->vista->mensaje = $mensaje;

      $this->vista->cargarvista('registro');
    } else {
      $this->vista->cargarvista('registro');
    }
  }

  //---End Registro--- 

  //---Sesion


  function login()
  {
    if (isset($_POST['submit'])) {
      $usuario = $_POST['usuario'];
      $contraseña = sha1($_POST['password']);

      $bdusuario = $this->modelo->iniciar($usuario, $contraseña);

      if ($bdusuario['correcto']) {
        $user = $bdusuario['datos']['0'];
        UserSession::setCurrentUser($user);
        header("location:" . URL);
        
      } else {
        $mensaje = [$bdusuario['datos'], "danger"];
        $this->vista->cargarvista('sesion');
      }
    } else {
      $this->vista->cargarvista('sesion');
    }
  }

  function end()
  {

    UserSession::sessionClose();
    header("location:" . URL);
  }

  //---End Sesion 

}
