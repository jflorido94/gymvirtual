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
 /**
  * Datos de class vista
  *
  * @var string
  */
  public $datos = "";

  function __construct()
  {
    
  }

  function cargarvista($nombre){
    require 'views/' . $nombre . '.php';
  }


}


?>