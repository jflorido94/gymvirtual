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

    var_dump($a);

    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

    try {
      $sql = "INSERT INTO $this->table ( `name`, `description`, `capacity`) 
                             VALUES (:nombre, :descripcion, :capacidad)";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':nombre' => $a['name'],
        ':descripcion' => $a['description'],
        ':capacidad' => $a['capacity'],
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

    var_dump($a);

    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

    try {
      $sql = "UPDATE $this->table SET `name` = :nombre, `description` = :descripcion, `capacity` = :capacidad 
              WHERE $this->table.`id` = :id";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':nombre' => $a['name'],
        ':descripcion' => $a['description'],
        ':capacidad' => $a['capacity'],
        ':id' => $a['id'],
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
