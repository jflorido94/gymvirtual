<?php 

class UserSession {

  public function __construct()
  {
    session_start();
  }

  static public function existCurrentUser(){
    return isset($_SESSION['login']);
  }

  static public function setCurrentUser($user){
    $_SESSION['id']=$user['id'];
    $_SESSION['userName']=$user['name']." ".$user['surnames'];
    $_SESSION['urlimg']=$user['image'];
    $_SESSION['login']=$user['login'];
    $_SESSION['email']=$user['email'];
    $_SESSION['rol']=$user['rol_id'];
  }
  
  static public function getCurrentUser(){
    return $_SESSION['login'];
  }

  static public function getCurrentUserName(){
    return $_SESSION['userName'];
  }

  static public function getCurrentUserAdmin(){
    if (isset($_SESSION['login'])) {
      if($_SESSION['rol']==1){
        return true;
      }else {
        return false;
      }
    }
  }

  static public function sessionClose(){
    session_unset();
    session_destroy();
  }

}