<?php

class actividades extends controlador
{

  function __construct()
  {
    parent::__construct();
  }

  public function mostrar()
  {
    $resultados = $this->modelo->getAll();
    $this->vista->datos = $resultados["datos"];
    $this->vista->cargarvista('actividades');
  }

  public function add()
  {
    if (isset($_POST['submit'])) {

      $newActivity = [
        "name" => $_POST['nombre'],
        "capacity" => $_POST['capacidad'],
        "description" => $_POST['descripcion'],
      ];

      $resultado = $this->modelo->insert($newActivity);
      if ($resultado['correcto']) {
        header("location: " . URL . "actividades");
      } else {
        $this->vista->mensaje = [$resultado['mensaje'], "danger"];
        $this->vista->cargarvista('addActividad');
      }
    } else {

      $this->vista->cargarvista('addActividad');
    }
  }

  public function editar($id)
  {
    if (isset($_POST['submit'])) {

      $upActivity = [
        "name" => $_POST['nombre'],
        "capacity" => $_POST['capacidad'],
        "description" => $_POST['descripcion'],
        "id" => $id['0'],
      ];

      $resultado = $this->modelo->update($upActivity);
      if ($resultado['correcto']) {
        header("location: " . URL . "actividades");
      } else {
        $this->vista->mensaje = [$resultado['mensaje'], "danger"];
        $this->vista->cargarvista('editActividad');
      }
    } else {

      $resultado = $this->modelo->getById($id);

      if ($resultado['correcto']) {
        $this->vista->datos = $resultado["datos"];
        $this->vista->cargarvista('editActividad');
      } else {
        header("location: " . URL . "actividades");
      }

      $this->vista->cargarvista('editActividad');
    }
  }

  public function borrar($id)
  {
    if (UserSession::getCurrentUserAdmin()) {
      $this->modelo->delete($id);
    }
    header("location: " . URL . "actividades");
  }
}
