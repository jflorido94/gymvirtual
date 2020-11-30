<?php 

class UserSession {

  public function __construct()
  {
    session_start();
  }

  static public function existCurrentUser(){
    return isset($_SESSION['user']);
  }

  static public function setCurrentUser($user){
    $_SESSION['user']=$user['Usuario'];
    $_SESSION['userName']=$user['Nombre']." ".$user['Apellidos'];
    $_SESSION['userAdmin']=$user['Admin'];
  }
  
  static public function getCurrentUser(){
    return $_SESSION['user'];
  }

  static public function getCurrentUserName(){
    return $_SESSION['userName'];
  }

  static public function getCurrentUserAdmin(){
    if (isset($_SESSION['user'])) {
      if($_SESSION['userAdmin']==1){
        return true;
      }else {
        return false;
      }
    }
  }

  static public function sessionClose(){
    session_unset();
  }

}