<?php

class usuarios extends controlador
{

  function __construct()
  {
    parent::__construct();
  }

  //---Registro--- 


  public function registro()
  {
    if (UserSession::existCurrentUser()) {
      header("location: " . URL);
    } else {
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
            $this->vista->mensaje = ["Registro realizado correctamente, espere a que un administrador acepte su solicitud", "success"];
          } else {
            $this->vista->mensaje = [$resultado['mensaje'], "danger"];
          }
        } else {
          $this->vista->mensaje = ["Registro no realizado, contraseñas no coincidentes", "danger"];
        }

        $this->vista->cargarvista('registro');
      } else {
        $this->vista->cargarvista('registro');
      }
    }
  }

  //---End Registro--- 

  //---Sesion

  function login()
  {
    if (UserSession::existCurrentUser()) {
      header("location: " . URL);
    } else {
      if (isset($_POST['submit'])) {
        $usuario = $_POST['usuario'];
        $contraseña = sha1($_POST['password']);

        $bdusuario = $this->modelo->iniciar($usuario, $contraseña);

        if ($bdusuario['correcto']) {
          $user = $bdusuario['datos']['0'];
          UserSession::setCurrentUser($user);
          header("location:" . URL);
        } else {
          $this->vista->mensaje = [$bdusuario['mensaje'], "danger"];
          $this->vista->cargarvista('sesion');
        }
      } else {
        $this->vista->cargarvista('sesion');
      }
    }
  }

  function end()
  {
    if (UserSession::existCurrentUser()) {
      UserSession::sessionClose();
    }
    header("location:" . URL);
  }
  //---End Sesion 

  //---Perfil

  public function perfil($id = ["my"])
  {
    if (isset($_POST['submit'])) {

      $UpUsuario = [
        'id'         => UserSession::getCurrentUserID(),
        'nombre'     => $_POST['nombre'],
        'apellidos'  => $_POST['apellidos'],
        'email'      => $_POST['email'],
        'telefono'   => $_POST['telefono'],
        'direccion'  => $_POST['direccion'],
        'password'   => sha1($_POST['password']),
      ];

      //si se desea cambiar la contraseña
      if ($_POST['pass'] != "") {
        $UpUsuario['pass'] = sha1($_POST['pass']);
        $UpUsuario['passConfirm'] = sha1($_POST['passConfirm']);
        $resultado = $this->modelo->update($UpUsuario);
      } else {
        $resultado = $this->modelo->updateSinPass($UpUsuario);
      }
      $usuario = $this->modelo->getById(UserSession::getCurrentUserID());
      $this->vista->datos = $usuario["datos"];
      if ($resultado["correcto"]) {
        UserSession::setCurrentUser($usuario["datos"]['0']);
        $this->vista->mensaje = ["Cambio realizado correctamente", "success"];
      } else {
        $this->vista->mensaje = [$resultado["mensaje"], "danger"];
      }
      $this->vista->cargarvista('perfil');
    } else {

      if ($id[0] == "my") {
        $resultado = $this->modelo->getById(UserSession::getCurrentUserID());
        $this->vista->datos = $resultado["datos"];
        $this->vista->cargarvista('perfil');
        // } elseif (UserSession::getCurrentUserAdmin()) { //Si queremos que el admin edite perfiles de otros usuarios

        //   $this->vista->cargarvista('perfilotros');
      } else {
        header("location: " . URL . "usuarios/perfil/my");
      }
    }
  }

  public function foto()
  {
  }

  //---End Perfil

  //--- Usuarios

  public function chat($id)
  {
    if ($id != UserSession::getCurrentUserID()) {
      $resultado = $this->modelo->getchat($id);

      $this->vista->referencia = $id;
      $this->vista->datos = $resultado["datos"];
      $this->vista->cargarvista("chat");
    } else {
      header("location: " . URL . "usuarios");
    }
  }

  public function sendmessage($id)
  {
    if ($id != UserSession::getCurrentUserID()) {
      if (isset($_POST['submit'])) {

        $UpMessage = [
          'emisor'         => UserSession::getCurrentUserID(),
          'message'     => $_POST['message'],
          'receptor'  => $id['0'],
        ];

        $this->modelo->mensajear($UpMessage);
      }
      header("location: " . URL . "usuarios/chat/". $id['0']);
    }
  }
  public function admin($id)
  {
    if ($id != UserSession::getCurrentUserID()) {

      $this->modelo->admin($id);
    }

    header("location: " . URL . "usuarios");
  }

  public function activar($id)
  {
    if ($id != UserSession::getCurrentUserID()) {

      $this->modelo->activar($id);
    }

    header("location: " . URL . "usuarios");
  }

  public function borrar($id)
  {
    if ($id != UserSession::getCurrentUserID()) {
      $this->modelo->delete($id);
    }
    header("location: " . URL . "usuarios");
  }

  //--- End Usuarios 

  //---Comunes

  public function mostrar()
  {
    $resultados = $this->modelo->getAll();
    $this->vista->datos = $resultados["datos"];
    $this->vista->cargarvista('usuarios');
  }
}
