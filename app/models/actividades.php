<?php

class actividadesModel extends Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = "activity";
  }


  public function insert($a)
  {

    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

    try {
      $sql = "INSERT INTO $this->table ( 'name', 'description', 'capacity') 
                             VALUES (:nombre, :descripcion, :capacidad)";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':nombre' => $a,
        ':descripcion' => $a,
        ':capacidad' => $a,
      ]);

      $resultado["correcto"] = true;
    } catch (PDOException $ex) {
      $resultado["mensaje"] = $ex->getMessage();
      $resultado["correcto"] = false;
    } finally {
      return $resultado;
    }
  }

  public function update($a)
  {

    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

    try {
      $sql = "UPDATE $this->table SET 'name' = :nombre, 'description' = :descripcion, 'capacity' = :capacidad 
              WHERE $this->table.'id' = :id";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':nombre' => $a,
        ':descripcion' => $a,
        ':capacidad' => $a,
        ':id' => $a
      ]);

      $resultado["correcto"] = true;
    } catch (PDOException $ex) {
      $resultado["mensaje"] = $ex->getMessage();
      $resultado["correcto"] = false;
    } finally {
      return $resultado;
    }
  }
}
