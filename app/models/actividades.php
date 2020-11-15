<?php

class actividadesModelo extends modelo
{

  function __construct()
  {
    parent::__construct();
  }

  public function select()
  {
    $resultado = [];

    try {
      $sql = "SELECT * FROM 'activity'";

      $query = $this->db->connect()->prepare($sql);
      $query->execute();

      $resultado["datos"] = $query->fetchAll(PDO::FETCH_ASSOC);
      $resultado["correcto"] = true;

    } catch (PDOException $ex) {
      $resultado["datos"] = $ex->getMessage();
      $resultado["correcto"] = false;

    } finally {
      return $resultado;
    }
  }

  public function insert($a)
  {
    $resultado = [];

    try {
      $sql = "INSERT INTO activity ( 'name', 'description', 'capacity') 
                             VALUES (:nombre, :descripcion, :capacidad)";

      $query = $this->db->connect()->prepare($sql);
      $query->execute([
        ':nombre' => $a,
        ':descripcion' => $a,
        ':capacidad' => $a,
      ]);

      $resultado["correcto"] = true;

    } catch (PDOException $ex) {
      $resultado["datos"] = $ex->getMessage();
      $resultado["correcto"] = false;

    } finally {
      return $resultado;
    }
  }

public function update($a)
{
  $resultado = [];

    try {
      $sql = "UPDATE 'activity' SET 'name' = :nombre, 'description' = :descripcion, 'capacity' = :capacidad 
              WHERE 'activity'.'id' = :id";

      $query = $this->db->connect()->prepare($sql);
      $query->execute([
        ':nombre' => $a,
        ':descripcion' => $a,
        ':capacidad' => $a,
        ':id' => $a
      ]);

      $resultado["correcto"] = true;

    } catch (PDOException $ex) {
      $resultado["datos"] = $ex->getMessage();
      $resultado["correcto"] = false;

    } finally {
      return $resultado;
    }
}

public function delete($a)
{
  $resultado = [];

    try {
      $sql = "DELETE from 'activity' where id = :id";

      $query = $this->db->connect()->prepare($sql);
      $query->execute([
        ':id' => $a
      ]);

      $resultado["correcto"] = true;

    } catch (PDOException $ex) {
      $resultado["datos"] = $ex->getMessage();
      $resultado["correcto"] = false;

    } finally {
      return $resultado;
    }
}
}
