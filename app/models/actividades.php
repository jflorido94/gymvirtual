<?php

class actividadesModel extends Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = "activity";
  }

  public function select()
  {
    $resultado = [];

    try {
      $sql = "SELECT * FROM $this->table";

      $query = $this->db->getConnection()->prepare($sql);
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
      $sql = "DELETE from $this->table where id = :id";

      $query = $this->db->getConnection()->prepare($sql);
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