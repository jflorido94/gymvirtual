<?php

class mensajesModel extends Model
{

  function __construct()
  {
    parent::__construct();
    parent::$table = "messages";
  }

  /**
   * Inserta un mensaje del usuario actual para un usuario
   *
   * @param Array $a
   * @return Array 
   * ["correcto"] → true si se recuperaron bien los datos
   * 
   * ["datos"]    → Array con los registros de la tabla
   * 
   * ["mensaje"]  → mensaje de error o de realizacion correcta
   */
  public function insert($a)
  {

    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

    try {
      $sql = "INSERT INTO $this->table ( 'from_users_id', 'to_users_id', 'message')
                             VALUES (:de, :para, :mensaje)";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':de' => $a,
        ':para' => $a,
        ':mensaje' => $a,
      ]);

      $resultado["correcto"] = true;
    } catch (PDOException $ex) {
      $resultado["mensaje"] = $ex->getMessage();
      $resultado["correcto"] = false;
    } finally {
      return $resultado;
    }
  }

  /**
   * Edita un mensaje
   *
   * @param Array $a
   * @return Array
   * 
   * ["correcto"] → true si se recuperaron bien los datos
   * 
   * ["datos"]    → Array con los registros de la tabla
   * 
   * ["mensaje"]  → mensaje de error o de realizacion correcta
   */
  public function update($a)
  {

    $resultado = [
      "correcto" => false,
      "mensaje"  => "",
      "datos"    => "",
    ];

    try {
      $sql = "UPDATE $this->table' SET 'from_users_id' = :de, 'to_users_id' = :para, 'message' = :mensaje
              WHERE $this->table.'id' = :id";

      $query = $this->db->getConnection()->prepare($sql);
      $query->execute([
        ':de' => $a,
        ':para' => $a,
        ':message' => $a,
        ':id' => $a,
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
