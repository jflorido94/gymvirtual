<?php 

class reservas extends controlador
{
  
  function __construct()
  {
    parent::__construct();

  }
  public function mostrar(){
    $this->vista->ex = "Vaya, esta parte de la aplicacion aun no está implementada";
    $this->vista->cargarvista("errores");
    }

}


?>