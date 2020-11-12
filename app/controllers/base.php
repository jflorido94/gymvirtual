<?php 

class controlador
{
  protected $vista;
  protected $modelo;

  function __construct()
  {
    $this->vista = new vista();
  }

  public function cargarmodelo($nombre)
  {
    $ruta = 'models/' . $nombre . '.php';

    if (file_exists($ruta)) {
      require $ruta;

      $nombre.= 'Modelo' ;
      $this->modelo = new $nombre;
    }
  }


}


?>