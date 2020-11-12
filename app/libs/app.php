<?php
require_once 'controllers/errores.php';
  class app  
  {
    function __construct()
    {
      try {
      $url = isset($_GET['url']) ? $_GET['url'] : 'main';
      $url = rtrim($url,'/');
      $url = explode('/', $url);

      $rutacontrolador = 'controllers/' . $url[0] . '.php';
      //existe el controlador
      if (file_exists($rutacontrolador)) { 
        require_once $rutacontrolador;
        $controlador= new $url[0];
        $controlador->cargarmodelo($url[0]);
        
        //si llama a algun metodo
        if (sizeof($url)>1) {
          //si existe ese metodo
          if (method_exists($controlador,$url['1'])) {
            //si manda algun parametro
            if (sizeof($url)>2) {
              $param=[];
              for ($i=2; $i < sizeof($url); $i++) { 
                array_push($param,$url[$i]);
              } //llamamos a la funcion con parametros
              $controlador->{$url[1]}($param);
            }else { //sin parametros llamamos a la funcion sin parametros
              $controlador->{$url[1]}();
            }
          }else { //NO existe el metodo llamado
            throw new Exception("Error!! Funcion no encontrada");
          }
        }else { //No llama a ningun metodo
          $controlador->mostrar(); //llamamos a mostrar, que estara en todos los metodos
          
        }

      }else { // NO existe el controlador
        throw new Exception("Error!! Controlador no encontrado");
      }
      
      } catch (Exception $e) {
        $ex=$e->getMessage();
        $controlador = new errores();
        $controlador->mostrar($ex);
      }

    }
  }
  

?>