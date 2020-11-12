<?php 

class vista
{
  public $errorsql = null;
  
  function __construct()
  {
    
  }

  function cargarvista($nombre){
    require 'views/' . $nombre . '.php';
  }


}


?>