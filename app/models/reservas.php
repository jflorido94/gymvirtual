<?php 

class reservasModelo extends modelo
{
  
  function __construct()
  {
    parent::__construct();
  }

  public function select()
  {
    $resultado = [];

    try {
      $sql = "SELECT * FROM 'bookings'";

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
      $sql = "INSERT INTO bookings ( 'users_id', 'activity_date', 'booking_date' , 'calendar_id') 
                             VALUES (:usuario, :fecha_acitividad, :fecha_actual, :calendario)";

      $query = $this->db->connect()->prepare($sql);
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
      $sql = "UPDATE 'bookings' SET 'users_id' = :usuario, 'activity_date' = :descripcion, 
                                  'booking_date' = :capacidad, 'calendar_id' = :calendario
              WHERE 'bookings'.'id' = :id";

      $query = $this->db->connect()->prepare($sql);
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
      $sql = "DELETE from 'bookings' where id = :id";

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
