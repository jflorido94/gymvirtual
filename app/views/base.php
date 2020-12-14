<?php 

class vista
{
  public $errorsql = null;
  
  /**
   * mensaje de class vista
   *
   * @var array
   */
  public $mensaje = ["",""];

  public $datos = "";

  function __construct()
  {
    
  }

  function cargarvista($nombre){
    require 'views/' . $nombre . '.php';
  }


}


?>