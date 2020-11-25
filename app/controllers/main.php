<?php 

class main extends Controlador
{
  
  function __construct()
  {
    parent::__construct();
    
  }

  public function mostrar(){
    $this->vista->cargarvista('main');
    }


}


?>