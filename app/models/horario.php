<?php

class horarioModel extends Model
{

  function __construct()
  {
    parent::__construct();
    $this->table = "calendar";
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
      $sql = "INSERT INTO $this->table ( 'week_day', 'start_time', 'end_time' , 'activity_id', 'up_date', 'up_user_id' , 'down_date', 'down_user_id',) 
                             VALUES (:dia, :inicio, :final, :actividad, :creado, :creado_por, :eliminado , :eliminado_por)";

      $query = $this->db->getConnection()->prepare($sql);
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
      $sql = "UPDATE $this->table SET 'week_day' = :dia, 'start_time' = :inicio, 'end_time' = :final, 'activity_id' = :actividad, 
                                    'up_date' = :creado, 'up_user_id' = :creado_por, 'down_date' = :eliminado, 'down_user_id' = :eliminado_por
              WHERE $this->table.'id' = :id";

      $query = $this->db->getConnection()->prepare($sql);
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
}
