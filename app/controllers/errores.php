<?php 

class errores extends controlador
{
  
  function __construct()
  {
    parent::__construct();

  }

  public function mostrar(string $ex){
    $this->vista->ex=$ex;
    $this->vista->cargarvista('errores');
    }


}


?>