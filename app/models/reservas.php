<?php

class reservasModel extends Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = "bookings";
  }

/**
 * Pendiente de programar
 *
 * @param [type] $a
 * @return void
 */
  public function insert($a)
  {

    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

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
/**
 * Pendiente de programar
 *
 * @param [type] $a
 * @return void
 */
  public function update($a)
  {

    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

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

}
