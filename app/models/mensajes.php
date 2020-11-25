<?php 

class mensajesModel extends Model
{
  
  function __construct()
  {
    parent::__construct();
    parent::$table = "messages";
  }

  public function select()
  {
    
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
      $resultado["datos"] = $ex->getMessage();
      $resultado["correcto"] = false;

    } finally {
      return $resultado;
    }
  }

public function update($a)
{
 

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
      $resultado["datos"] = $ex->getMessage();
      $resultado["correcto"] = false;

    } finally {
      return $resultado;
    }
}

}


?>