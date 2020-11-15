<?php 

class calendarioModelo extends modelo
{
  
  function __construct()
  {
    parent::__construct();
  }

  public function select()
  {
    $resultado = [];

    try {
      $sql = "SELECT * FROM 'calendar'";

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
      $sql = "INSERT INTO calendar ( 'week_day', 'start_time', 'end_time' , 'activity_id', 'up_date', 'up_user_id' , 'down_date', 'down_user_id',) 
                             VALUES (:dia, :inicio, :final, :actividad, :creado, :creado_por, :eliminado , :eliminado_por)";

      $query = $this->db->connect()->prepare($sql);
      $query->execute([
        ':dia' => $a,
        ':inicio' => $a,
        ':final' => $a,
        ':actividad' => $a,
        ':creado' => $a,
        ':creado_por' => $a,
        ':eliminado' => $a,
        ':eliminado_por' => $a,
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
      $sql = "UPDATE 'calendar' SET 'week_day' = :dia, 'start_time' = :inicio, 'end_time' = :final, 'activity_id' = :actividad, 
                                    'up_date' = :creado, 'up_user_id' = :creado_por, 'down_date' = :eliminado, 'down_user_id' = :eliminado_por
              WHERE 'calendar'.'id' = :id";

      $query = $this->db->connect()->prepare($sql);
      $query->execute([
        ':dia' => $a,
        ':inicio' => $a,
        ':final' => $a,
        ':actividad' => $a,
        ':creado' => $a,
        ':creado_por' => $a,
        ':eliminado' => $a,
        ':eliminado_por' => $a,
        ':id' => $a,
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
      $sql = "DELETE from 'calendar' where id = :id";

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


?>