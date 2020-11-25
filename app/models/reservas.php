<?php 

class reservasModel extends Model
{
  
  function __construct()
  {
    parent::__construct();
    $this->table = "->getConnection()bookings";
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
      $sql = "INSERT INTO $this->table ( 'users_id', 'activity_date', 'booking_date' , 'calendar_id') 
                             VALUES (:usuario, :fecha_acitividad, :fecha_actual, :calendario)";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':usuario' => $a,
        ':fecha_acitividad' => $a,
        ':fecha_actual' => $a,
        ':calendario' => $a,
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
      $sql = "UPDATE $this->table SET 'users_id' = :usuario, 'activity_date' = :descripcion, 
                                  'booking_date' = :capacidad, 'calendar_id' = :calendario
              WHERE $this->table.'id' = :id";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':usuario' => $a,
        ':fecha_acitividad' => $a,
        ':fecha_actual' => $a,
        ':calendario' => $a,
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
