<?php 

class nombre extends controlador
{
  
  function __construct()
  {
    parent::__construct();

  }
  public function mostrar(){
    $this->vista->cargarvista('nombre');
    }

}


?>