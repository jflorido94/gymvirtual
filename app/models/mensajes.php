<?php 

class mensajesModelo extends modelo
{
  
  function __construct()
  {
    parent::__construct();
  }

  public function select()
  {
    $resultado = [];

    try {
      $sql = "SELECT * FROM 'messages'";

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
      $sql = "INSERT INTO messages ( 'from_users_id', 'to_users_id', 'message')
                             VALUES (:de, :para, :mensaje)";

      $query = $this->db->connect()->prepare($sql);
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
  $resultado = [];

    try {
      $sql = "UPDATE 'messages' SET 'from_users_id' = :de, 'to_users_id' = :para, 'message' = :mensaje
              WHERE 'messages'.'id' = :id";

      $query = $this->db->connect()->prepare($sql);
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

public function delete($a)
{
  $resultado = [];

    try {
      $sql = "DELETE from 'messages' where id = :id";

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