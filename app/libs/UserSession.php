<?php

/**
 * Clase abstracta que utiliza la variable $_SESSION con mayor facilidad.
 */
abstract class UserSession
{

  public function __construct()
  {
  }

  /**
   * Inicializa todos los parametros necesarion en la pagina del usuario que inicia sesion
   *
   * @param Array $user
   * @return void
   */
  static public function setCurrentUser($user)
  {
    $_SESSION['id'] = $user['id'];
    $_SESSION['userName'] = $user['name'] . " " . $user['surnames'];
    $_SESSION['urlimg'] = $user['image'];
    $_SESSION['login'] = $user['login'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['rol'] = $user['rol_id'];
    $_SESSION['pass'] = $user['password'];
  }
  /**
   * Devuelve si existe una sesion actualmente iniciada
   *
   * @return Bool
   */
  static public function existCurrentUser()
  {
    return isset($_SESSION['login']);
  }
  /**
   * Devuelve el nombre del usuario actualmente iniciado
   *
   * @return String
   */
  static public function getCurrentUser()
  {
    return $_SESSION['login'];
  }
 /**
  * Devuelve el id del usuario
  *
  * @return String
  */  
  static public function getCurrentUserID()
  {
    return $_SESSION['id'];
  }
/**
 * Devuelve el nombre del usuario
 *
 * @return String
 */
  static public function getCurrentUserName()
  {
    return $_SESSION['userName'];
  }
/**
 * Devuelve si es administrador o no
 *
 * @return Bool
 */
  static public function getCurrentUserAdmin()
  {
    if (isset($_SESSION['login'])) {
      if ($_SESSION['rol'] == 1) {
        return true;
      } else {
        return false;
      }
    }
  }

static public function checkPassword($pass)
{
  return $pass==$_SESSION['pass'];
}

/**
 * Cierra la session iniciada
 *
 * @return void
 */
  static public function sessionClose()
  {
    session_unset();
    session_destroy();
  }
}
